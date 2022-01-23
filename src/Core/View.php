<?php

namespace Core;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class View
{
  public static function render(string $view, array $args = []): void
  {
    extract($args, EXTR_SKIP);

    $file = "../App/Views/$view";

    if (is_readable($file)) {
      require $file;
    } else {
      echo "$file not found";
    }
  }

  public static function renderTemplate($template, $args = []): void
  {
    static $twig = null;

    if ($twig === null) {
      $loader = new FilesystemLoader('../App/Views');
      $twig = new Environment($loader);
    }

    echo $twig->render($template, $args);
  }
}
