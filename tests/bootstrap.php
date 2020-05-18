<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

require_once __DIR__ . DIRECTORY_SEPARATOR . '../vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

define('CONNECTOR_DIR', __DIR__);

define('TEST_DIR', __DIR__);
