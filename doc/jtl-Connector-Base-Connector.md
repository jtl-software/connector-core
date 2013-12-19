jtl\Connector\Base\Connector
===============

Base Connector




* Class name: Connector
* Namespace: jtl\Connector\Base
* Parent class: jtl\Core\Utilities\Singleton
* This class implements: [jtl\Connector\Application\IEndpointConnector](jtl-Connector-Application-IEndpointConnector.md)




Properties
----------


### $_config

```
protected mixed $_config
```





* Visibility: **protected**


### $_method

```
protected mixed $_method
```





* Visibility: **protected**


Methods
-------


### \jtl\Connector\Base\Connector::setConfig()

```
mixed jtl\Connector\Base\Connector::\jtl\Connector\Base\Connector::setConfig()(\jtl\Core\Config\Config $config)
```

Setter connector config.



* Visibility: **public**

#### Arguments

* $config **jtl\Core\Config\Config**



### \jtl\Connector\Base\Connector::getConfig()

```
object jtl\Connector\Base\Connector::\jtl\Connector\Base\Connector::getConfig()()
```

Returns the config.



* Visibility: **public**



### \jtl\Connector\Base\Connector::setMethod()

```
\jtl\Core\Controller\Controller jtl\Connector\Base\Connector::\jtl\Connector\Base\Connector::setMethod()(\jtl\Core\Rpc\Method $method)
```

Method Setter



* Visibility: **public**

#### Arguments

* $method **jtl\Core\Rpc\Method**



### \jtl\Connector\Base\Connector::getMethod()

```
\jtl\Core\Rpc\Method jtl\Connector\Base\Connector::\jtl\Connector\Base\Connector::getMethod()()
```

Method Getter



* Visibility: **public**



### \jtl\Connector\Base\Connector::canHandle()

```
mixed jtl\Connector\Base\Connector::\jtl\Connector\Base\Connector::canHandle()()
```

(non-PHPdoc)



* Visibility: **public**



### \jtl\Connector\Base\Connector::handle()

```
mixed jtl\Connector\Base\Connector::\jtl\Connector\Base\Connector::handle()(\jtl\Core\Rpc\RequestPacket $requestpacket)
```

(non-PHPdoc)



* Visibility: **public**

#### Arguments

* $requestpacket **jtl\Core\Rpc\RequestPacket**



### \jtl\Connector\Application\IEndpointConnector::canHandle()

```
mixed jtl\Connector\Application\IEndpointConnector::\jtl\Connector\Application\IEndpointConnector::canHandle()()
```

Checks whether or not a method can be handled



* Visibility: **public**
* This method is defined by [jtl\Connector\Application\IEndpointConnector](jtl-Connector-Application-IEndpointConnector.md)



### \jtl\Connector\Application\IEndpointConnector::handle()

```
mixed jtl\Connector\Application\IEndpointConnector::\jtl\Connector\Application\IEndpointConnector::handle()(\jtl\Core\Rpc\RequestPacket $requestpacket)
```

Controller handle



* Visibility: **public**
* This method is defined by [jtl\Connector\Application\IEndpointConnector](jtl-Connector-Application-IEndpointConnector.md)

#### Arguments

* $requestpacket **jtl\Core\Rpc\RequestPacket**


