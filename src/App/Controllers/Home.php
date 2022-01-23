<?php

declare(strict_types=1);

namespace App\Controllers;

class Home
{
  public function index(): void
  {
    echo 'Hello from the index action in the Home controller!';
  }
}
