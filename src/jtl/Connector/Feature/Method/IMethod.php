<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature\Method;

/**
 * Method interface
 * 
 * @author David Spickers <david.spickers@jtl-software.de>
 */
interface IMethod
{

    public function getName();

    public function isSupported();

    public function setSupported($b);

    public function getComment();

    public function setComment($c);
}