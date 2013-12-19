jtl\Connector\Installer\Step\WelcomeStep
===============

Description of WelcomeStep




* Class name: WelcomeStep
* Namespace: jtl\Connector\Installer\Step
* Parent class: [jtl\Connector\Installer\Step\InstallerStep](jtl-Connector-Installer-Step-InstallerStep.md)





Properties
----------


### $_template

```
protected mixed $_template = 'step_welcome'
```





* Visibility: **protected**


### $_installer

```
protected \jtl\Connector\Installer\Installer $_installer = null
```

Installer object



* Visibility: **protected**
* This property is defined by [jtl\Connector\Installer\Step\InstallerStep](jtl-Connector-Installer-Step-InstallerStep.md)


Methods
-------


### \jtl\Connector\Installer\Step\InstallerStep::addParameter()

```
mixed jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::addParameter()(string $key, mixed $value)
```

Setter method for the template parameters



* Visibility: **protected**
* This method is defined by [jtl\Connector\Installer\Step\InstallerStep](jtl-Connector-Installer-Step-InstallerStep.md)

#### Arguments

* $key **string**
* $value **mixed**



### \jtl\Connector\Installer\Step\InstallerStep::deleteParameter()

```
mixed jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::deleteParameter()(string $key)
```

Delete method for template parameters



* Visibility: **protected**
* This method is defined by [jtl\Connector\Installer\Step\InstallerStep](jtl-Connector-Installer-Step-InstallerStep.md)

#### Arguments

* $key **string**



### \jtl\Connector\Installer\Step\InstallerStep::__construct()

```
mixed jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::__construct()(\jtl\Connector\Installer\Installer $installer)
```





* Visibility: **public**
* This method is defined by [jtl\Connector\Installer\Step\InstallerStep](jtl-Connector-Installer-Step-InstallerStep.md)

#### Arguments

* $installer **[jtl\Connector\Installer\Installer](jtl-Connector-Installer-Installer.md)**



### \jtl\Connector\Installer\Step\InstallerStep::run()

```
\jtl\Connector\Installer\Step\type jtl\Connector\Installer\Step\InstallerStep::\jtl\Connector\Installer\Step\InstallerStep::run()()
```

Executes the current step



* Visibility: **public**
* This method is defined by [jtl\Connector\Installer\Step\InstallerStep](jtl-Connector-Installer-Step-InstallerStep.md)


