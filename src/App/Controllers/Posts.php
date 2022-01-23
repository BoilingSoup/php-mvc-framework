<?php

declare(strict_types=1);

namespace App\Controllers;

class Posts
{
  public function index(): void
  {
    echo "Hello from the index action in the Posts controller!";
  }

  public function addNew(): void
  {
    echo "Hello from the addNew action in the Posts controller!";
  }
}
