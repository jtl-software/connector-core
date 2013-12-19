jtl\Connector\Feature\Producer
===============

Base class for the producer class.




* Class name: Producer
* Namespace: jtl\Connector\Feature
* Parent class: [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)





Properties
----------


### $_name

```
protected string $_name
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


### $_importer

```
protected \jtl\Connector\Feature\Importer\IImporter $_importer
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_importer_data

```
protected array $_importer_data
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_features

```
protected array $_features
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_active_group

```
protected \jtl\Connector\Feature\Group\IGroup $_active_group
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_groups

```
protected array $_groups
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_methods

```
protected array $_methods
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_parameters

```
protected array $_parameters
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_methods_cmp_str

```
protected string $_methods_cmp_str
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_parameters_cmp_str

```
protected string $_parameters_cmp_str
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_manager

```
protected \jtl\Connector\Feature\Manager $_manager
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)


### $_classes

```
protected mixed $_classes
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


Methods
-------


### \jtl\Connector\Feature\Producer::loadAndValidate()

```
mixed jtl\Connector\Feature\Producer::\jtl\Connector\Feature\Producer::loadAndValidate()()
```

Will start the load process inside of the importer and validates the datas
that will be returned by this method.



* Visibility: **protected**



### \jtl\Connector\Feature\Producer::parse()

```
mixed jtl\Connector\Feature\Producer::\jtl\Connector\Feature\Producer::parse()()
```

Loads the importer, validation and extracting of the datas.



* Visibility: **public**



### \jtl\Connector\Feature\Producer::extractLayers()

```
mixed jtl\Connector\Feature\Producer::\jtl\Connector\Feature\Producer::extractLayers()()
```

Extracts the different layers, methods and parameters.



* Visibility: **protected**



### \jtl\Connector\Feature\Producer::extractLayer()

```
mixed jtl\Connector\Feature\Producer::\jtl\Connector\Feature\Producer::extractLayer()(string $key, mixed $layer, \jtl\Connector\Feature\type $parent)
```

Extracts the actual layer with a given key, manage the parent and adds
(if found) features, groups and childrens to the producer.



* Visibility: **protected**

#### Arguments

* $key **string** - &lt;p&gt;The actual key inside of the feature array.&lt;/p&gt;
* $layer **mixed** - &lt;p&gt;The data.&lt;/p&gt;
* $parent **jtl\Connector\Feature\type** - &lt;p&gt;If there is a active group, all children will be added
to the parent.&lt;/p&gt;



### \jtl\Connector\Feature\Base\Producer::__construct()

```
mixed jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::__construct()(\jtl\Connector\Feature\Manager $manager)
```

Creates the producer instance.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $manager **[jtl\Connector\Feature\Manager](jtl-Connector-Feature-Manager.md)** - &lt;p&gt;Our manager as reference
back.&lt;/p&gt;



### \jtl\Connector\Feature\Base\Producer::parse()

```
mixed jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::parse()()
```





* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)



### \jtl\Connector\Feature\Base\Producer::setManager()

```
mixed jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::setManager()(\jtl\Connector\Feature\Manager $manager)
```

Sets the manager.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $manager **[jtl\Connector\Feature\Manager](jtl-Connector-Feature-Manager.md)**



### \jtl\Connector\Feature\Base\Producer::getManager()

```
\jtl\Connector\Feature\Manager jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::getManager()()
```

Returns the manager.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)



### \jtl\Connector\Feature\Base\Producer::getGroups()

```
array jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::getGroups()()
```

Returns the groups.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)



### \jtl\Connector\Feature\Base\Producer::getFeatures()

```
array jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::getFeatures()()
```

Returns the features.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)



### \jtl\Connector\Feature\Base\Producer::getMethods()

```
array jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::getMethods()()
```

Returns the methods that the producer should look for.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)



### \jtl\Connector\Feature\Base\Producer::import()

```
mixed jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::import()(\jtl\Connector\Feature\Importer\IImporter $importer)
```

Starts the importing process.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $importer **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)** - &lt;p&gt;The importer
object, that implements the IImporter interface to be conform to this
manager/producer.&lt;/p&gt;



### \jtl\Connector\Feature\Base\Producer::export()

```
mixed jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::export()(\jtl\Connector\Feature\Exporter\IExporter $exporter)
```

Starts the exporting process.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $exporter **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)**



### \jtl\Connector\Feature\Base\Producer::transform()

```
mixed jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::transform()(\jtl\Connector\Feature\Importer\IImporter $from, \jtl\Connector\Feature\Exporter\IExporter $to)
```

Will do the import and export in one call.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $from **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)** - &lt;p&gt;The Importer
object, that implements the IImporter interface to be conform to this
manager/producer.&lt;/p&gt;
* $to **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)** - &lt;p&gt;The Exporter
object, that implements the IExporter interface to be conform to this
manager/producer.&lt;/p&gt;



### \jtl\Connector\Feature\Base\Producer::addFeature()

```
\jtl\Connector\Feature\Base\Feature jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::addFeature()(string $name, array $methods)
```

Adds a feature to the producer.



* Visibility: **protected**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $name **string** - &lt;p&gt;The name of the new feature.&lt;/p&gt;
* $methods **array** - &lt;p&gt;An array with the&lt;/p&gt;



### \jtl\Connector\Feature\Base\Producer::addGroup()

```
\jtl\Connector\Feature\Group\IGroup jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::addGroup()(string $name, array $value)
```

Adds a group to the producer.



* Visibility: **protected**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $name **string** - &lt;p&gt;The name of th new group.&lt;/p&gt;
* $value **array** - &lt;p&gt;The params for the new group.&lt;/p&gt;



### \jtl\Connector\Feature\Base\Producer::createMethod()

```
\jtl\Connector\Feature\Method\IMethod jtl\Connector\Feature\Base\Producer::\jtl\Connector\Feature\Base\Producer::createMethod()(string $method, array $params)
```

Adds a method to the producer that will be assigned to a feature.



* Visibility: **protected**
* This method is defined by [jtl\Connector\Feature\Base\Producer](jtl-Connector-Feature-Base-Producer.md)

#### Arguments

* $method **string** - &lt;p&gt;The name of the new method.&lt;/p&gt;
* $params **array** - &lt;p&gt;The params array for the new method.&lt;/p&gt;



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



### \jtl\Connector\Feature\Base\IProducer::setManager()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::setManager()(\jtl\Connector\Feature\Manager $manager)
```





* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\IProducer](jtl-Connector-Feature-Base-IProducer.md)

#### Arguments

* $manager **[jtl\Connector\Feature\Manager](jtl-Connector-Feature-Manager.md)**



### \jtl\Connector\Feature\Base\IProducer::getManager()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::getManager()()
```





* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\IProducer](jtl-Connector-Feature-Base-IProducer.md)



### \jtl\Connector\Feature\Base\IProducer::import()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::import()(\jtl\Connector\Feature\Importer\IImporter $importer)
```





* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\IProducer](jtl-Connector-Feature-Base-IProducer.md)

#### Arguments

* $importer **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)**



### \jtl\Connector\Feature\Base\IProducer::export()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::export()(\jtl\Connector\Feature\Exporter\IExporter $writer)
```





* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\IProducer](jtl-Connector-Feature-Base-IProducer.md)

#### Arguments

* $writer **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)**



### \jtl\Connector\Feature\Base\IProducer::transform()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::transform()(\jtl\Connector\Feature\Importer\IImporter $from, \jtl\Connector\Feature\Exporter\IExporter $to)
```





* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Base\IProducer](jtl-Connector-Feature-Base-IProducer.md)

#### Arguments

* $from **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)**
* $to **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)**


