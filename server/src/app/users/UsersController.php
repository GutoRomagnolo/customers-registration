<?php
namespace src\App\Controllers;

use src\App\Models\Users;

class UsersController extends Users {
  public function __construct() {
    parent::__construct();
  }

  public function newUser(): string {
    if (count(parent::getAllUsers()) < 1) {
      return parent::createUser();
    } else {
      return "User already registered";
    }
  }
}