<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Shop3
 */

namespace jtl\Connector\Utilities\Config\Loader;

use jtl\Core\Exception\ConfigException;
use jtl\Core\Utilities\Config\Loader\Base as BaseLoader;

/**
 * Shop3 Imageproperty class.
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
abstract class Image extends BaseLoader
{

    const KEY_TYPE = 'type';
    const KEY_WIDTH = 'width';
    const KEY_HEIGHT = 'height';
    const KEY_CONTAINER = 'container';
    const KEY_FORMAT = 'format';
    const KEY_QUALITY = 'quality';
    const KEY_BACKGROUNDCOLOR = 'backgroundcolor';

    //Required Keys
    protected $_required = array(
      self::KEY_TYPE,
      self::KEY_WIDTH,
      self::KEY_HEIGHT,
      self::KEY_CONTAINER,
      self::KEY_QUALITY,
      self::KEY_BACKGROUNDCOLOR
    );

    /**
     * Contructor.
     * 
     * @param array $images
     */
    public function __construct(array $images = array())
    {
        if (!empty($images)) {
            $this->addImages($images);
        }
        $this->data = array(
          'platform' => array()
        );
    }

    /**
     * Adds a image to the data array.
     * 
     * @param string $type The name of our image type.
     * @param integer $width The width of this image types.
     * @param integer $height The height of this image types.
     * @param boolean $container Defines if the image should be rendered with container or not.
     * @param string $format The image format like JPG or PNG
     * @param integer $quality The quality in percent from 1-100
     * @throws ConfigException If the image already exists
     */
    public function addImage($type, $width, $height, $container, $format, $quality)
    {
        if ($this->existsImage($type)) {
            throw new ConfigException(sprintf('The image with type "%s" already exist', $type), 100);
        }
        $this->data['platform']['image'][$type] = array(
          self::KEY_TYPE => $type,
          self::KEY_WIDTH => $width,
          self::KEY_HEIGHT => $height,
          self::KEY_CONTAINER => $container,
          self::KEY_FORMAT => $format,
          self::KEY_QUALITY => $quality
        );
    }

    /**
     * Adding multiple images at once.
     * 
     * @param array $images Array of images, with the same parameters as in addImage.
     */
    public function addImages(array $images)
    {
        foreach ($images as $image) {
            $this->validateImageArray($image);
            $this->addImage(
              $image[self::KEY_TYPE], $image[self::KEY_WIDTH], $image[self::KEY_HEIGHT], $image[self::KEY_CONTAINER], $image[self::KEY_FORMAT], $image[self::KEY_QUALITY]
            );
        }
    }

    /**
     * Removes a image from the data array by type.
     * 
     * @param string $type
     * @throws ConfigException
     */
    public function delImage($type)
    {
        if (!$this->existsImage($type)) {
            throw new ConfigException(sprintf('Can\'t delete the image with type "%s", because it doesn\'t exist', $type));
        }
        unset($this->data['platform']['image'][$type]);
    }

    /**
     * Validates a image array and throws a exception with the failure.
     * 
     * @param array $image Array with all needed parameters for an image (see: addImage)
     * @return boolean 
     * @throws ConfigException
     */
    public function validateImageArray(array $image)
    {
        if (!is_array($image) || empty($image)) {
            throw new ConfigException(sprintf('The image "%s" is not valid', var_export($image, true)), 100);
        }
        foreach ($this->_required as $key) {
            if (!array_key_exists($key, $image)) {
                throw new ConfigException(sprintf('The image "%s" is not valid, key "%" is missing', var_export($image, true), $key), 100);
            }
        }
        return true;
    }

    /**
     * Checks if a image with that type already exists.
     * 
     * @param string $type The image type.
     * @return Boolean
     */
    protected function existsImage($type)
    {
        return !empty($this->data) && is_array($this->data['platform']['image']) && array_key_exists($type, $this->data['platform']['image']);
    }

    /**
     * Returns all Images.
     * 
     * @return array
     */
    public function getImages()
    {
        return $this->data['platform']['image'];
    }

}