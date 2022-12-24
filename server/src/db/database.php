<?php
$hostname = 'localhost';
$database = 'customers-registration';
$user = 'root';
$password = '';
$port = '3306';

try {
  $dbConnection = new PDO("mysql:host=$hostname;port=$port", $user, $password);
  $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception) {
  echo "Connection failed: " . $exception->getMessage();
}

$createDatabase = "CREATE DATABASE IF NOT EXISTS $database";
$dbConnection->exec($createGamcreateDatabaseeDatabase);
$dbConnection->exec("USE $database");

$usersTable = "CREATE TABLE IF NOT EXISTS users(
  id INT NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(50) NOT NULL,
  user_password VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
)";
$dbConnection->exec($userTable);

$customersTable = "CREATE TABLE IF NOT EXISTS customers(
  id INT NOT NULL AUTO_INCREMENT,
  customer_name  INT NOT NULL,
  birthday DATE NOT NULL,
  cpf VARCHAR(20) NOT NULL,
  rg VARCHAR(20) NOT NULL,
  phone_number VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
)";

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
$dbConnection->exec($gameResultsTable);
?>