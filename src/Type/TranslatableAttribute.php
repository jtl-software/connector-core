<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */

namespace Jtl\Connector\Core\Type;

/**
 * Class TranslatableAttribute
 * @package Jtl\Connector\Core\Type
 */
class TranslatableAttribute extends DataType
{
    /**
     * @return array|PropertyInfo[]
     */
    protected function loadProperties()
    {
        return [
            new PropertyInfo('isTranslated', 'bool', false, false, false, false),
            new PropertyInfo('isCustomProperty', 'bool', false, false, false, false),
            new PropertyInfo('id', 'Jtl\Connector\Core\Model\Identity', null, true, true, false),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\TranslatableAttributeI18n', null, false, false, true),
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
