jtl\Connector\ModelContainer\CustomerContainer
===============

Customer Container Class




* Class name: CustomerContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_customers

```
protected \jtl\Connector\Model\Customer[] $_customers
```





* Visibility: **protected**


### $_customerAttrs

```
protected \jtl\Connector\Model\CustomerAttr[] $_customerAttrs
```





* Visibility: **protected**


### $items

```
public mixed $items = array("customer" => array("Customer", "Customers"), "customer_attr" => array("CustomerAttr", "CustomerAttrs"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\CustomerContainer::getCustomers()

```
array jtl\Connector\ModelContainer\CustomerContainer::\jtl\Connector\ModelContainer\CustomerContainer::getCustomers()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerContainer::getCustomerAttrs()

```
array jtl\Connector\ModelContainer\CustomerContainer::\jtl\Connector\ModelContainer\CustomerContainer::getCustomerAttrs()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CoreContainer::add()

```
mixed jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::add()($type, $object, $useValidation)
```

(non-PHPdoc)



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

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
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $type **mixed**



### \jtl\Connector\ModelContainer\CoreContainer::update()

```
bool jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::update()(string $type, array $kvs)
```

Updates every object from type $type with given property values



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $type **string**
* $kvs **array**



### \jtl\Connector\ModelContainer\CoreContainer::getPublic()

```
\jtl\Connector\ModelContainer\stdClass jtl\Connector\ModelContainer\CoreContainer::\jtl\Connector\ModelContainer\CoreContainer::getPublic()(array $excludes, array $subExcludes)
```

Convert the Container and SubItems into stdClass Object



* Visibility: **public**
* This method is defined by [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)

#### Arguments

* $excludes **array**
* $subExcludes **array**


