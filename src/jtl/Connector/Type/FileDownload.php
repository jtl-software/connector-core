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
class FileDownload extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'E92960DA' => new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'7664D2F2' => new PropertyInfo('internalId', 'string', '', false, false, false),
			'B269D47F' => new PropertyInfo('maxDays', 'integer', 0, false, false, false),
			'54101EF4' => new PropertyInfo('maxDownloads', 'integer', 0, false, false, false),
			'5FFB0316' => new PropertyInfo('path', 'string', '', false, false, false),
			'00C6337C' => new PropertyInfo('previewPath', 'string', '', false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}


