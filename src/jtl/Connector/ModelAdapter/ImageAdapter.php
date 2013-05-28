<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

/**
 * Image Adapter Class
 * @access public
 */
class ImageAdapter extends CoreAdapter
{
    /**
     * @var \jtl\Connector\Model\image
     */
    protected $_image;
        
    /**
     * @return \jtl\Connector\Model\image
     */
    public function getImage()
    {
        return $this->_image;
    }
    
    public $items = array(
        "image" => "Image"
    );
}
?>