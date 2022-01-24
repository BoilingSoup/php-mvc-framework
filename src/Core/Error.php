<?php

/**
 * Error and exception handler
 */

namespace Core;

class Error
{
  public static function errorHandler(mixed $level, mixed $message, mixed $file, mixed $line): void
  {
    if (error_reporting() !== 0) {
      throw new \ErrorException($message, 0, $level, $file, $line);
    }
  }

  public static function exceptionHandler(mixed $exception): void
  {
    if ($_ENV['SHOW_ERRORS'] == true) {
      echo "<h1>Fatal error</h1>";
      echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
      echo "<p>Message: '" . $exception->getMessage() . "'</p>";
      echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
      echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
    } else {
      $logFile = dirname(__DIR__) . '/../log/php/php_errors.log';

      $message = "Uncaught exception: '" . get_class($exception) . "'";
      $message .= " with message '" . $exception->getMessage() . "'";
      $message .= "\nStack trace: " . $exception->getTraceAsString();
      $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

      error_log($message, 3, $logFile);
      echo "<h1>An error occurred</h1>";
    }
  }
}
