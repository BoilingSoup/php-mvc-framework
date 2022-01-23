<?php

declare(strict_types=1);

namespace App\Controllers;

class Posts extends \Core\Controller
{
  public function index(): void
  {
    echo "Hello from the index action in the Posts controller!";
    echo '<p>Query string parameters: <pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
  }

  public function addNew(): void
  {
    echo "Hello from the addNew action in the Posts controller!";
  }

  public function edit(): void
  {
    echo 'Hello from the edit action in the Posts controller!';
    echo '<p>Route parameters:<pre>' . htmlspecialchars(print_r($this->routeParams, true)) . '</pre></p>';
  }
}
