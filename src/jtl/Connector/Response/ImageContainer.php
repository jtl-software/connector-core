<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * Image Response Container Class
 * @access public
 */
class ImageContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $images;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addImage(Response $response)
    {
        if ($this->images === null) {
            $this->images = array();
        }
        
        $this->images[] = $response;
    }
    
}