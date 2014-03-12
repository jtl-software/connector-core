<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * Specific Response Container Class
 * @access public
 */
class SpecificContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $specifics;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $specificI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $specificValues;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $specificValueI18ns;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getSpecifics()
    {
        return $this->specifics;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addSpecific(Response $response)
    {
        if ($this->specifics === null) {
            $this->specifics = array();
        }
        
        $this->specifics[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getSpecificI18ns()
    {
        return $this->specificI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addSpecificI18n(Response $response)
    {
        if ($this->specificI18ns === null) {
            $this->specificI18ns = array();
        }
        
        $this->specificI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getSpecificValues()
    {
        return $this->specificValues;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addSpecificValue(Response $response)
    {
        if ($this->specificValues === null) {
            $this->specificValues = array();
        }
        
        $this->specificValues[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getSpecificValueI18ns()
    {
        return $this->specificValueI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addSpecificValueI18n(Response $response)
    {
        if ($this->specificValueI18ns === null) {
            $this->specificValueI18ns = array();
        }
        
        $this->specificValueI18ns[] = $response;
    }
    
}