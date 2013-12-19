jtl\Connector\Config\Loader\Image
===============

Shop3 Imageproperty class.




* Class name: Image
* Namespace: jtl\Connector\Config\Loader
* This is an **abstract** class
* Parent class: jtl\Core\Config\Loader\Base



Constants
----------


### KEY_TYPE

```
const KEY_TYPE = 'type'
```





### KEY_WIDTH

```
const KEY_WIDTH = 'width'
```





### KEY_HEIGHT

```
const KEY_HEIGHT = 'height'
```





### KEY_CONTAINER

```
const KEY_CONTAINER = 'container'
```





### KEY_FORMAT

```
const KEY_FORMAT = 'format'
```





### KEY_QUALITY

```
const KEY_QUALITY = 'quality'
```





### KEY_BACKGROUNDCOLOR

```
const KEY_BACKGROUNDCOLOR = 'backgroundcolor'
```





### KEY_GLOBALS

```
const KEY_GLOBALS = 'globals'
```





### KEY_NAME

```
const KEY_NAME = 'name'
```





### KEY_VALUE

```
const KEY_VALUE = 'value'
```





Properties
----------


### $_required

```
protected mixed $_required = array(self::KEY_TYPE, self::KEY_WIDTH, self::KEY_HEIGHT, self::KEY_CONTAINER, self::KEY_QUALITY, self::KEY_BACKGROUNDCOLOR)
```





* Visibility: **protected**


### $_required_globals

```
protected mixed $_required_globals = array(self::KEY_NAME, self::KEY_VALUE)
```





* Visibility: **protected**


Methods
-------


### \jtl\Connector\Config\Loader\Image::__construct()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::__construct()(array $images)
```

Contructor.



* Visibility: **public**

#### Arguments

* $images **array**



### \jtl\Connector\Config\Loader\Image::addImage()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::addImage()(string $type, integer $width, integer $height, boolean $container, string $format, integer $quality, string $backgroundcolor)
```

Adds a image to the data array.



* Visibility: **public**

#### Arguments

* $type **string** - &lt;p&gt;The name of our image type.&lt;/p&gt;
* $width **integer** - &lt;p&gt;The width of this image types.&lt;/p&gt;
* $height **integer** - &lt;p&gt;The height of this image types.&lt;/p&gt;
* $container **boolean** - &lt;p&gt;Defines if the image should be rendered with container or not.&lt;/p&gt;
* $format **string** - &lt;p&gt;The image format like JPG or PNG&lt;/p&gt;
* $quality **integer** - &lt;p&gt;The quality in percent from 1-100&lt;/p&gt;
* $backgroundcolor **string** - &lt;p&gt;The background color of this image.&lt;/p&gt;



### \jtl\Connector\Config\Loader\Image::addImages()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::addImages()(array $images)
```

Adding multiple images at once.



* Visibility: **public**

#### Arguments

* $images **array** - &lt;p&gt;Array of images, with the same parameters as in addImage.&lt;/p&gt;



### \jtl\Connector\Config\Loader\Image::delImage()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::delImage()(string $type)
```

Removes a image from the data array by type.



* Visibility: **public**

#### Arguments

* $type **string**



### \jtl\Connector\Config\Loader\Image::validateImageArray()

```
boolean jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::validateImageArray()(array $image)
```

Validates a image array and throws a exception with the failure.



* Visibility: **public**

#### Arguments

* $image **array** - &lt;p&gt;Array with all needed parameters for an image (see: addImage)&lt;/p&gt;



### \jtl\Connector\Config\Loader\Image::existsImage()

```
Boolean jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::existsImage()(string $type)
```

Checks if a image with that type already exists.



* Visibility: **protected**

#### Arguments

* $type **string** - &lt;p&gt;The image type.&lt;/p&gt;



### \jtl\Connector\Config\Loader\Image::getImages()

```
array jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::getImages()()
```

Returns all Images.



* Visibility: **public**



### \jtl\Connector\Config\Loader\Image::addGlobal()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::addGlobal()(string $name, mixed $value)
```

Adds a global image property to the class.



* Visibility: **public**

#### Arguments

* $name **string**
* $value **mixed**



### \jtl\Connector\Config\Loader\Image::addGlobals()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::addGlobals()(array $globals)
```

Adding multiple globals at once.



* Visibility: **public**

#### Arguments

* $globals **array**



### \jtl\Connector\Config\Loader\Image::delGlobal()

```
mixed jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::delGlobal()(string $global)
```

Removes a global from the data array by type.



* Visibility: **public**

#### Arguments

* $global **string**



### \jtl\Connector\Config\Loader\Image::validateGlobalArray()

```
boolean jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::validateGlobalArray()(array $global)
```

Validates a name array and throws a exception with the failure.



* Visibility: **public**

#### Arguments

* $global **array** - &lt;p&gt;Array with all needed parameters for an name (see: addGlobal)&lt;/p&gt;



### \jtl\Connector\Config\Loader\Image::existsGlobal()

```
Boolean jtl\Connector\Config\Loader\Image::\jtl\Connector\Config\Loader\Image::existsGlobal()(string $type)
```

Checks if a image with that type already exists.



* Visibility: **protected**

#### Arguments

* $type **string** - &lt;p&gt;The image type.&lt;/p&gt;


