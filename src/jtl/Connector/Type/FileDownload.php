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
class Product extends DataModel
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('i18n', '\jtl\Connector\Model\FileDownloadI18n', null, false, false, true),
			new PropertyInfo('internalId', 'string', '', false, false, false),
			new PropertyInfo('maxDays', 'integer', 0, false, false, false),
			new PropertyInfo('maxDownloads', 'integer', 0, false, false, false),
			new PropertyInfo('path', 'string', '', false, false, false),
			new PropertyInfo('previewPath', 'string', '', false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}
