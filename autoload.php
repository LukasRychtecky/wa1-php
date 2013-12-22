<?php
require 'vendor/autoload.php';

require_once 'core/utils/ClassLoader.php';
ClassLoader::getInstance()->load(array('app', 'core'));

spl_autoload_register(function($className) {
	$class = ClassLoader::getInstance()->get($className);
	if ($class === null) return;
	require_once $class;
});

define('ASSETS', 'assets');
