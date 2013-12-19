jtl\Connector\Feature\Importer\Json
===============

Json importer class




* Class name: Json
* Namespace: jtl\Connector\Feature\Importer
* Parent class: [jtl\Connector\Feature\Importer\Base](jtl-Connector-Feature-Importer-Base.md)





Properties
----------


### $file

```
protected string $file
```





* Visibility: **protected**


### $_name

```
protected string $_name = 'Json'
```





* Visibility: **protected**


### $_classes

```
protected mixed $_classes
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


Methods
-------


### \jtl\Connector\Feature\Importer\Json::__construct()

```
mixed jtl\Connector\Feature\Importer\Json::\jtl\Connector\Feature\Importer\Json::__construct()($json_file)
```

Creates the instance.



* Visibility: **public**

#### Arguments

* $json_file **mixed**



### \jtl\Connector\Feature\Importer\Json::load()

```
array jtl\Connector\Feature\Importer\Json::\jtl\Connector\Feature\Importer\Json::load()()
```

Reads the feature file defined in the constructor and uses the JSON
serializer to return all datas as associative array.



* Visibility: **public**



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


