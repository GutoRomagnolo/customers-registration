<?php
include_once('./../../../app/addresses/AddressesController.php');

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Controllers\AddressesController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $addresses = new AddressesController();
  $addresses->setCustomerCPF($_POST["customerCPF"]);
  $addresses->setAddressName($_POST["addressName"]);
  $addresses->setStreet($_POST["addressStreet"]);
  $addresses->setNumber($_POST["addressNumber"]);
  $addresses->setComplement($_POST["addressComplement"]);
  $addresses->setNeighborhood($_POST["addressNeighborhood"]);
  $addresses->setCity($_POST["addressCity"]);
  $addresses->settAddressState($_POST["addressState"]);
  $addresses->setZipCode($_POST["addressZipCode"]);
  echo $addresses->newAddress();
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $addresses = new AddressesController();
  $addresses->setCustomerCPF($_POST["customerCPF"]);
  $addresses->setAddressName($_POST["addressName"]);
  $addresses->setStreet($_POST["addressStreet"]);
  $addresses->setNumber($_POST["addressNumber"]);
  $addresses->setComplement($_POST["addressComplement"]);
  $addresses->setNeighborhood($_POST["addressNeighborhood"]);
  $addresses->setCity($_POST["addressCity"]);
  $addresses->settAddressState($_POST["addressState"]);
  $addresses->setZipCode($_POST["zipCode"]);
  echo $addresses->updateAddress($_GET["addressId"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['addressId'])) {
  $addresses = new AddressesController();
  echo json_encode($addresses->getAllAddresses());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['addressId'])) {
  $addresses = new AddressesController();
  echo json_encode($addresses->getOneAddress($_GET["addressId"]));
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['addressId'])) {
  $addresses = new AddressesController();
  echo $addresses->deleteAddress($_GET["addressId"]);
};

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['customerId'])) {
  $addresses = new AddressesController();
  echo json_encode($addresses->getAddressesByCustomerId($_GET["customerId"]));
};

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['customerId'])) {
  $addresses = new AddressesController();
  echo $addresses->deleteAddressByCustomerId($_GET["customerId"]);
};
?>