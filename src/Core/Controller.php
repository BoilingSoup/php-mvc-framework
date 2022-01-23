<?php

namespace Core;

/**
 * Base controller
 */

abstract class Controller
{
  public function __construct(protected array $routeParams)
  {
  }

  public function __call(string $name, mixed $args): void
  {
    $method = $name . 'Action';

    if (!method_exists($this, $method)) {
      echo "Method {$method} not found in controller " . get_class($this);
    }

    if ($this->before() !== false) {
      call_user_func_array([$this, $method], $args);
      $this->after();
    }
  }

  protected function before()
  {
  }

  protected function after()
  {
  }
}
