<?php
namespace Jtl\Connector\Core\Event\Category;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Category;

class CategoryAfterPushEvent extends Event
{
    const EVENT_NAME = 'category.after.push';

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
