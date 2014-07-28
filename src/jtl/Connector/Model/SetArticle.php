<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Define set articles / parts lists. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SetArticle extends DataModel
{
    /**
     * @type Identity Unique setArticle id, referenced by product.setArticleId
     */
    public $_id = null;

    /**
     * @type Identity Reference to a component / product
     */
    public $_productId = null;

    /**
     * @type float Component quantity
     */
    public $_quantity = 0.0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  float $quantity Component quantity
     * @return \jtl\Connector\Model\SetArticle
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('_quantity', $quantity, 'float');
    }
    
    /**
     * @return float Component quantity
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param  Identity $id Unique setArticle id, referenced by product.setArticleId
     * @return \jtl\Connector\Model\SetArticle
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique setArticle id, referenced by product.setArticleId
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productId Reference to a component / product
     * @return \jtl\Connector\Model\SetArticle
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to a component / product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
}

