<?php
namespace Jtl\Connector\Core\Event\Image;

use Jtl\Connector\Core\Model\AbstractImage;
use Symfony\Contracts\EventDispatcher\Event;

class ImageBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'image.before.delete';

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
