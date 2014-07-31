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
class ProductVarCombination extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'81B11883' => new PropertyInfo('productVariationId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'D57AFDF2' => new PropertyInfo('productVariationValueId', '\jtl\Connector\Model\Identity', null, false, false, false),
        );
    }
}


