<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Response;

/**
 * Response Model
 * Push reponse object
 *
 * @access public
 */
class Response extends \jtl\Core\Model\Model
{
    const ACTION_CREATE = 'create';
    const ACTION_DELETE = 'delete';
    const ACTION_UPDATE = 'update';

    /**
     * @var string Unique connector id
     */
    protected $id = '';
    
    /**
     * @var string Unique host id
     */
    protected $hostId = '';
    
    /**
     * @var string Response action (create/update/delete)
     */
    protected $action = '';
    
    /**
     * @var null|string Error (null|error string)
     */
    protected $error;

    /**
     * @return string Unique connector id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id Unique connector id
     * @return \jtl\Connector\Response\Response
     */
    public function setId($id)
    {
        $this->id = (string)$id;
        return $this;
    }

    /**
     * @return string Unique host id
     */
    public function getHostId()
    {
        return $this->hostId;
    }

    /**
     * @param string $hostId Unique host id
     * @return \jtl\Connector\Response\Response
     */
    public function setHostId($hostId)
    {
        $this->hostId = (string)$hostId;
        return $this;
    }

    /**
     * @return string Response action (create/update/delete)
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action Response action (create/update/delete)
     * @return \jtl\Connector\Response\Response
     */
    public function setAction($action = self::ACTION_UPDATE)
    {
        $this->action = (string)$action;
        return $this;
    }

    /**
     * @return null|string Error (null|error string)
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error Error (null|error string)
     * @return \jtl\Connector\Response\Response
     */
    public function setError($error)
    {
        if ($error !== null) {
            $this->error = (string)$error;
        }
        return $this;
    }
}