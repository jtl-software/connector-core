<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * Manufacturer Response Container Class
 * @access public
 */
class ManufacturerContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $manufacturers;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $manufacturerI18ns;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addManufacturer(Response $response)
    {
        if ($this->manufacturers === null) {
            $this->manufacturers = array();
        }
        
        $this->manufacturers[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getManufacturerI18ns()
    {
        return $this->manufacturerI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addManufacturerI18n(Response $response)
    {
        if ($this->manufacturerI18ns === null) {
            $this->manufacturerI18ns = array();
        }
        
        $this->manufacturerI18ns[] = $response;
    }
    
}