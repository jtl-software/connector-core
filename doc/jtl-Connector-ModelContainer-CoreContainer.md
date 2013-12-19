jtl\Connector\ModelContainer\CoreContainer
===============

Core Container Class




* Class name: CoreContainer
* Namespace: jtl\Connector\ModelContainer
* This is an **abstract** class
* This class implements: jtl\Core\ModelContainer\IModelContainer






Methods
-------


### \jtl\Connector\ModelContainer\CoreContainer::add()

```
mixed jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::add()($type, $object, $useValidation)
```

(non-PHPdoc)



* Visibility: **public**

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

#### Arguments

* $type **mixed**



### \jtl\Connector\ModelContainer\CoreContainer::update()

```
bool jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::update()(string $type, array $kvs)
```

Updates every object from type $type with given property values



* Visibility: **public**

#### Arguments

* $type **string**
* $kvs **array**



### \jtl\Connector\ModelContainer\CoreContainer::getPublic()

```
\jtl\Connector\ModelContainer\stdClass jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::getPublic()(array $excludes, array $subExcludes)
```

Convert the Container and SubItems into stdClass Object



* Visibility: **public**

#### Arguments

* $excludes **array**
* $subExcludes **array**


