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
class ProductFileDownload extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'66799FBA' => new PropertyInfo('fileDownloadId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, true, true, true),
        );
    }
}


