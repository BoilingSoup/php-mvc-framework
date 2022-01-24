<?php

declare(strict_types=1);

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
  public function indexAction(): void
  {
    $posts = Post::getAll();

    View::renderTemplate('Posts/index.html', [
      'posts' => $posts
    ]);
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
