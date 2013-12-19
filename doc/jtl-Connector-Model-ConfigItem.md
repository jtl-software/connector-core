jtl\Connector\Model\ConfigItem
===============

ConfigItem Model
A config Item that is displayed in a config Group.

Config item can reference to a specific productId to inherit price, name and description.


* Class name: ConfigItem
* Namespace: jtl\Connector\Model
* Parent class: jtl\Core\Model\DataModel





Properties
----------


### $_id

```
protected string $_id = "0"
```





* Visibility: **protected**


### $_configGroupId

```
protected string $_configGroupId = "0"
```





* Visibility: **protected**


### $_productId

```
protected string $_productId = "0"
```





* Visibility: **protected**


### $_type

```
protected int $_type
```





* Visibility: **protected**


### $_isPreSelected

```
protected bool $_isPreSelected = false
```





* Visibility: **protected**


### $_isRecommended

```
protected bool $_isRecommended = false
```





* Visibility: **protected**


### $_inheritProductName

```
protected bool $_inheritProductName = false
```





* Visibility: **protected**


### $_inheritProductPrice

```
protected bool $_inheritProductPrice = false
```





* Visibility: **protected**


### $_showDiscount

```
protected bool $_showDiscount = True
```





* Visibility: **protected**


### $_showSurcharge

```
protected bool $_showSurcharge = False
```





* Visibility: **protected**


### $_ignoreMultiplier

```
protected bool $_ignoreMultiplier = False
```





* Visibility: **protected**


### $_minQuantity

```
protected double $_minQuantity
```





* Visibility: **protected**


### $_maxQuantity

```
protected double $_maxQuantity
```





* Visibility: **protected**


### $_initialQuantity

```
protected double $_initialQuantity = 1
```





* Visibility: **protected**


### $_sort

```
protected int $_sort
```





* Visibility: **protected**


### $_vat

```
protected double $_vat = 0.0
```





* Visibility: **protected**


Methods
-------


### \jtl\Connector\Model\ConfigItem::__set()

```
mixed jtl\Connector\Model\ConfigItem::\jtl\Connector\Model\ConfigItem::__set()(string $name, string $value)
```

ConfigItem Setter



* Visibility: **public**

#### Arguments

* $name **string**
* $value **string**



### \jtl\Connector\Model\ConfigItem::map()

```
mixed jtl\Connector\Model\ConfigItem::\jtl\Connector\Model\ConfigItem::map()($toWawi, \stdClass $obj)
```

(non-PHPdoc)



* Visibility: **public**

#### Arguments

* $toWawi **mixed**
* $obj **stdClass**


