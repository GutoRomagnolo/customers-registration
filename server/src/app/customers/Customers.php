<?php
namespace src\App\Models;

use PDO;
use FFI\Exception;
use src\App\Models\Database;

class Customers extends Database {
  private $appDatabase;
  private $customerId;
  private $customerName;
  private $customerBirthday;
  private $customerCPF;
  private $customerRG;
  private $customerPhoneNumber;

  public function __construct() {
    parent::__construct();
    $this->appDatabase = parent::getConnection();
  }

  public function getCustomerId(): int {
    return $this->customerId;
  }

  public function setCustomerId(int $customerId = 0): void {
    $this->customerId = $customerId;
  }

  public function getCustomerName(): string {
    return $this->customerName;
  }

  public function setCustomerName(string $customerName = ""): void {
    $this->customerName = $customerName;
  }

  public function getCustomerBirthday(): string {
    return $this->customerBirthday;
  }

  public function setCustomerBirthday(string $customerBirthday = ""): void {
    $this->customerBirthday = $customerBirthday;
  }

  public function getCustomerCPF(): string {
    return $this->customerCPF;
  }

  public function setCustomerCPF(string $customerCPF = ""): void {
    $this->customerCPF = $customerCPF;
  }

  public function getCustomerRG(): string {
    return $this->customerRG;
  }

  public function setCustomerRG(string $customerRG = ""): void {
    $this->customerRG = $customerRG;
  }

  public function getCustomerPhoneNumber(): string {
    return $this->customerPhoneNumber;
  }

  public function setCustomerPhoneNumber(string $customerPhoneNumber = ""): void {
    $this->customerPhoneNumber = $customerPhoneNumber;
  }

  public function createCustomer(): string {
    try {
      $customerName = $this->getCustomerName();
      $customerBirthday = $this->getCustomerBirthday();
      $customerCPF = $this->getCustomerCPF();
      $customerRG = $this->getCustomerRG();
      $customerPhoneNumber = $this->getCustomerPhoneNumber();

      $createCustomerStatement = $this->appDatabase->prepare(
        "INSERT INTO customers (
          customer_name,
          birthday,
          cpf,
          rg,
          phone_number) 
        VALUES (
          :customerName,
          :customerBirthday,
          :customerCPF,
          :customerRG,
          :customerPhoneNumber
        )"
      );
      $createCustomerStatement->bindParam(":customerName", $customerName, PDO::PARAM_STR);
      $createCustomerStatement->bindParam(":customerBirthday", $customerBirthday, PDO::PARAM_STR);
      $createCustomerStatement->bindParam(":customerCPF", $customerCPF, PDO::PARAM_STR);
      $createCustomerStatement->bindParam(":customerRG", $customerRG, PDO::PARAM_STR);
      $createCustomerStatement->bindParam(":customerPhoneNumber", $customerPhoneNumber, PDO::PARAM_STR);
      $createCustomerStatement->execute();
      return "Customer has been created";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function getAllCustomers(): array {
    try {
      $getAllCustomersQuery = $this->appDatabase->query("SELECT * FROM customers");

      if ($getAllCustomersQuery->rowCount() > 0) {
        return $getAllCustomersQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function getOneCustomer($customerId): array {
    try {
      $getOneCustomer = $this->appDatabase->prepare("SELECT * FROM customers WHERE id = :customerId");
      $getOneCustomer->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $getOneCustomer->execute();

      if ($getOneCustomer->rowCount() > 0) {
        return $getOneCustomer->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function updateCustomer($customerId): string
  {
    try {
      $customerName = $this->getCustomerName();
      $customerBirthday = $this->getCustomerBirthday();
      $customerCPF = $this->getCustomerCPF();
      $customerRG = $this->getCustomerRG();
      $customerPhoneNumber = $this->getCustomerPhoneNumber();

      $updateCustomerStatement = $this->appDatabase->prepare(
        "UPDATE clients SET 
          customer_name = :customerName,
          birthday = :customerBirthday,
          cpf = :customerCPF,
          rg = :customerRG,
          phone_number = :customerPhoneNumber,
        WHERE id = :customerId"
      );

      $updateCustomerStatement->bindParam(":customerName", $customerName, PDO::PARAM_STR);
      $updateCustomerStatement->bindParam(":customerBirthday", $customerBirthday, PDO::PARAM_STR);
      $updateCustomerStatement->bindParam(":customerCPF", $customerCPF, PDO::PARAM_STR);
      $updateCustomerStatement->bindParam(":customerRG", $customerRG, PDO::PARAM_STR);
      $updateCustomerStatement->bindParam(":customerPhoneNumber", $customerPhoneNumber, PDO::PARAM_STR);
      $updateCustomerStatement->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $updateCustomerStatement->execute();
      return "Customer has been updated";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function deleteCustomer($customerId): string
  {
    try {
      $deleteCustomerStatement = $this->appDatabase->prepare("DELETE FROM customers WHERE id = :customerId");
      $deleteCustomerStatement->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $deleteCustomerStatement->execute();
      return "Customer has been removed";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }
}