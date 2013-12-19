jtl\Connector\Installer\Installer
===============

Description of Installer




* Class name: Installer
* Namespace: jtl\Connector\Installer
* Parent class: jtl\Core\Application\Application





Properties
----------


### $twig

```
public \Twig_Environment $twig = null
```

Twig environment object, used for rendering templates



* Visibility: **public**
* This property is **static**.


### $config

```
public \jtl\Core\Utilities\Config\Config $config = null
```

Connector configuration object



* Visibility: **public**
* This property is **static**.


### $_currentStep

```
protected int $_currentStep = 1
```

Current installer step index



* Visibility: **protected**


### $_textDomain

```
protected string $_textDomain = 'jtl-connector'
```

Gettext text domain for this installer. Should be overwritten by the
child implementation



* Visibility: **protected**


Methods
-------


### \jtl\Connector\Installer\Installer::getInstallSteps()

```
array jtl\Connector\Installer\Installer::\jtl\Connector\Installer\Installer::getInstallSteps()()
```





* Visibility: **protected**



### \jtl\Connector\Installer\Installer::currentStep()

```
mixed jtl\Connector\Installer\Installer::\jtl\Connector\Installer\Installer::currentStep()()
```





* Visibility: **public**



### \jtl\Connector\Installer\Installer::stepUrl()

```
mixed jtl\Connector\Installer\Installer::\jtl\Connector\Installer\Installer::stepUrl()($index)
```





* Visibility: **public**

#### Arguments

* $index **mixed**



### \jtl\Connector\Installer\Installer::runStep()

```
mixed jtl\Connector\Installer\Installer::\jtl\Connector\Installer\Installer::runStep()($index)
```





* Visibility: **protected**

#### Arguments

* $index **mixed**



### \jtl\Connector\Installer\Installer::advance()

```
mixed jtl\Connector\Installer\Installer::\jtl\Connector\Installer\Installer::advance()()
```





* Visibility: **public**



### \jtl\Connector\Installer\Installer::run()

```
mixed jtl\Connector\Installer\Installer::\jtl\Connector\Installer\Installer::run()()
```





* Visibility: **public**


