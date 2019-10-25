<?php
namespace Jtl\Connector\Core\Event\Image;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Image;


class ImageBeforePushEvent extends Event
{
    const EVENT_NAME = 'image.before.push';

	protected $image;

    public function __construct(Image &$image)
    {
		$this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
	}
	
}
