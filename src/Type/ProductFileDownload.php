<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ProductFileDownload extends AbstractDataType
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
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\ProductFileDownloadI18n', null, false, false, true)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
