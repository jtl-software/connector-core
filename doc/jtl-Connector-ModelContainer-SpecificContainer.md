jtl\Connector\ModelContainer\SpecificContainer
===============

Specific Container Class




* Class name: SpecificContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_specifics

```
protected \jtl\Connector\Model\Specific[] $_specifics
```





* Visibility: **protected**


### $_specificI18ns

```
protected \jtl\Connector\Model\SpecificI18n[] $_specificI18ns
```





* Visibility: **protected**


### $_specificValues

```
protected \jtl\Connector\Model\SpecificValue[] $_specificValues
```





* Visibility: **protected**


### $_specificValueI18ns

```
protected \jtl\Connector\Model\SpecificValueI18n[] $_specificValueI18ns
```





* Visibility: **protected**


### $items

```
public mixed $items = array("specific" => array("Specific", "Specifics"), "specific_i18n" => array("SpecificI18n", "SpecificI18ns"), "specific_value" => array("SpecificValue", "SpecificValues"), "specific_value_i18n" => array("SpecificValueI18n", "SpecificValueI18ns"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\SpecificContainer::getSpecifics()

```
array jtl\Connector\ModelContainer\SpecificContainer::\jtl\Connector\ModelContainer\SpecificContainer::getSpecifics()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\SpecificContainer::getSpecificI18ns()

```
array jtl\Connector\ModelContainer\SpecificContainer::\jtl\Connector\ModelContainer\SpecificContainer::getSpecificI18ns()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\SpecificContainer::getSpecificValues()

```
array jtl\Connector\ModelContainer\SpecificContainer::\jtl\Connector\ModelContainer\SpecificContainer::getSpecificValues()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\SpecificContainer::getSpecificValueI18ns()

```
array jtl\Connector\ModelContainer\SpecificContainer::\jtl\Connector\ModelContainer\SpecificContainer::getSpecificValueI18ns()()
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


