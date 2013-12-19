jtl\Connector\ModelContainer\DeliveryNoteContainer
===============

DeliveryNote Container Class




* Class name: DeliveryNoteContainer
* Namespace: jtl\Connector\ModelContainer
* Parent class: [jtl\Connector\ModelContainer\CoreContainer](jtl-Connector-ModelContainer-CoreContainer.md)





Properties
----------


### $_deliveryNotes

```
protected \jtl\Connector\Model\DeliveryNote[] $_deliveryNotes
```





* Visibility: **protected**


### $_deliveryNotePoss

```
protected \jtl\Connector\Model\DeliveryNotePos[] $_deliveryNotePoss
```





* Visibility: **protected**


### $_shipments

```
protected \jtl\Connector\Model\Shipment[] $_shipments
```





* Visibility: **protected**


### $items

```
public mixed $items = array("delivery_note" => array("DeliveryNote", "DeliveryNotes"), "delivery_note_pos" => array("DeliveryNotePos", "DeliveryNotePoss"), "shipment" => array("Shipment", "Shipments"))
```





* Visibility: **public**


Methods
-------


### \jtl\Connector\ModelContainer\DeliveryNoteContainer::getDeliveryNotes()

```
array jtl\Connector\ModelContainer\DeliveryNoteContainer::\jtl\Connector\ModelContainer\DeliveryNoteContainer::getDeliveryNotes()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\DeliveryNoteContainer::getDeliveryNotePoss()

```
array jtl\Connector\ModelContainer\DeliveryNoteContainer::\jtl\Connector\ModelContainer\DeliveryNoteContainer::getDeliveryNotePoss()()
```





* Visibility: **public**



### \jtl\Connector\ModelContainer\DeliveryNoteContainer::getShipments()

```
array jtl\Connector\ModelContainer\DeliveryNoteContainer::\jtl\Connector\ModelContainer\DeliveryNoteContainer::getShipments()()
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


