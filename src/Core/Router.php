<?php

declare(strict_types=1);

class Router
{
  protected $routes = [];
  protected $params = [];

  public function add(string $route, array $params): void
  {
    $this->routes[$route] = $params;
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }

  public function match($url): bool
  {
    if (array_key_exists($url, $this->routes)) {
      $this->params = $this->routes[$url];
      return true;
    }

    return false;
  }

  public function getParams(): array
  {
    return $this->params;
  }
}
