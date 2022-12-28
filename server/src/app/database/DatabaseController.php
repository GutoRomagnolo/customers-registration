<?php
namespace src\App\Controllers;
include_once('./../../../app/users/Users.php');

use src\App\Models\Database;

class DatabaseController extends Database {
  public function __construct() {
    parent::__construct();
  }

  public function newDatabase(): void {
    $this->createDatabase();
  }
}