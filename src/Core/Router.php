<?php

declare(strict_types=1);

namespace Core;

class Router
{
  protected $routes = [];
  protected $params = [];

  public function add(string $route, array $params = []): void
  {
    // Convert the route to a regular expression: escape forward slashes
    $route = preg_replace('/\//', '\\/', $route);

    // Convert variables e.g. {controller}
    $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

    // Convert variables with custom regular expressions e.g. {id:\d+}
    $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

    // Add start and end delimiters, and case insensitive flag
    $route = '/^' . $route . '$/i';

    $this->routes[$route] = $params;
  }

  public function match(string $url): bool
  {
    // check if $url matches any of the regex routes
    foreach ($this->routes as $route => $params) {

      if (preg_match($route, $url, $matches)) {
        // if match is found, loop through the controller=>action key value pairs 

        foreach ($matches as $key => $match) {
          if (is_string($key)) {
            $params[$key] = $match;
          }
        }
        $this->params = $params;
        return true;
      }
    }

    return false;
  }

  public function dispatch(string $url): void
  {
    if ($this->match($url)) {
      $controller = $this->params['controller'];
      $controller = $this->convertToStudlyCaps($controller);
      $controller = "App\Controllers\\$controller";

      if (class_exists($controller)) {
        $controllerObject = new $controller();

        $action = $this->params['action'];
        $action = $this->convertToCamelCase($action);

        if (is_callable([$controllerObject, $action])) {
          $controllerObject->$action();
        } else {
          echo "Method {$action} (in controller {$controller}) not found";
        }
      } else {
        echo "Controller class {$controller} not found";
      }
    } else {
      echo 'No route matched.';
    }
  }

  protected function convertToStudlyCaps($string)
  {
    return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
  }

  protected function convertToCamelCase($string)
  {
    return lcfirst($this->convertToStudlyCaps($string));
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }

  public function getParams(): array
  {
    return $this->params;
  }
}
