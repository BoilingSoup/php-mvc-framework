<?php

/**
 * Front controller
 * PHP version 5.4
 */

// echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

/**
 * Routing
 */

require '../Core/Router.php';

$router = new Router();

echo get_class($router);
