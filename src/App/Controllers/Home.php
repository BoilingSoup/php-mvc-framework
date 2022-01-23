<?php

declare(strict_types=1);

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
  protected function before()
  {
    // echo "(before) ";
    // return false;
  }

  protected function after()
  {
    // echo " (after)";
  }

  public function indexAction(): void
  {
    View::render('Home/index.php');
  }
}
