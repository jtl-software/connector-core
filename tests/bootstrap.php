<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

require_once __DIR__ . DIRECTORY_SEPARATOR . '../vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');

const TEST_DIR = __DIR__;
