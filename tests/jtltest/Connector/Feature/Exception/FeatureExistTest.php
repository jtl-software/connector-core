<?php

use jtl\Connector\Feature\Exception\FeatureExist as ExceptionFeatureExists;

class FeatureExistTest extends PHPUnit_Framework_TestCase {

    /**
     * @expectedException jtl\Connector\Feature\Exception\FeatureExist
     */
    public function testDefault() {
        throw new ExceptionFeatureExists('Test feature');
    }

}