<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
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
            new PropertyInfo('created', 'DateTime', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('maxDays', 'int', null, false, false, false),
            new PropertyInfo('maxDownloads', 'int', null, false, false, false),
            new PropertyInfo('path', 'string', null, false, false, false),
            new PropertyInfo('previewPath', 'string', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\FileDownloadI18n', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}
