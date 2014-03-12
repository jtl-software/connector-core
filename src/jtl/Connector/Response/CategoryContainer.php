<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * Category Response Container Class
 * @access public
 */
class CategoryContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categories;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categoryI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categoryAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categoryAttrI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categoryFunctionAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categoryInvisibilities;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $categoryCustomerGroups;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategory(Response $response)
    {
        if ($this->categories === null) {
            $this->categories = array();
        }
        
        $this->categories[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategoryI18ns()
    {
        return $this->categoryI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategoryI18n(Response $response)
    {
        if ($this->categoryI18ns === null) {
            $this->categoryI18ns = array();
        }
        
        $this->categoryI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategoryAttrs()
    {
        return $this->categoryAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategoryAttr(Response $response)
    {
        if ($this->categoryAttrs === null) {
            $this->categoryAttrs = array();
        }
        
        $this->categoryAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategoryAttrI18ns()
    {
        return $this->categoryAttrI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategoryAttrI18n(Response $response)
    {
        if ($this->categoryAttrI18ns === null) {
            $this->categoryAttrI18ns = array();
        }
        
        $this->categoryAttrI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategoryFunctionAttrs()
    {
        return $this->categoryFunctionAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategoryFunctionAttr(Response $response)
    {
        if ($this->categoryFunctionAttrs === null) {
            $this->categoryFunctionAttrs = array();
        }
        
        $this->categoryFunctionAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategoryInvisibilities()
    {
        return $this->categoryInvisibilities;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategoryInvisibility(Response $response)
    {
        if ($this->categoryInvisibilities === null) {
            $this->categoryInvisibilities = array();
        }
        
        $this->categoryInvisibilities[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCategoryCustomerGroups()
    {
        return $this->categoryCustomerGroups;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCategoryCustomerGroup(Response $response)
    {
        if ($this->categoryCustomerGroups === null) {
            $this->categoryCustomerGroups = array();
        }
        
        $this->categoryCustomerGroups[] = $response;
    }
    
}