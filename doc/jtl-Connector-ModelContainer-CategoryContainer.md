jtl\Connector\ModelContainer\CategoryContainer
===============

Category Container Class




* Class name: CategoryContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_categories

```
protected \jtl\Connector\Model\Category[] $_categories
```





* Visibility: **protected**


### $_categoryI18ns

```
protected \jtl\Connector\Model\CategoryI18n[] $_categoryI18ns
```





* Visibility: **protected**


### $_categoryAttrs

```
protected \jtl\Connector\Model\CategoryAttr[] $_categoryAttrs
```





* Visibility: **protected**


### $_categoryVisibilities

```
protected \jtl\Connector\Model\CategoryVisibility[] $_categoryVisibilities
```





* Visibility: **protected**


### $_categoryCustomerGroups

```
protected \jtl\Connector\Model\CategoryCustomerGroup[] $_categoryCustomerGroups
```





* Visibility: **protected**


### $items

```
public mixed $items = array("category" => array("Category", "Categories"), "category_i18n" => array("CategoryI18n", "CategoryI18ns"), "category_attr" => array("CategoryAttr", "CategoryAttrs"), "category_visibility" => array("CategoryVisibility", "CategoryVisibilities"), "category_customer_group" => array("CategoryCustomerGroup", "CategoryCustomerGroups"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\CategoryContainer::getCategories()

```
array jtl\Connector\ModelContainer\CategoryContainer::\jtl\Connector\ModelContainer\CategoryContainer::getCategories()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CategoryContainer::getCategoryI18ns()

```
array jtl\Connector\ModelContainer\CategoryContainer::\jtl\Connector\ModelContainer\CategoryContainer::getCategoryI18ns()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CategoryContainer::getCategoryAttrs()

```
array jtl\Connector\ModelContainer\CategoryContainer::\jtl\Connector\ModelContainer\CategoryContainer::getCategoryAttrs()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CategoryContainer::getCategoryVisibilities()

```
array jtl\Connector\ModelContainer\CategoryContainer::\jtl\Connector\ModelContainer\CategoryContainer::getCategoryVisibilities()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CategoryContainer::getCategoryCustomerGroups()

```
array jtl\Connector\ModelContainer\CategoryContainer::\jtl\Connector\ModelContainer\CategoryContainer::getCategoryCustomerGroups()()
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


