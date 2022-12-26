<?php
require_once './../../../config.php';

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Utils\Utils;
use src\App\Controllers\UsersController;

Utils::buildRoute("/users/login", "GET", function () {
  $users = new UsersController();
  $users->setUserEmail($_POST["userEmail"]);
  $users->setUserPassword($_POST["userPassword"]);
});

Utils::buildRoute("/users/get-all", "GET", function () {
  header("content-type: application/json");
  $users = new UsersController();
  echo json_encode($users->getAllUsers());
});

Utils::buildRoute("/users/create-user", "POST", function () {
  $users = new UsersController();
  $users->setUserName($_POST["userName"]);
  $users->setUserEmail($_POST["userEmail"]);
  $users->setUserPassword($_POST["userPassword"]);
  echo $users->newUser();
});

Utils::buildRoute("/users/get-one/:userId", "GET", function () {
  header("content-type: application/json");
  $users = new UsersController();
  echo json_encode($users->getOneUser($_GET["userId"]));
});

Utils::buildRoute("/users/update/:id", "POST", function () {
  $users = new UsersController();
  $users->setUserName($_POST["userName"]);
  $users->setUserEmail($_POST["userEmail"]);
  $users->setUserPassword($_POST["userPassword"]);
  echo $users->updateUser($_GET["userId"]);
});

Utils::buildRoute("/users/delete/:userId", "GET", function () {
  $users = new UsersController();
  echo $users->deleteUser($_GET["userId"]);
});
?>