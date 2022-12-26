<?php
namespace src\App\Models;
use PDO;

class Database {
  private $dbConnection;

  public function __construct() {
    global $dbConfig;

    try {
      $this->dbConnection = new PDO("mysql:dbname={$dbConfig->name};host={$dbConfig->host}", $dbConfig->user, $dbConfig->password);
      $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $exception) {
      die("Connection failed: {$exception->getMessage()}");
    }
  }

  public function createDatabase($dbConfig) {
    $createDatabase = "CREATE DATABASE IF NOT EXISTS $dbConfig->name";
    $this->dbConnection->exec($createDatabase);
    $this->dbConnection->exec("USE $dbConfig->name");
  }

  public function createUsersTable() {
    $usersTable = "CREATE TABLE IF NOT EXISTS users(
      id INT NOT NULL AUTO_INCREMENT,
      user_name VARCHAR(100) NOT NULL,
      email VARCHAR(50) NOT NULL,
      user_password VARCHAR(255) NOT NULL,
      PRIMARY KEY(id)
    )";

    $this->dbConnection->exec($usersTable);
  }

  public function createCustomersTable() {
    $customersTable = "CREATE TABLE IF NOT EXISTS customers(
      id INT NOT NULL AUTO_INCREMENT,
      customer_name  INT NOT NULL,
      birthday DATE NOT NULL,
      cpf VARCHAR(20) NOT NULL,
      rg VARCHAR(20) NOT NULL,
      phone_number VARCHAR(50) NOT NULL,
      PRIMARY KEY(id)
    )";

    $this->dbConnection->exec($customersTable);
  }

  public function createAddressesTable() {
    $addressesTable = "CREATE TABLE IF NOT EXISTS addresses(
      id INT NOT NULL AUTO_INCREMENT,
      address_name VARCHAR(100) NOT NULL,
      customer_id INT NOT NULL,
      street  VARCHAR(100) NOT NULL,
      address_number INT NOT NULL,
      neighborhood VARCHAR(100) NOT NULL,
      complement VARCHAR (50),
      zip_code VARCHAR(20) NOT NULL,
      city VARCHAR(50) NOT NULL,
      address_state TEXT NOT NULL,
      PRIMARY KEY(id),
      FOREIGN KEY(customer_id) REFERENCES customers(id)
    )";

    $this->dbConnection->exec($addressesTable);
  }

  public function getConnection(): object {
    return $this->dbConnection;
  }
}