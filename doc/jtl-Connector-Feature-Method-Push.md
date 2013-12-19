jtl\Connector\Feature\Method\Push
===============

Push method.




* Class name: Push
* Namespace: jtl\Connector\Feature\Method
* Parent class: [jtl\Connector\Feature\Method\Base](jtl-Connector-Feature-Method-Base.md)





Properties
----------


### $_name

```
protected mixed $_name = 'push'
```





* Visibility: **protected**


### $supported

```
public boolean $supported
```





* Visibility: **public**
* This property is defined by [jtl\Connector\Feature\Method\Base](jtl-Connector-Feature-Method-Base.md)


### $comment

```
public string $comment
```





* Visibility: **public**
* This property is defined by [jtl\Connector\Feature\Method\Base](jtl-Connector-Feature-Method-Base.md)


### $_classes

```
protected mixed $_classes
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Base\Base](jtl-Connector-Feature-Base-Base.md)


Methods
-------


### \jtl\Connector\Feature\Method\Base::__construct()

```
mixed jtl\Connector\Feature\Method\Base::\jtl\Connector\Feature\Method\Base::__construct()(string $name, boolean $supported, string $comment)
```

Create the instance of your extended method.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Method\Base](jtl-Connector-Feature-Method-Base.md)

#### Arguments

* $name **string** - &lt;p&gt;The name of your method.&lt;/p&gt;
* $supported **boolean** - &lt;p&gt;If the method fulfill itself, it will be
true. Otherwise the supported flag will be false.&lt;/p&gt;
* $comment **string** - &lt;p&gt;A comment about the extended method.&lt;/p&gt;



### \jtl\Connector\Feature\Method\Base::isSupported()

```
boolean jtl\Connector\Feature\Method\Base::\jtl\Connector\Feature\Method\Base::isSupported()()
```

Returns if the method is supported.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Method\Base](jtl-Connector-Feature-Method-Base.md)



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



### \jtl\Connector\Feature\Method\IMethod::getName()

```
string jtl\Connector\Feature\Method\IMethod::\jtl\Connector\Feature\Method\IMethod::getName()()
```

Returns the name of a method.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Method\IMethod](jtl-Connector-Feature-Method-IMethod.md)


