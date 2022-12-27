<?php
require_once './../../../config.php';

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Utils\Utils;
use src\App\Controllers\DatabaseController;

Utils::buildRoute("/database/create-database", "POST", function () {
  header("content-type: application/json");
  $database = new DatabaseController();
  $database->newDatabase();
});
?>