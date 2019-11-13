<?php
namespace Jtl\Connector\Core\Event\Image;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\AbstractImage;

class ImageAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'image.after.delete';

    protected $image;

    public function __construct(AbstractImage $image)
    {
        $this->image = $image;
    }

    public function getImage(): AbstractImage
    {
        return $this->image;
    }
}
