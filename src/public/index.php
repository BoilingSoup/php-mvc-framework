<?php

declare(strict_types=1);

/**
 * Composer autoloader
 */
require_once '../vendor/autoload.php';

/**
 * Front controller
 */

/**
 * Error and Exception handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

/**
 * Load .env variables
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
// parse SHOW_ERRORS env variable to boolean
if (strtolower((string) $_ENV["SHOW_ERRORS"]) === "true") $_ENV["SHOW_ERRORS"] = true;
if (strtolower((string) $_ENV["SHOW_ERRORS"]) === "false") $_ENV["SHOW_ERRORS"] = false;

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);
