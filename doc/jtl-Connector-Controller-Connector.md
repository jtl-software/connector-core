jtl\Connector\Controller\Connector
===============

Base Config Controller




* Class name: Connector
* Namespace: jtl\Connector\Controller
* Parent class: jtl\Core\Controller\Controller







Methods
-------


### \jtl\Connector\Controller\Connector::push()

```
mixed jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::push()($params)
```

(non-PHPdoc)



* Visibility: **public**

#### Arguments

* $params **mixed**



### \jtl\Connector\Controller\Connector::pull()

```
mixed jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::pull()($params)
```

(non-PHPdoc)



* Visibility: **public**

#### Arguments

* $params **mixed**



### \jtl\Connector\Controller\Connector::delete()

```
mixed jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::delete()($params)
```

(non-PHPdoc)



* Visibility: **public**

#### Arguments

* $params **mixed**



### \jtl\Connector\Controller\Connector::statistic()

```
mixed jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::statistic()($params)
```

(non-PHPdoc)



* Visibility: **public**

#### Arguments

* $params **mixed**



### \jtl\Connector\Controller\Connector::init()

```
mixed jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::init()(mixed $params)
```

Initialize the connector.



* Visibility: **public**

#### Arguments

* $params **mixed** - &lt;p&gt;Can be empty or not defined and a string.&lt;/p&gt;



### \jtl\Connector\Controller\Connector::features()

```
mixed jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::features()(mixed $params)
```

Returns the connector features.



* Visibility: **public**

#### Arguments

* $params **mixed** - &lt;p&gt;Can be empty or not defined and a string.&lt;/p&gt;



### \jtl\Connector\Controller\Connector::parseHttpDigest()

```
array|false jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::parseHttpDigest()(string $str)
```

Parse HTTP digest request



* Visibility: **protected**

#### Arguments

* $str **string** - &lt;p&gt;HTTP Digest request data&lt;/p&gt;



### \jtl\Connector\Controller\Connector::auth()

```
\jtl\Connector\Result\Action jtl\Connector\Controller\Connector::\jtl\Connector\Controller\Connector::auth()(mixed $params)
```

Returns the connector auth action



* Visibility: **public**

#### Arguments

* $params **mixed**


