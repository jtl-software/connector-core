<?php

/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package   Jtl\Connector\Core\Database
 */

namespace Jtl\Connector\Core\Database;

use Jtl\Connector\Core\Exception\DatabaseException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Sqlite 3 Database Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Sqlite3 implements DatabaseInterface, LoggerAwareInterface
{
    /**
     * Sqlite 3 sharedcache value
     *
     * @var integer
     */
    public const SQLITE3_OPEN_SHAREDCACHE = 0x00020000;
    /**
     * Path to the SQLite database, or :memory: to use in-memory database.
     *
     * @var string
     */
    public $location;
    /**
     * Optional flags used to determine how to open the SQLite database.
     *
     * @var integer
     */
    public $mode;
    /**
     * Database connection state
     *
     * @var bool
     */
    protected $isConnected = false;
    /**
     * Sqlite 3 Database object
     *
     * @var \SQLite3
     */
    protected $db;
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * (non-PHPdoc)
     *
     * @throws Jtl\Connector\Core\Exception\DatabaseException|DatabaseException
     * @see Jtl\Connector\Core\Database\DatabaseInterface::connect()
     */
    public function connect(array $options = null)
    {
        $this->setOptions($options);
        if (!\is_string($this->location) || $this->location === '') {
            throw new DatabaseException('Wrong type or empty location');
        }

        if ($this->mode === null) {
            $this->mode = \SQLITE3_OPEN_READWRITE | \SQLITE3_OPEN_CREATE | self::SQLITE3_OPEN_SHAREDCACHE;
        }

        $this->logger = new NullLogger();

        try {
            $this->db = new \SQLite3($this->location, $this->mode);
            $this->db->busyTimeout(2000);
            $this->db->querySingle('PRAGMA journal_mode = wal;');
            $this->db->enableExceptions(true);

            $this->isConnected = true;
        } catch (\Throwable $exc) {
            throw new DatabaseException($exc->getMessage() . ' "' . $this->location . '"');
        }
    }

    /**
     * Set Options
     *
     * @param array|null $options
     */
    public function setOptions(array $options = null)
    {
        if (\is_array($options)) {
            // Location
            if (isset($options['location']) && \is_string($options['location']) && \strlen($options['location']) > 0) {
                $this->location = $options['location'];
            }

            // Mode
            if (isset($options['mode']) && \is_int($options['mode'])) {
                $this->mode = $options['mode'];
            }
        }
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        if ($this->isConnected) {
            $this->close();
        }
    }

    /**
     * (non-PHPdoc)
     *
     * @see Jtl\Connector\Core\Database\DatabaseInterface::close()
     */
    public function close()
    {
        return $this->db->close();
    }

    /**
     * (non-PHPdoc)
     *
     * @throws \Throwable
     * @see Jtl\Connector\Core\Database\DatabaseInterface::query()
     */
    public function query($query)
    {
        $command = \substr($query, 0, \strpos($query, ' '));

        switch (\strtoupper($command)) {
            case 'SELECT':
                return $this->fetch($query);
            case 'UPDATE':
            case 'DELETE':
                return $this->exec($query);
            case 'INSERT':
                return $this->insert($query);
        }

        return null;
    }

    /**
     * @param string $query
     *
     * @return array|null
     * @throws \Throwable
     */
    public function fetch(string $query): ?array
    {
        while (true) {
            $result = null;
            try {
                $result = $this->db->query($query);
            } catch (\Throwable $ex) {
                if ($this->db->lastErrorCode() !== 5) {
                    $this->logger->warning($this->db->lastErrorMsg());
                    throw $ex;
                }
            }

            if ($result instanceof \SQLite3Result) {
                $rows = [];
                while ($row = $result->fetchArray(\SQLITE3_ASSOC)) {
                    $rows[] = $row;
                }

                return $rows;
            }

            if ($this->db->lastErrorCode() !== 5) {
                $this->logger->warning($this->db->lastErrorMsg());

                return null;
            }
        }
    }

    /**
     * Executes a result-less query against a given database
     *
     * @param string $query
     *
     * @return bool
     */
    public function exec(string $query): bool
    {
        return $this->db->exec($query);
    }

    /**
     * Sqlite Insert
     *
     * @param string $query
     *
     * @return boolean|int
     */
    public function insert(string $query)
    {
        if ($this->db->exec($query)) {
            return $this->db->lastInsertRowID();
        }

        return false;
    }

    /**
     * @param string $query
     *
     * @return mixed
     */
    public function fetchSingle(string $query)
    {
        return $this->db->querySingle($query);
    }

    /**
     * Prepares an SQL statement for execution
     *
     * @param string $query
     *
     * @return \SQLite3Stmt|boolean Returns an SQLite3Stmt object on success or FALSE on failure.
     */
    public function prepare(string $query)
    {
        return $this->db->prepare($query);
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return $this->isConnected;
    }

    /**
     * (non-PHPdoc)
     * @see Jtl\Connector\Core\Database\DatabaseInterface::escapeString()
     */
    public function escapeString($query)
    {
        return \Sqlite3::escapeString($query);
    }

    /**
     * @return integer
     */
    public function getLastInsertRowId(): int
    {
        return $this->db->lastInsertRowID();
    }

    /**
     * @return \SQLite3
     */
    public function getDb(): \SQLite3
    {
        return $this->db;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
