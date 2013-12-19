jtl\Connector\Feature\Feature\Base
===============

Basic feature class.




* Class name: Base
* Namespace: jtl\Connector\Feature\Feature
* This is an **abstract** class
* Parent class: [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)
* This class implements: [jtl\Connector\Feature\Feature\IFeature](jtl-Connector-Feature-Feature-IFeature.md)




Properties
----------


### $_methods

```
protected array $_methods = array()
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


### \jtl\Connector\Feature\Feature\Base::addMethod()

```
mixed jtl\Connector\Feature\Feature\Base::\jtl\Connector\Feature\Feature\Base::addMethod()(\jtl\Connector\Feature\Method\IMethod $method)
```

Adds a new method to the feature.



* Visibility: **public**

#### Arguments

* $method **[jtl\Connector\Feature\Method\IMethod](jtl-Connector-Feature-Method-IMethod.md)** - &lt;p&gt;A method object.&lt;/p&gt;



### \jtl\Connector\Feature\Feature\Base::delMethod()

```
mixed jtl\Connector\Feature\Feature\Base::\jtl\Connector\Feature\Feature\Base::delMethod()(string $name)
```

Deletes a method from a feature by name.



* Visibility: **public**

#### Arguments

* $name **string** - &lt;p&gt;The method name inside of the _methods array.&lt;/p&gt;



### \jtl\Connector\Feature\Feature\Base::existsMethod()

```
boolean jtl\Connector\Feature\Feature\Base::\jtl\Connector\Feature\Feature\Base::existsMethod()(string $name)
```

Returns a boolean if a method exists in the _methods array.



* Visibility: **public**

#### Arguments

* $name **string** - &lt;p&gt;The name of the method we&#039;re looking for.&lt;/p&gt;



### \jtl\Connector\Feature\Feature\Base::getMethod()

```
\jtl\Connector\Feature\Method\IMethod jtl\Connector\Feature\Feature\Base::\jtl\Connector\Feature\Feature\Base::getMethod()(string $name)
```

Returns a method of a feature if it exists.



* Visibility: **public**

#### Arguments

* $name **string** - &lt;p&gt;The name of your requested method.&lt;/p&gt;



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


