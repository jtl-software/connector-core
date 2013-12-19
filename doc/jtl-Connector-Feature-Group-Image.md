jtl\Connector\Feature\Group\Image
===============

Special image group, that supports additional parameters inside of the params
array.




* Class name: Image
* Namespace: jtl\Connector\Feature\Group
* Parent class: [jtl\Connector\Feature\Group\Base](jtl-Connector-Feature-Group-Base.md)



Constants
----------


### RELATIONS_KEY_NAME

```
const RELATIONS_KEY_NAME = 'relationTypes'
```





Properties
----------


### $_relation_types

```
protected array $_relation_types = array()
```





* Visibility: **protected**


### $_children

```
protected array $_children
```





* Visibility: **protected**
* This property is defined by [jtl\Connector\Feature\Group\Base](jtl-Connector-Feature-Group-Base.md)


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


### \jtl\Connector\Feature\Group\Image::__construct()

```
mixed jtl\Connector\Feature\Group\Image::\jtl\Connector\Feature\Group\Image::__construct()(array $params)
```

Creates the instance, parses the params and will look for relation types.

If there is the entry with the key "relationTypes" inside of this array,
all relations will be extracted and saved in the _relation_types array.

* Visibility: **public**

#### Arguments

* $params **array** - &lt;p&gt;The features array entry of the image feature as
reference.&lt;/p&gt;



### \jtl\Connector\Feature\Group\Image::getRelations()

```
array jtl\Connector\Feature\Group\Image::\jtl\Connector\Feature\Group\Image::getRelations()()
```

Returns the relations.



* Visibility: **public**



### \jtl\Connector\Feature\Group\Base::addChildren()

```
mixed jtl\Connector\Feature\Group\Base::\jtl\Connector\Feature\Group\Base::addChildren()(mixed $children)
```

Adds a children to the group.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Group\Base](jtl-Connector-Feature-Group-Base.md)

#### Arguments

* $children **mixed** - &lt;p&gt;A children of a group.&lt;/p&gt;



### \jtl\Connector\Feature\Group\Base::getChildrens()

```
array jtl\Connector\Feature\Group\Base::\jtl\Connector\Feature\Group\Base::getChildrens()()
```

Returns all children as array.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Group\Base](jtl-Connector-Feature-Group-Base.md)



### \jtl\Connector\Feature\Group\Base::hasChildren()

```
boolean jtl\Connector\Feature\Group\Base::\jtl\Connector\Feature\Group\Base::hasChildren()()
```

Returns if the Group has children.



* Visibility: **public**
* This method is defined by [jtl\Connector\Feature\Group\Base](jtl-Connector-Feature-Group-Base.md)



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


