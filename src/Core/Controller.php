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
}
