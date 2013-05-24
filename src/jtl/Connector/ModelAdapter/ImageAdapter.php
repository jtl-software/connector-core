<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

use \jtl\Core\ModelAdapter\IModelAdapter;
use \jtl\Connector\Model;

/**
 * Image Adapter Class
 * @access public
 */
class ImageAdapter implements IModelAdapter
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
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::add()
     */
    public function add($type, $object)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $type = $this->items[$type];
            $class = "\\jtl\\Connector\\Model\\{$type}";
            if (class_exists($class)) {
                $model = new $type();
                $model->setOptions($object);
                $setter = "_" . lcfirst($type);

                $this->$setter = $model;
                
                return true;
            }
        }

        return false;
    }
}
?>