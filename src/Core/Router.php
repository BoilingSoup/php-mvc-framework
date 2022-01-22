<?php

declare(strict_types=1);

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

    // Add start and end delimiters, and case insensitive flag
    $route = '/^' . $route . '$/i';

    $this->routes[$route] = $params;
  }

  public function getRoutes(): array
  {
    return $this->routes;
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

  public function getParams(): array
  {
    return $this->params;
  }
}
