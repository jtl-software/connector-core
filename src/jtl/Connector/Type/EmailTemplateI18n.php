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
class EmailTemplateI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('emailTemplateId', 'Identity', null, True, false, false),
            new PropertyInfo('contentHtml', 'string', null, False, false, false),
            new PropertyInfo('contentText', 'string', null, False, false, false),
            new PropertyInfo('filename', 'string', null, False, false, false),
            new PropertyInfo('localeName', 'string', null, True, false, false),
            new PropertyInfo('pdf', 'string', null, False, false, false),
            new PropertyInfo('subject', 'string', null, False, false, false),
        );
    }
}
