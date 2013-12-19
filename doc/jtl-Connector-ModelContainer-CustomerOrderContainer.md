jtl\Connector\ModelContainer\CustomerOrderContainer
===============

CustomerOrder Container Class




* Class name: CustomerOrderContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_customerOrders

```
protected \jtl\Connector\Model\CustomerOrder[] $_customerOrders
```





* Visibility: **protected**


### $_customerOrderAttrs

```
protected \jtl\Connector\Model\CustomerOrderAttr[] $_customerOrderAttrs
```





* Visibility: **protected**


### $_customerOrderPositions

```
protected \jtl\Connector\Model\CustomerOrderPosition[] $_customerOrderPositions
```





* Visibility: **protected**


### $_customerOrderPositionVariations

```
protected \jtl\Connector\Model\CustomerOrderPositionVariation[] $_customerOrderPositionVariations
```





* Visibility: **protected**


### $_customerOrderPaymentInfos

```
protected \jtl\Connector\Model\CustomerOrderPaymentInfo[] $_customerOrderPaymentInfos
```





* Visibility: **protected**


### $_customerOrderShippingAddresses

```
protected \jtl\Connector\Model\CustomerOrderShippingAddress[] $_customerOrderShippingAddresses
```





* Visibility: **protected**


### $_customerOrderBillingAddresses

```
protected \jtl\Connector\Model\CustomerOrderBillingAddress[] $_customerOrderBillingAddresses
```





* Visibility: **protected**


### $items

```
public mixed $items = array("customer_order" => array("CustomerOrder", "CustomerOrders"), "customer_order_attr" => array("CustomerOrderAttr", "CustomerOrderAttrs"), "customer_order_position" => array("CustomerOrderPosition", "CustomerOrderPositions"), "customer_order_position_variation" => array("CustomerOrderPositionVariation", "CustomerOrderPositionVariations"), "customer_order_payment_info" => array("CustomerOrderPaymentInfo", "CustomerOrderPaymentInfos"), "customer_order_shipping_address" => array("CustomerOrderShippingAddress", "CustomerOrderShippingAddresses"), "customer_order_billing_address" => array("CustomerOrderBillingAddress", "CustomerOrderBillingAddresses"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrders()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrders()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderAttrs()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderAttrs()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderPositions()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderPositions()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderPositionVariations()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderPositionVariations()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderPaymentInfos()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderPaymentInfos()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderShippingAddresses()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderShippingAddresses()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderBillingAddresses()

```
array jtl\Connector\ModelContainer\CustomerOrderContainer::\jtl\Connector\ModelContainer\CustomerOrderContainer::getCustomerOrderBillingAddresses()()
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


