<?php

namespace Core;

use PDO;

abstract class Model
{
  protected static function getDB()
  {
    static $db = null;

    if ($db === null) {
      $host = 'postgres';
      $dbname = 'mvc';
      $username = 'postgres';
      $password = 'password';

      try {
        $db = new PDO("pgsql:host={$host};dbname={$dbname}", $username, $password);

        return $db;
      } catch (\PDOException $e) {
        echo $e->getMessage();
      }
    }
  }
}
