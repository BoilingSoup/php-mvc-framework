<?php

declare(strict_types=1);

namespace App\Controllers;

use \Core\View;

class Posts extends \Core\Controller
{
  public function indexAction(): void
  {
    // echo "Hello from the index action in the Posts controller!";
    View::renderTemplate('Posts/index.html');
  }

  public function addNewAction(): void
  {
    echo "Hello from the addNew action in the Posts controller!";
  }

  public function editAction(): void
  {
    echo 'Hello from the edit action in the Posts controller!';
    echo '<p>Route parameters:<pre>' . htmlspecialchars(print_r($this->routeParams, true)) . '</pre></p>';
  }
}
