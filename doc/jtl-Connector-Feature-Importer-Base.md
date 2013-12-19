jtl\Connector\Feature\Importer\Base
===============

Base importer class.




* Class name: Base
* Namespace: jtl\Connector\Feature\Importer
* This is an **abstract** class
* Parent class: [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)
* This class implements: [jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)




Properties
----------


### $_name

```
protected string $_name
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


### $_classes

```
protected mixed $_classes
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


Methods
-------


### \jtl\Connector\Feature\Base\Base::getName()

```
string jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::getName()()
```

Returns the name.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)



### \jtl\Connector\Feature\Base\Base::setName()

```
boolean jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::setName()(string $name)
```

Sets the name.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)

#### Arguments

* $name **string**



### \jtl\Connector\Feature\Base\Base::getClasses()

```
array jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::getClasses()()
```

Returns all declared classes.

We need this way, because the autoloader will try to include the class
file if we use "class_exists" or similar functions.

* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)



### \jtl\Connector\Feature\Importer\IImporter::load()

```
array jtl\Connector\Feature\Importer\IImporter::\jtl\Connector\Feature\Importer\IImporter::load()()
```

Imports the features array with the given importer.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)


