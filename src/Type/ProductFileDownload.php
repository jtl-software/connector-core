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
class ProductFileDownload extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('creationDate', 'DateTime', null, false, false, false),
            new PropertyInfo('maxDays', 'int', null, false, false, false),
            new PropertyInfo('maxDownloads', 'int', null, false, false, false),
            new PropertyInfo('path', 'string', null, false, false, false),
            new PropertyInfo('previewPath', 'string', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductFileDownloadI18n', null, false, false, true)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
