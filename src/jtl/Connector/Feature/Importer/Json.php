<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature\Importer;

use jtl\Connector\Feature\Importer\Base as BaseImporter;
use jtl\Connector\Feature\Exception\Importer as ExceptionImporter;
use \jtl\Core\Serializer\Json as SerializerJson;

/**
 * Json importer class
 * 
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
class Json extends BaseImporter
{

    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $name = 'Json';

    /**
     * Creates the instance.
     * 
     * @param string $file The full filename of a JSON config file
     */
    public function __construct($json_file)
    {
        $this->file = $json_file;
    }

    /**
     * Dumps the feature file.
     * 
     * @return type
     * @throws ExceptionImporter
     */
    public function dump()
    {
        if (!is_file($this->file)) {
            throw new ExceptionImporter(sprintf('Unable to load your file "%s"', $this->file));
        }
        $content = file_get_contents($this->file);
        if ($content === false) {
            throw new ExceptionImporter(sprintf('Unable to read file content from file "%s"', $this->file));
        }
        return SerializerJson::decode($content, true);
    }

}