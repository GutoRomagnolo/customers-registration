<?php
namespace src\App\Models;

use FFI\Exception;
use PDO;
use src\App\Models\Database;

class Addresses extends Database {
  private $appDatabase;
  private $addressId;
  private $customerId;
  private $addressName;
  private $street;
  private $number;
  private $neighborhood;
  private $complement;
  private $zipCode;
  private $city;
  private $addressState;

  public function __construct() {
    parent::__construct();
    $this->appDatabase = parent::getConnection();
  }

  public function getAddressId(): int {
    return $this->addressId;
  }

  public function setAddressId(int $addressId): void {
    $this->addressId = $addressId;
  }

  public function getCustomerId(): int
  {
    return $this->customerId;
  }

  public function setCustomerId(int $customerId): void {
    $this->customerId = $customerId;
  }

  public function getAddressName(): string {
    return $this->addressName;
  }

  public function setAddressName(int $addressName): void {
    $this->addressName = $addressName;
  }


  public function getStreet(): string {
    return $this->street;
  }

  public function setStreet(string $street): void {
    $this->street = $street;
  }

  public function getNumber(): string {
    return $this->number;
  }

  public function setNumber(string $number): void {
    $this->number = $number;
  }

  public function getNeighborhood(): string {
    return $this->neighborhood;
  }

  public function setNeighborhood(string $neighborhood): void {
    $this->neighborhood = $neighborhood;
  }

  public function getComplement(): string {
    return $this->complement;
  }

  public function setComplement(string $complement): void {
    $this->complement = $complement;
  }

  public function getAddressState(): string {
    return $this->addressState;
  }

  public function settAddressState(string $addressState): void {
    $this->addressState = $addressState;
  }

  public function getCity(): string {
    return $this->city;
  }

  public function setCity(string $city): void {
    $this->city = $city;
  }

  public function getZipCode(): string {
    return $this->zipCode;
  }

  public function setZipCode(string $zipCode): void {
    $this->zipCode = $zipCode;
  }

  public function createAddress(): string {
    try {
      $addressName = $this->getAddressName();
      $street = $this->getStreet();
      $number = $this->getNumber();
      $complement = $this->getComplement();
      $neighborhood = $this->getNeighborhood();
      $city = $this->getCity();
      $addressState = $this->getAddressState();
      $zipCode = $this->getZipCode();
      $customerId = $this->getCustomerId();

      $createAddressStatement = $this->appDatabase->prepare(
        "INSERT INTO addresses (
          address_name,
          customer_id,
          street,
          address_number,
          neighborhood,
          complement, 
          zip_code
          city, 
          address_state
        ) VALUES (
          :addressName,
          :customerId,
          :street,
          :addressNumber,
          :neighborhood,
          :complement,
          :zipCode,
          :city,
          :addressState
        )"
      );

      $createAddressStatement->bindParam(":addressName", $addressName, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $createAddressStatement->bindParam(":street", $street, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":addressNumber", $number, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":neighborhood", $neighborhood, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":complement", $complement, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":zipCode", $zipCode, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":city", $city, PDO::PARAM_STR);
      $createAddressStatement->bindParam(":addressState", $addressState, PDO::PARAM_STR);
      $createAddressStatement->execute();
      return "Address has been created";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function getAllAddresses(): array {
    try {
      $getAllAddressesQuery = $this->appDatabase->query("SELECT * FROM addresses");

      if ($getAllAddressesQuery->rowCount() > 0) {
        return $getAllAddressesQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function getAddressesByCustomerId($customerId): array {
    try {
      $getAddressesByCustomerIdQuery = $this->appDatabase->prepare(
        "SELECT * FROM addresses WHERE customer_id = :customerId"
      );
      $getAddressesByCustomerIdQuery->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $getAddressesByCustomerIdQuery->execute();

      if ($getAddressesByCustomerIdQuery->rowCount() > 0) {
        return $getAddressesByCustomerIdQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function getOneAddress($addressId): array {
    try {
      $getOneAddressQuery = $this->appDatabase->prepare("SELECT * FROM addresses WHERE id = :id");
      $getOneAddressQuery->bindParam(":id", $addressId, PDO::PARAM_INT);
      $getOneAddressQuery->execute();

      if ($getOneAddressQuery->rowCount() > 0) {
        return $getOneAddressQuery->fetchAll(PDO::FETCH_ASSOC);
      }

      return [];
    } catch (Exception $exception) {
      return ["errors" => $exception->getMessage()];
    }
  }

  public function updateAddress($addressId): string {
    $addressName = $this->getAddressName();
    $customerId = $this->getCustomerId();
    $street = $this->getStreet();
    $addressNumber = $this->getNumber();
    $complement = $this->getComplement();
    $neighborhood = $this->getNeighborhood();
    $city = $this->getCity();
    $addressState = $this->getAddressState();
    $zipCode = $this->getZipCode();

    try {
      $updateAddressStatement = $this->appDatabase->prepare(
        "UPDATE addresses SET
          address_name = :addressName
          customer_id = :customerId
          street = :street,
          address_number = :addressNumber,
          complement = :complement,
          neighborhood = :neighborhood,
          city = :city,
          address_state = :addressState,
          zip_code = :zipCode,
        WHERE id = :addressId"
      );

      $updateAddressStatement->bindParam(":addressName", $addressName, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $updateAddressStatement->bindParam(":street", $street, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":addressNumber", $addressNumber, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":complement", $complement, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":neighborhood", $neighborhood, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":city", $city, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":address_state", $addressState, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":zipCode", $zipCode, PDO::PARAM_STR);
      $updateAddressStatement->bindParam(":addressId", $addressId, PDO::PARAM_INT);
      $updateAddressStatement->execute();
      return "Address has been updated";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function deleteAddress($addressId): string {
    try {
      $deleteAddressStatement = $this->appDatabase->prepare(
        "DELETE FROM addresses WHERE id = :addressId"
      );
      $deleteAddressStatement->bindParam(":addressId", $addressId);
      $deleteAddressStatement->execute();
      return "Address has been removed";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }

  public function deleteAddressByCustomerId($customerId): string {
    try {
      $deleteAddressByCustomerIdStatement = $this->appDatabase->prepare(
        "DELETE FROM addresses WHERE customer_id = :customerId"
      );
      $deleteAddressByCustomerIdStatement->bindParam(":customerId", $customerId, PDO::PARAM_INT);
      $deleteAddressByCustomerIdStatement->execute();
      return "Address addresses has been removed";
    } catch (Exception $exception) {
      return $exception->getMessage();
    }
  }
}