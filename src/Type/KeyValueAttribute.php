<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */

namespace jtl\Connector\Type;

/**
 * Class KeyValueAttribute
 * @package jtl\Connector\Type
 */
class KeyValueAttribute extends DataType
{
    /**
     * @return array|PropertyInfo[]
     */
    protected function loadProperties()
    {
        return [
            new PropertyInfo('value', 'string', '', false, false, false),
            new PropertyInfo('key', 'string', '', false, false, false),
        ];
    }

    /**
     * @return bool
     */
    public function isMain()
    {
        return false;
    }
}