<?php
/**
 * @copyright JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 */
namespace Jtl\Connector\Core\Model;

/**
 * Core Model Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class AbstractModel
{
    /**
     * Get the Model Properties
     *
     * @return array : string
     */
    public function getProperties(): array
    {
        return array_keys(get_object_vars($this));
    }
}
