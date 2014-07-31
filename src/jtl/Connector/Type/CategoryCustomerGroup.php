<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class CategoryCustomerGroup extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E479F72A' => new PropertyInfo('categoryId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'C5988257' => new PropertyInfo('customerGroupId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, true, true, true),
			'4ACB38AA' => new PropertyInfo('discount', 'float', 0.0, false, false, false),
        );
    }
}


