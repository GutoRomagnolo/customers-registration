<?php
include_once('./../../../app/database/DatabaseController.php');

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Controllers\DatabaseController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $database = new DatabaseController();
  $database->newDatabase();
}
?>