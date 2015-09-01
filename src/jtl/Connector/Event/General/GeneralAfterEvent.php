<?php
namespace jtl\Connector\Event\General;

use \Symfony\Component\EventDispatcher\Event;

class GeneralAfterEvent extends Event
{
    const EVENT_NAME = 'general.after';

    protected $entity;
    protected $controller;
    protected $action;
    protected $class;

    public function __construct(&$entity, $class, $controller, $action)
    {
        $this->entity = $entity;
        $this->class = $class;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }
}