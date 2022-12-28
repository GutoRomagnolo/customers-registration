<?php
include_once('./../../../app/users/UsersController.php');

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Utils\Utils;
use src\App\Controllers\UsersController;

// Utils::buildRoute("/users/login", "GET", function () {
//   $users = new UsersController();
//   $users->setUserEmail($_POST["userEmail"]);
//   $users->setUserPassword($_POST["userPassword"]);
// });

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['userId'])) {
  $users = new UsersController();
  echo json_encode($users->getAllUsers());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $users = new UsersController();
  $users->setUserName($_POST["userName"]);
  $users->setUserEmail($_POST["userEmail"]);
  $users->setUserPassword($_POST["userPassword"]);
  echo $users->newUser();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['userId'])) {
  $users = new UsersController();
  echo json_encode($users->getOneUser($_GET["userId"]));
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $users = new UsersController();
  $users->setUserName($_POST["userName"]);
  $users->setUserEmail($_POST["userEmail"]);
  $users->setUserPassword($_POST["userPassword"]);
  echo $users->updateUser($_GET["userId"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  $users = new UsersController();
  echo $users->deleteUser($_GET["userId"]);
}
?>