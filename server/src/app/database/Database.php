<?php
namespace src\App\Models;
use PDO;
include_once('config.php');

class Database {
  private $dbConnection;

  public function __construct() {
    global $databaseConfig;

    try {
      $this->dbConnection = new PDO(
        "mysql:host=".$databaseConfig['hostname'].";port=".$databaseConfig['port'], $databaseConfig['user'], $databaseConfig['password']
      );
      $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $exception) {
      die("Connection failed: {$exception->getMessage()}");
    }
  }

  public function createDatabase(): void {
    global $databaseConfig;

    $createDatabase = "CREATE DATABASE IF NOT EXISTS $databaseConfig[dbName]";
    $this->dbConnection->exec($createDatabase);
    $this->dbConnection->exec("USE $databaseConfig[dbName]");

    $this->createUsersTable();
    $this->createCustomersTable();
    $this->createAddressesTable();
  }

  public function createUsersTable(): void {
    $usersTable = "CREATE TABLE IF NOT EXISTS users(
      id INT NOT NULL AUTO_INCREMENT,
      user_name VARCHAR(100) NOT NULL,
      email VARCHAR(50) NOT NULL,
      user_password VARCHAR(255) NOT NULL,
      PRIMARY KEY (id)
    )";

    $this->dbConnection->exec($usersTable);
  }

  public function createCustomersTable(): void {
    $customersTable = "CREATE TABLE IF NOT EXISTS customers(
      id INT NOT NULL AUTO_INCREMENT,
      customer_name  VARCHAR(250) NOT NULL,
      birthday DATE NOT NULL,
      cpf VARCHAR(20) NOT NULL UNIQUE,
      rg VARCHAR(20) NOT NULL,
      email VARCHAR(250),
      phone_number VARCHAR(50) NOT NULL,
      PRIMARY KEY (id)
    )";

    $this->dbConnection->exec($customersTable);
  }

  public function createAddressesTable(): void {
    $addressesTable = "CREATE TABLE IF NOT EXISTS addresses(
      id INT NOT NULL AUTO_INCREMENT,
      address_name VARCHAR(100) NOT NULL,
      customer_cpf VARCHAR(20) NOT NULL,
      street  VARCHAR(100) NOT NULL,
      address_number INT NOT NULL,
      neighborhood VARCHAR(100) NOT NULL,
      complement VARCHAR (50),
      zip_code VARCHAR(20) NOT NULL,
      city VARCHAR(50) NOT NULL,
      address_state TEXT NOT NULL,
      PRIMARY KEY (id),
      
      FOREIGN KEY (customer_cpf) REFERENCES customers(cpf)
    )";

    $this->dbConnection->exec($addressesTable);
  }

  public function getConnection(): object {
    global $databaseConfig;

    $this->dbConnection->exec("USE $databaseConfig[dbName]");
    return $this->dbConnection;
  }
}