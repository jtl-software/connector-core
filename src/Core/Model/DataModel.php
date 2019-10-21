<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\Core\Model
 */
namespace jtl\Connector\Core\Model;

use \jtl\Connector\Core\Exception\NotImplementedException;
use JMS\Serializer\Annotation as Serializer;

/**
 * DataModel Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 * @Serializer\ExclusionPolicy("none");
 */
abstract class DataModel extends Model
{
    /**
     * @var array list of strings
     * @Serializer\Type("array<string, string>")
     * @Serializer\Exclude
     * @Serializer\ReadOnly
     */
    protected $fields = [];
    
    /**
     * Fields Getter
     *
     * @return mixed:string
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Get a Model Member Name
     *
     * @param boolean $toWawi
     * @param string $key
     * @return mixed:string|NULL
     */
    public function getField(bool $toWawi = false, string $key): string
    {
        if ($this->fields !== null && is_array($this->fields)) {
            $fields = $this->fields;
            if (!$toWawi) {
                $fields = array_flip($fields);
            }
            
            if (is_array($fields) && isset($fields[$key])) {
                return $fields[$key];
            }
        }
        
        return null;
    }
    
    /**
     * Object Mapping
     *
     * @param boolean $toWawi
     * @param mixed $obj Object to map
     * @throws NotImplementedException
     */
    public function map(bool $toWawi = false, \stdClass $obj = null): void
    {
        throw new NotImplementedException;
    }
}
