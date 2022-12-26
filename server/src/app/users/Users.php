<?php
namespace src\App\Models;

use FFI\Exception;
use PDO;
use src\App\Models\Database;

class Users extends Database
{
  private $appDatabase;
  private $userId;
  private $userName;
  private $userEmail;
  private $userPassword;

  public function __construct() {
    parent::__construct();
    $this->appDatabase = parent::getConnection();
  }

  public function getUserId(): int {
    return $this->userId;
  }

  public function setUserId(int $userId = 0): void {
    $this->userId = $userId;
  }

  public function getUserName(): string {
    return $this->userName;
  }

  public function setUserName(string $userName = ""): void {
    $this->userName = $userName;
  }

  public function getUserEmail(): string {
    return $this->userEmail;
  }

  public function setUserEmail(string $userEmail = ""): void {
    $this->userEmail = $userEmail;
  }

  public function getUserPassword(): string {
    return $this->userPassword;
  }

  public function setUserPassword(string $userPassword = ""): void {
    $this->userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
  }

  public function createUser(): string {
    try {
      $userName = $this->getUserName();
      $userEmail = $this->getUserEmail();
      $userPassword = $this->getUserPassword();

      $createUserStatement = $this->appDatabase->prepare(
        "INSERT INTO users (user_name, email, user_password) VALUES (:userName, :userEmail, :userPassword)"
      );

      $createUserStatement->bindParam(":userName", $userName, PDO::PARAM_STR);
      $createUserStatement->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
      $createUserStatement->bindParam(":userPassword", $userPassword, PDO::PARAM_STR);
      $createUserStatement->execute();
      print_r($createUserStatement->errorInfo());
      return "User has been created";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function getAllUsers(): array {
    try {
      $getAllUsersQuery = $this->appDatabase->query("SELECT * FROM users");

      if ($getAllUsersQuery->rowCount() > 0) {
        return $getAllUsersQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function getOneUser($userId) {
    try {
      $getOneUserQuery = $this->appDatabase->prepare("SELECT * FROM users WHERE id = :userId");
      $getOneUserQuery->bindParam(":userId", $userId, PDO::PARAM_INT);
      $getOneUserQuery->execute();

      if ($getOneUserQuery->rowCount() > 0) {
        return $getOneUserQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function updateUser($userId): string
  {
    try {
      $userName = $this->getUserName();
      $userEmail = $this->getUserEmail();
      $userPassword = $this->getUserPassword();

      $updateUserStatement = $this->appDatabase->prepare(
        "UPDATE users SET 
          user_name = :userName,
          email = :email,
          user_password = :userPassword 
        WHERE id = :userId"
      );

      $updateUserStatement->bindParam(":userName", $userName, PDO::PARAM_STR);
      $updateUserStatement->bindParam(":userEmail", $userEmail, PDO::PARAM_STR);
      $updateUserStatement->bindParam(":userPassword", $userPassword, PDO::PARAM_STR);
      $updateUserStatement->bindParam(":userId", $userId, PDO::PARAM_INT);
      $updateUserStatement->execute();
      return "User has been updated";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function deleteUser($userId): string {
    try {
      $sql = $this->appDatabase->prepare("DELETE FROM users WHERE id = :userId");
      $sql->bindParam(":userId", $userId, PDO::PARAM_INT);
      $sql->execute();
      return "User has been deleted";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function loginUser(): array|string {
    try {
      $loginUserQuery = $this->appDatabase->prepare(
        "SELECT * FROM users WHERE email = :email AND user_password = :userPassword"
      );

      $loginUserQuery->bindParam(":userEmail", $this->getUserEmail(), PDO::PARAM_STR);
      $loginUserQuery->bindParam(":userPassword", $this->getUserPassword(), PDO::PARAM_STR);
      $loginUserQuery->execute();

      if ($loginUserQuery->rowCount() > 0) {
        return $loginUserQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }
}