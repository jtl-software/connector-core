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
class EmailTemplateI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('contentHtml', 'string', null, false, false, false),
            new PropertyInfo('contentText', 'string', null, false, false, false),
            new PropertyInfo('emailTemplateId', 'int', null, true, true, false),
            new PropertyInfo('filename', 'string', null, false, false, false),
            new PropertyInfo('localeName', 'string', null, false, false, false),
            new PropertyInfo('pdf', 'string', null, false, false, false),
            new PropertyInfo('subject', 'string', null, false, false, false),
        );
    }
}
