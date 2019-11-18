<?php
/**
 * @copyright JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\SerializationContext;
use PhpOption\Option;
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
     * Constructor
     *
     * @param stdClass $object
     */
    public function __construct(stdClass $object = null)
    {
        $this->setOptions($object);
    }
    
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
     * Sets Properties with matching Array Values
     *
     * @param stdClass $object
     * @param array $options
     * @return AbstractModel
     */
    public function setOptions(stdClass $object = null, array $options = null): AbstractModel
    {
        if ($object !== null && is_object($object)) {
            $members = array_keys(get_object_vars($object));
            if (is_array($members) && count($members) > 0) {
                foreach ($members as $member) {
                    $property = ucfirst($member);
                    $setter = 'set' . $property;
                    
                    if (is_callable([$this, $setter])) {
                        $this->{$setter}($object->{$member});
                    }
                }
            }
        } elseif ($options !== null && is_array($options)) {
            $methods = get_class_methods($this);
            foreach ($options as $key => $value) {
                if ($value !== null) {
                    $property = ucfirst($key);
                    $setter = 'set' . $property;
                    
                    if (is_callable([$this, $setter])) {
                        $this->{$setter}($value);
                    }
                }
            }
        }
        
        return $this;
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
