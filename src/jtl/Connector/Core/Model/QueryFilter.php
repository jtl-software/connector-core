<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Model
 */

namespace jtl\Connector\Core\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Database Query Filter
 *
 * @access public
 * @package jtl\Connector\Model
 * @Serializer\AccessType("public_method")
 */
class QueryFilter
{
    /**
     * Query item count limitation
     *
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("limit")
     */
    protected $limit;
    
    /**
     * Query item range offset
     *
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("offset")
     */
    protected $offset;
    
    /**
     * Query item order
     *
     * @var multiple: string
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("orders")
     */
    protected $orders;
    
    /**
     * Query item filter (where)
     *
     * @var multiple: string
     * @Serializer\Type("array<string, string>")
     * @Serializer\SerializedName("filters")
     */
    protected $filters;

    /**
     * Beginning of query item date range
     *
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("from")
     */
    protected $from;

    /**
     * End of query item date range
     *
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("until")
     */
    protected $until;
    
    /**
     * Constructor
     */
    public function __construct($limit = null, $offset = null, $from = null, $until = null)
    {
        $this->orders = array();
        $this->filters = array();
        
        if ($limit !== null) {
            $this->limit = $limit;
        }
        
        if ($offset !== null) {
            $this->offset = $offset;
        }

        if ($from !== null) {
            $this->from = $from;
        }

        if ($until !== null) {
            $this->until = $until;
        }
    }
    
    /**
     * Limit Setter
     *
     * @param integer $limit
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setLimit($limit)
    {
        $this->limit = (int)$limit;
        return $this;
    }
    
    /**
     * Limit Getter
     *
     * @return integer
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return bool
     */
    public function isLimit()
    {
        return ($this->limit !== null && $this->limit > 0);
    }
    
    /**
     * Offset Setter
     *
     * @param integer $offset
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setOffset($offset)
    {
        $this->offset = (int)$offset;
        return $this;
    }
    
    /**
     * Offset Getter
     *
     * @return integer
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return bool
     */
    public function isOffset()
    {
        return ($this->offset !== null && $this->offset >= 0);
    }
    
    /**
     * Date range beginning Setter
     *
     * @param integer $from
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setFrom($from)
    {
        $this->from = (int)$from;
        return $this;
    }
    
    /**
     * Date range beginning Getter
     *
     * @return integer
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return bool
     */
    public function isFrom()
    {
        return ($this->from !== null && $this->from >= 0);
    }
    
    /**
     * Date range end Setter
     *
     * @param integer $until
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setUntil($until)
    {
        $this->until = (int)$until;
        return $this;
    }
    
    /**
     * Date range end Getter
     *
     * @return integer
     */
    public function getUntil()
    {
        return $this->until;
    }

    /**
     * @return bool
     */
    public function isUntil()
    {
        return ($this->until !== null && $this->until >= 0);
    }
    
    /**
     * Order Setter
     *
     * @param multiple: string $orders
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setOrders(array $orders)
    {
        $this->orders = $orders;
        return $this;
    }
    
    /**
     * Order Getter
     *
     * @return string
     */
    public function getOrders()
    {
        return $this->orders;
    }
    
    /**
     * Add one Order
     *
     * @param string $value
     * @return \jtl\Connector\Core\Model\QueryFilter
     */
    public function addOrder($value)
    {
        if ($this->orders === null) {
            $this->orders = array();
        }
    
        $this->orders[] = $value;
        return $this;
    }
    
    /**
     * Delete one Order
     *
     * @param string $value
     * @return boolean
     */
    public function deleteOrder($value)
    {
        $index = $this->isOrder($value, true);
        if ($index !== false) {
            unset($this->orders[$index]);
            $this->orders = array_merge($this->orders);
        }
    
        return false;
    }
    
    /**
     * @param string $oldValue
     * @param string $newValue
     * @return boolean
     */
    public function updateOrder($oldValue, $newValue)
    {
        $index = $this->isOrder($oldValue, true);
        if ($index !== false) {
            $this->orders[$index] = $newValue;
            
            return true;
        }
        
        return false;
    }
    
    /**
     * @param string $value
     * @param boolean $getIndex
     * @return int|boolean
     */
    public function isOrder($value = null, $getIndex = false)
    {
        if ($value !== null) {
            return ($this->orders !== null && is_array($this->orders) && count($this->orders) > 0);
        } else {
            foreach ($this->orders as $i => $order) {
                if ($order === $value) {
                    return $getIndex ? $i : true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * Get one Order
     *
     * @param string $value
     * @return mixed|NULL
     */
    public function getOrder($value)
    {
        $index = $this->isOrder($value, true);
        if ($index !== false) {
            return $this->orders[$index];
        }
    
        return null;
    }
    
    /**
     * Filters Setter
     *
     * @param multiple: string $filters
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setFilters(array $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    /**
     * Filters Getter
     *
     * @return multiple: string
     */
    public function getFilters()
    {
        return $this->filters;
    }
    
    /**
     * Add one Filter
     *
     * @param string $filter
     * @return \jtl\Connector\Core\Model\QueryFilter
     */
    public function addFilter($key, $value)
    {
        if ($this->filters === null) {
            $this->filters = array();
        }
        
        $this->filters[$key] = $value;
        return $this;
    }
    
    /**
     * Delete one Filter
     *
     * @param string $key
     * @return boolean
     */
    public function deleteFilter($key)
    {
        if ($this->isFilter($key)) {
            unset($this->filters[$key]);
            
            return true;
        }
        
        return false;
    }
    
    /**
     *
     * @param string $key
     * @return boolean
     */
    public function isFilter($key)
    {
        return isset($this->filters[$key]);
    }
    
    /**
     *
     * @param string $key
     * @return mixed|NULL
     */
    public function getFilter($key)
    {
        if ($this->isFilter($key)) {
            return $this->filters[$key];
        }
        
        return null;
    }
    
    /**
     *
     * @param string $oldKey
     * @param string $newKey
     * @param mixed $value
     * @return boolean
     */
    public function overrideFilter($oldKey, $newKey, $value = null)
    {
        if ($this->isFilter($oldKey)) {
            if ($value === null) {
                $value = $this->filters[$oldKey];
            }
            
            unset($this->filters[$oldKey]);
            $this->filters[$newKey] = $value;
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Setter
     *
     * @param \stdClass $obj
     */
    public function set(\stdClass $obj)
    {
        if (!is_object($obj)) {
            return;
        }

        if (isset($obj->limit)) {
            $this->setLimit($obj->limit);
        }
        
        if (isset($obj->offset)) {
            $this->setOffset($obj->offset);
        }

        if (isset($obj->from)) {
            $this->setFrom($obj->from);
        }

        if (isset($obj->until)) {
            $this->setUntil($obj->until);
        }
        
        if (isset($obj->filters) && is_object($obj->filters)) {
            $this->setFilters(get_object_vars($obj->filters));
        }
    }
}
