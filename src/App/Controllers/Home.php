<?php

declare(strict_types=1);

namespace App\Controllers;

class Home extends \Core\Controller
{
  protected function before()
  {
    echo "(before) ";
    return false;
  }

  protected function after()
  {
    echo " (after)";
  }

  public function indexAction(): void
  {
    echo 'Hello from the index action in the Home controller!';
  }
}
