<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */


namespace jtl\Connector\Model\Common;

use jtl\Connector\Model\DataModel;

/**
 * Class I18n
 * @access public
 * @package jtl\Connector\Model\Common
 * @Serializer\AccessType("public_method")
 */
abstract class I18n extends DataModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @return string
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }

    /**
     * @param string $languageISO
     * @return I18n
     */
    public function setLanguageISO(string $languageISO): I18n
    {
        $this->languageISO = $languageISO;

        return $this;
    }
}