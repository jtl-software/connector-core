<?php
namespace Jtl\Connector\Core\Event\Image;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Image;


class ImageAfterPullEvent extends Event
{
    const EVENT_NAME = 'image.after.pull';

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
