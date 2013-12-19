jtl\Connector\ModelContainer\ManufacturerContainer
===============

Manufacturer Container Class




* Class name: ManufacturerContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_manufacturers

```
protected \jtl\Connector\Model\Manufacturer[] $_manufacturers
```





* Visibility: **protected**


### $_manufacturerI18ns

```
protected \jtl\Connector\Model\ManufacturerI18n[] $_manufacturerI18ns
```





* Visibility: **protected**


### $items

```
public mixed $items = array("manufacturer" => array("Manufacturer", "Manufacturers"), "manufacturer_i18n" => array("ManufacturerI18n", "ManufacturerI18ns"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\ManufacturerContainer::getManufacturers()

```
array jtl\Connector\ModelContainer\ManufacturerContainer::\jtl\Connector\ModelContainer\ManufacturerContainer::getManufacturers()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\ManufacturerContainer::getManufacturerI18ns()

```
array jtl\Connector\ModelContainer\ManufacturerContainer::\jtl\Connector\ModelContainer\ManufacturerContainer::getManufacturerI18ns()()
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


