<?php

namespace Core;

use PDO;
use Dotenv\Dotenv;

abstract class Model
{
  protected static function getDB()
  {
    static $db = null;

    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    if ($db === null) {
      $host = $_ENV['HOST'];
      $dbname = $_ENV['DBNAME'];
      $username = $_ENV['USERNAME'];
      $password = $_ENV['PASSWORD'];

      try {
        $db = new PDO("pgsql:host={$host};dbname={$dbname}", $username, $password);
      } catch (\PDOException $e) {
        echo $e->getMessage();
      }
    }
    return $db;
  }
}
