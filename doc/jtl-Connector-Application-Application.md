jtl\Connector\Application\Application
===============

Application Class




* Class name: Application
* Namespace: jtl\Connector\Application
* Parent class: jtl\Core\Application\Application





Properties
----------


### $_connectors

```
protected \jtl\Connector\Application\multiple: $_connectors = array()
```

List of connected EndpointConnectors



* Visibility: **protected**
* This property is **static**.


### $config

```
protected \jtl\Core\Config\Config; $config
```





* Visibility: **protected**


### $session

```
public \jtl\Connector\Session\Session $session
```

Global Session



* Visibility: **public**
* This property is **static**.


Methods
-------


### \jtl\Connector\Application\Application::run()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::run()()
```

(non-PHPdoc)



* Visibility: **public**



### \jtl\Connector\Application\Application::execute()

```
\jtl\Core\Rpc\ResponsePacket jtl\Connector\Application\Application::\jtl\Connector\Application\Application::execute()(\jtl\Core\Rpc\RequestPacket $requestpacket, \jtl\Core\Config\Config $config, integer $rpcmode, $imagePath)
```

Execute RPC Method



* Visibility: **protected**

#### Arguments

* $requestpacket **jtl\Core\Rpc\RequestPacket**
* $config **jtl\Core\Config\Config**
* $rpcmode **integer**
* $imagePath **mixed**



### \jtl\Connector\Application\Application::register()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::register()(\jtl\Connector\Application\IEndpointConnector $endpointconnector)
```





* Visibility: **public**
* This method is **static**.

#### Arguments

* $endpointconnector **[jtl\Connector\Application\IEndpointConnector](jtl-Connector-Application-IEndpointConnector.md)**



### \jtl\Connector\Application\Application::runSingle()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::runSingle()(\jtl\Core\Rpc\ResponsePacket $requestpacket, \jtl\Core\Config\Config $config, integer $rpcmode)
```

Single Mode



* Visibility: **protected**

#### Arguments

* $requestpacket **jtl\Core\Rpc\ResponsePacket**
* $config **jtl\Core\Config\Config**
* $rpcmode **integer**



### \jtl\Connector\Application\Application::runBatch()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::runBatch()(array $requestpackets, \jtl\Core\Config\Config $config, integer $rpcmode)
```

Batch Mode



* Visibility: **protected**

#### Arguments

* $requestpackets **array**
* $config **jtl\Core\Config\Config**
* $rpcmode **integer**



### \jtl\Connector\Application\Application::buildRpcResponse()

```
\jtl\Core\Rpc\ResponsePacket jtl\Connector\Application\Application::\jtl\Connector\Application\Application::buildRpcResponse()(\jtl\Core\Rpc\ResponsePacket $requestpacket, \jtl\Connector\Result\Action $actionresult)
```

Build RPC Reponse Packet



* Visibility: **protected**

#### Arguments

* $requestpacket **jtl\Core\Rpc\ResponsePacket**
* $actionresult **[jtl\Connector\Result\Action](jtl-Connector-Result-Action.md)**



### \jtl\Connector\Application\Application::runActionValidation()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::runActionValidation()(\jtl\Core\Rpc\RequestPacket $requestpacket)
```

Validate Action



* Visibility: **protected**

#### Arguments

* $requestpacket **jtl\Core\Rpc\RequestPacket**



### \jtl\Connector\Application\Application::runModelValidation()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::runModelValidation()(\jtl\Core\Rpc\RequestPacket $requestpacket)
```

Validate Model



* Visibility: **protected**

#### Arguments

* $requestpacket **jtl\Core\Rpc\RequestPacket**



### \jtl\Connector\Application\Application::startConfiguration()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::startConfiguration()()
```

Initialises the connector configuration instance.



* Visibility: **protected**



### \jtl\Connector\Application\Application::startSession()

```
mixed jtl\Connector\Application\Application::\jtl\Connector\Application\Application::startSession()($sessionId, $method)
```

Starting Session



* Visibility: **protected**

#### Arguments

* $sessionId **mixed**
* $method **mixed**


