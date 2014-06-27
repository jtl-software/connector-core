<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DataModel
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel as CoreModel;

/**
 * Entity data model
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage DataModel
 */
class DataModel extends CoreModel
{
    /**
     * Convert the Model into stdClass Object
     *
     * @param array $publics
     * @return stdClass $object
     */
    public function getPublic(array $publics = array('_fields', '_isEncrypted', '_identities'))
    {
        $object = new \stdClass();
            
        $members = array_keys(get_object_vars($this));
        if (is_array($members) && count($members) > 0) {
            foreach ($members as $member) {
                if (!in_array($member, $publics)) {
                    $memberpub = $member;
                    if ($member[0] == "_") {
                        $memberpub = substr($member, 1);
                    }
                    
                    if ($this->$member instanceof self) {
                        $object->$memberpub = $this->$member->getPublic($publics);
                    } elseif ($this->$member instanceof Identity) {
                        $object->$memberpub = $this->$member->toArray();
                    } else {
                        $object->$memberpub = $this->$member;
                    }
                }
            }
        }
        
        return $object;
    }

    /**
     * Try to convert identities into objects
     *
     * @return jtl\Connector\Model\DataModel
     */
    public function setIdentities()
    {
        foreach ($this->_identities as $identity) {
            $this->$identity = Identity::convert($this->$identity);
        }

        return $this;
    }

    /**
     * Sets Properties with matching Array Values
     *
     * @param object $object
     * @param array $options
     * @return jtl\Connector\Model\DataModel
     */
    public function setOptions($object = null, array $options = null)
    {
        parent::setOptions($object, $options);
        $this->setIdentities();

        return $this;
    }
}