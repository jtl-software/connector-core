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
class Language extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('isDefault', 'boolean', false, false, false, false),
            new PropertyInfo('nameEnglish', 'string', '', false, false, false),
            new PropertyInfo('nameGerman', 'string', '', false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
