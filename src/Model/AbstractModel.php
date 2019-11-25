<?php
/**
 * @copyright JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 */
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\SerializationContext;
use stdClass;

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

    /**
     * Convert the Model into stdClass Object
     *
     * @param array $publics
     * @return stdClass $object
     */
    public function getPublic(array $publics = ['fields', 'isEncrypted', 'identities', 'modelType']): stdClass
    {
        $object = new stdClass();
        
        $members = array_keys(get_object_vars($this));
        if (is_array($members) && count($members) > 0) {
            if ($publics === null) {
                $publics = [];
            }
            
            foreach ($members as $member) {
                if (!in_array($member, $publics, true)) {
                    $memberpub = $member;
                    if ($member[0] == "_") {
                        $memberpub = substr($member, 1);
                    }
                    
                    if (is_array($this->{$member})) {
                        foreach (array_keys($this->{$member}) as $key) {
                            if ($this->{$member}[$key] instanceof self) {
                                $this->{$member}[$key] = $this->{$member}[$key]->getPublic($publics);
                            }
                        }
                    }
                    
                    $object->{$memberpub} = ($this->{$member} instanceof self) ? $this->{$member}->getPublic($publics) : $this->{$member};
                }
            }
        }
        
        return $object;
    }
}
