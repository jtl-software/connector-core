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
            if ($publics === null)
                $publics = array();
            
            foreach ($members as $member) {
                if (!in_array($member, $publics)) {
                    $memberpub = $member;
                    if ($member[0] == "_")
                        $memberpub = substr($member, 1);
                    
                    $object->$memberpub = ($this->$member instanceof Identity) ? $this->$member->toArray() : $this->$member;
                }
            }
        }
        
        return $object;
    }

    /**
     * Try to convert identities into objects
     */
    public function setIdentities()
    {
        foreach ($this->_identities as $identity) {
            $this->$identity = Identity::convert($this->$identity);
        }
    }
}