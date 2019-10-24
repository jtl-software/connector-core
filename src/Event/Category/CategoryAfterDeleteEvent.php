<?php
namespace Jtl\Connector\Core\Event\Category;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Category;


class CategoryAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'category.after.delete';

	protected $category;

    public function __construct(Category &$category)
    {
		$this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
	}
	
}
