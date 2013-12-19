jtl\Connector\Feature\Manager
===============

Manager class for the feature parser of the famous JTL connector.




* Class name: Manager
* Namespace: jtl\Connector\Feature
* Parent class: [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)





Properties
----------


### $_methods

```
protected array $_methods = array()
```





* Visibility: **protected**


### $_parameters

```
protected array $_parameters = array()
```





* Visibility: **protected**


### $_producer

```
protected \jtl\Connector\Feature\jtl\Connector\Feature\Producer $_producer
```





* Visibility: **protected**


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


### \jtl\Connector\Feature\Manager::__construct()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::__construct()(\jtl\Connector\Feature\Producer $producer)
```

Constructor.



* Visibility: **public**

#### Arguments

* $producer **[jtl\Connector\Feature\Producer](jtl-Connector-Feature-Producer.md)** - &lt;p&gt;The base class instance
that is required to import and export our feature.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::setProducer()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::setProducer()(\jtl\Connector\Feature\Producer $producer)
```

Sets the producer, the base class of this converting manager.



* Visibility: **public**

#### Arguments

* $producer **[jtl\Connector\Feature\Producer](jtl-Connector-Feature-Producer.md)**



### \jtl\Connector\Feature\Manager::getProducer()

```
\jtl\Connector\Feature\jtl\Connector\Feature\Producer jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::getProducer()()
```

Returns the Producer.



* Visibility: **public**



### \jtl\Connector\Feature\Manager::getParameters()

```
array jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::getParameters()()
```

Returns the parameters that will be extraced during the import/export.



* Visibility: **public**



### \jtl\Connector\Feature\Manager::registerParameter()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::registerParameter()(string $name)
```

Registers a parameter where the producer will looking for during the
import/export phase.



* Visibility: **public**

#### Arguments

* $name **string** - &lt;p&gt;The name of the needed parameter.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::registerParameters()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::registerParameters()(array $parameters)
```

Registers multiple parameters.



* Visibility: **public**

#### Arguments

* $parameters **array** - &lt;p&gt;Standard key value array.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::existsParameter()

```
bool jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::existsParameter()(string $name)
```

Checks if a parameter already exists and returns the result as boolean.



* Visibility: **protected**

#### Arguments

* $name **string** - &lt;p&gt;The parameter name.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::getMethods()

```
array jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::getMethods()()
```

Returns the methods that will be extraced during the import/export.



* Visibility: **public**



### \jtl\Connector\Feature\Manager::registerMethod()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::registerMethod()(string $name)
```

Registers a method by name where the producer will look for during the
import/export phase.



* Visibility: **public**

#### Arguments

* $name **string** - &lt;p&gt;The name of the method.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::registerMethods()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::registerMethods()(array $methods)
```

Registers multiple methods at once.



* Visibility: **public**

#### Arguments

* $methods **array** - &lt;p&gt;Standard key/value array.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::existsMethod()

```
bool jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::existsMethod()(string $name)
```

Checks if a method already exists and returns the result as boolean.



* Visibility: **protected**

#### Arguments

* $name **string** - &lt;p&gt;The parameter name.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::checkProducer()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::checkProducer()(string $type)
```

Will check if the producer exists.

If there is no producer, we need to inform the caller about his
inconsistency.

* Visibility: **protected**

#### Arguments

* $type **string** - &lt;p&gt;The type of process, this should usually be &#039;Import&#039;
or &#039;Export&#039;.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::import()

```
array jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::import()(\jtl\Connector\Feature\Importer\IImporter $importer)
```

Starts the importing process in the producer.



* Visibility: **public**

#### Arguments

* $importer **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)** - &lt;p&gt;The importer
object, that implements the IImporter interface to be conform to this
manager/producer.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::export()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::export()(\jtl\Connector\Feature\Exporter\IExporter $export)
```

Starts the exporting process in the producer.



* Visibility: **public**

#### Arguments

* $export **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)** - &lt;p&gt;The exporter
object, that implements the IExporter interface to be conform to this
manager/producer.&lt;/p&gt;



### \jtl\Connector\Feature\Manager::transform()

```
mixed jtl\Connector\Feature\Manager::\jtl\Connector\Feature\Manager::transform()(\jtl\Connector\Feature\Importer\IImporter $from, \jtl\Connector\Feature\Exporter\IExporter $to)
```

Will do the import and export in one call.



* Visibility: **public**

#### Arguments

* $from **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)** - &lt;p&gt;The Importer
object, that implements the IImporter interface to be conform to this
manager/producer.&lt;/p&gt;
* $to **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)** - &lt;p&gt;The Exporter
object, that implements the IExporter interface to be conform to this
manager/producer.&lt;/p&gt;



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


