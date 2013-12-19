jtl\Connector\Feature\Base\Base
===============

Base class for all feature classes.




* Class name: Base
* Namespace: jtl\Connector\Feature\Base
* This is an **abstract** class





Properties
----------


### $_name

```
protected string $_name
```





* Visibility: **protected**


### $_classes

```
protected mixed $_classes
```





* Visibility: **protected**


Methods
-------


### \jtl\Connector\Feature\Base\Base::getName()

```
string jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::getName()()
```

Returns the name.



* Visibility: **public**



### \jtl\Connector\Feature\Base\Base::setName()

```
boolean jtl\Connector\Feature\Base\Base::\jtl\Connector\Feature\Base\Base::setName()(string $name)
```

Sets the name.



* Visibility: **public**

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


