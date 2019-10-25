<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */

namespace Jtl\Connector\Core\Type;

/**
 * Class I18nAttribute
 * @package jtl\Connector\Type
 */
class I18nAttribute extends DataType
{
    /**
     * @return array|PropertyInfo[]
     */
    protected function loadProperties()
    {
        return [
            new PropertyInfo('isTranslated','bool',false,false,false,false),
            new PropertyInfo('isCustomProperty','bool',false,false,false,false),
            new PropertyInfo('id','jtl\Connector\Model\Identity',null,true,true,false),
            new PropertyInfo('i18ns','jtl\Connector\Model\AbstractI18n',null,false,false,true),
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