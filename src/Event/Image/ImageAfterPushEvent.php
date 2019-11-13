<?php
namespace Jtl\Connector\Core\Event\Image;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\AbstractImage;

class ImageAfterPushEvent extends Event
{
    const EVENT_NAME = 'image.after.push';

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
