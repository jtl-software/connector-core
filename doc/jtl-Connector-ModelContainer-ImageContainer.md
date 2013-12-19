jtl\Connector\ModelContainer\ImageContainer
===============

Image Container Class




* Class name: ImageContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_images

```
protected \jtl\Connector\Model\Image[] $_images
```





* Visibility: **protected**


### $items

```
public mixed $items = array("image" => array("Image", "Images"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\ImageContainer::getImages()

```
array jtl\Connector\ModelContainer\ImageContainer::\jtl\Connector\ModelContainer\ImageContainer::getImages()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CoreContainer::add()

```
mixed jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::add()($type, $object, $useValidation)
```

(non-PHPdoc)



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $type **mixed**
* $object **mixed**
* $useValidation **mixed**



### \jtl\Connector\ModelContainer\CoreContainer::get()

```
mixed jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::get()($type)
```

(non-PHPdoc)



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $type **mixed**



### \jtl\Connector\ModelContainer\CoreContainer::update()

```
bool jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::update()(string $type, array $kvs)
```

Updates every object from type $type with given property values



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $type **string**
* $kvs **array**



### \jtl\Connector\ModelContainer\CoreContainer::getPublic()

```
\jtl\Connector\ModelContainer\stdClass jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::getPublic()(array $excludes, array $subExcludes)
```

Convert the Container and SubItems into stdClass Object



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $excludes **array**
* $subExcludes **array**


