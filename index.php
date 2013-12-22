<?php

include "autoload.php";


$router = new Router(new Request($_GET, $_POST, $_REQUEST, $_SERVER), ClassLoader::getInstance(), 'Home');
$router->route(new RouterParams($_REQUEST));
