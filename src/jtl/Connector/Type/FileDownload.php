<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class FileDownload extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('created', 'string', null, False, false, false),
            new PropertyInfo('maxDays', 'int', null, False, false, false),
            new PropertyInfo('maxDownloads', 'int', null, False, false, false),
            new PropertyInfo('path', 'string', null, False, false, false),
            new PropertyInfo('previewPath', 'string', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('i18n', '\jtl\Connector\Model\FileDownloadI18n', null, false, false, true),
        );
    }
}
