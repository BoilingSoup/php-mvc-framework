<?php

declare(strict_types=1);

class Router
{
  protected $routes = [];

  public function add(string $route, array $params): void
  {
    $this->routes[$route] = $params;
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }
}
