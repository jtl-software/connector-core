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
class DeliveryNoteItem extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'F674B959' => new PropertyInfo('customerOrderItemId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'D80BDE14' => new PropertyInfo('deliveryNoteId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'AC4C45CE' => new PropertyInfo('cHinweis', 'string', '', false, false, false),
			'14A73220' => new PropertyInfo('quantity', 'float', 0.0, false, false, false),
        );
    }
}


