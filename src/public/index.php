<?php

declare(strict_types=1);

/**
 * Front controller
 */

// Require the controller class
require '../App/Controllers/Posts.php';

/**
 * Routing
 */
require '../Core/Router.php';

$router = new Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

/*
// Display the routing table
echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';

// Match the requested route
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
  echo '<pre>';
  var_dump($router->getParams());
  echo '</pre>';
}
*/

$router->dispatch($_SERVER['QUERY_STRING']);
