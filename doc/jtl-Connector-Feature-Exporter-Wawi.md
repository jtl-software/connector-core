jtl\Connector\Feature\Exporter\Wawi
===============

Wawi exporter class




* Class name: Wawi
* Namespace: jtl\Connector\Feature\Exporter
* Parent class: [jtl\Connector\Feature\Exporter\Base](jtl-Connector-Feature-Exporter-Base.md)





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


### \jtl\Connector\Feature\Exporter\Wawi::export()

```
array jtl\Connector\Feature\Exporter\Wawi::\jtl\Connector\Feature\Exporter\Wawi::export()(array $array)
```

Dummy exporter that will forward the array as export to be conform with
the standards.



* Visibility: **public**

#### Arguments

* $array **array** - &lt;p&gt;The default feature array.&lt;/p&gt;



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



### \jtl\Connector\Feature\Exporter\IExporter::export()

```
mixed jtl\Connector\Feature\Exporter\IExporter::\jtl\Connector\Feature\Exporter\IExporter::export()(array $array)
```

Should export the given array into the specified Format.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)

#### Arguments

* $array **array** - &lt;p&gt;The features object array.&lt;/p&gt;


