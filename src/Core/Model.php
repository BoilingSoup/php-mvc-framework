<?php

namespace Core;

use PDO;

abstract class Model
{
  protected static function getDB(): PDO
  {
    static $db = null;

    if ($db === null) {
      $host = $_ENV['HOST'];
      $dbname = $_ENV['DBNAME'];
      $username = $_ENV['USERNAME'];
      $password = $_ENV['PASSWORD'];

      try {
        $db = new PDO("pgsql:host={$host};dbname={$dbname}", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $e) {
        echo $e->getMessage();
      }
    }
    return $db;
  }
}
