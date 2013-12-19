jtl\Connector\Installer\Step\InstallerStep
===============

Description of InstallerStep




* Class name: InstallerStep
* Namespace: jtl\Connector\Installer\Step
* This is an **abstract** class





Properties
----------


### $_template

```
protected mixed $_template
```





* Visibility: **protected**


### $_data

```
private array $_data = array()
```

Template data;



* Visibility: **private**


### $_installer

```
protected \jtl\Connector\Installer\Installer $_installer = null
```

Installer object



* Visibility: **protected**


Methods
-------


### \jtl\Connector\Installer\Step\InstallerStep::addParameter()

```
mixed jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::addParameter()(string $key, mixed $value)
```

Setter method for the template parameters



* Visibility: **protected**

#### Arguments

* $key **string**
* $value **mixed**



### \jtl\Connector\Installer\Step\InstallerStep::deleteParameter()

```
mixed jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::deleteParameter()(string $key)
```

Delete method for template parameters



* Visibility: **protected**

#### Arguments

* $key **string**



### \jtl\Connector\Installer\Step\InstallerStep::__construct()

```
mixed jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::__construct()(\jtl\Connector\Installer\Installer $installer)
```





* Visibility: **public**

#### Arguments

* $installer **[jtl\Connector\Installer\Installer](jtl-Connector-Installer-Installer.md)**



### \jtl\Connector\Installer\Step\InstallerStep::run()

```
\jtl\Connector\Installer\Step\type jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::run()()
```

Executes the current step



* Visibility: **public**


