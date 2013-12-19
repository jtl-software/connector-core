jtl\Connector\Feature\Base\IProducer
===============

Producer interface




* Interface name: IProducer
* Namespace: jtl\Connector\Feature\Base
* This is an **interface**






Methods
-------


### \jtl\Connector\Feature\Base\IProducer::setManager()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::setManager()(\jtl\Connector\Feature\Manager $manager)
```





* Visibility: **public**

#### Arguments

* $manager **[jtl\Connector\Feature\Manager](jtl-Connector-Feature-Manager.md)**



### \jtl\Connector\Feature\Base\IProducer::getManager()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::getManager()()
```





* Visibility: **public**



### \jtl\Connector\Feature\Base\IProducer::import()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::import()(\jtl\Connector\Feature\Importer\IImporter $importer)
```





* Visibility: **public**

#### Arguments

* $importer **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)**



### \jtl\Connector\Feature\Base\IProducer::export()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::export()(\jtl\Connector\Feature\Exporter\IExporter $writer)
```





* Visibility: **public**

#### Arguments

* $writer **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)**



### \jtl\Connector\Feature\Base\IProducer::transform()

```
mixed jtl\Connector\Feature\Base\IProducer::\jtl\Connector\Feature\Base\IProducer::transform()(\jtl\Connector\Feature\Importer\IImporter $from, \jtl\Connector\Feature\Exporter\IExporter $to)
```





* Visibility: **public**

#### Arguments

* $from **[jtl\Connector\Feature\Importer\IImporter](jtl-Connector-Feature-Importer-IImporter.md)**
* $to **[jtl\Connector\Feature\Exporter\IExporter](jtl-Connector-Feature-Exporter-IExporter.md)**


