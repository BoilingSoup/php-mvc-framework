<?php

namespace App\Models;

use PDO;

class Post
{
  public static function getAll(): array
  {
    $host = 'postgres';
    $dbname = 'mvc';
    $username = 'postgres';
    $password = 'password';

    try {
      $db = new PDO("pgsql:host={$host};dbname={$dbname}", $username, $password);

      $stmt = $db->query('SELECT Id, title, content FROM posts ORDER BY created_at');

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $results;
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }
}
