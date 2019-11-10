<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractI18n
 * @access public
 * @package Jtl\Connector\Core\Model\Common
 * @Serializer\AccessType("public_method")
 */
abstract class AbstractI18n extends AbstractDataModel
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
     * @return AbstractI18n
     */
    public function setLanguageISO(string $languageISO): AbstractI18n
    {
        $this->languageISO = $languageISO;

        return $this;
    }
}
