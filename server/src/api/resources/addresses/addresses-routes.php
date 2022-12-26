<?php
require_once './../../../config.php';

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Utils\Utils;
use src\App\Controllers\AddressesController;

Utils::buildRoute("/addresses/get-all", "GET", function () {
  header("content-type: application/json");
  $addresses = new AddressesController();
  echo json_encode($addresses->getAllAddresses());
});

Utils::buildRoute("/addresses/new-address", "POST", function () {
  $addresses = new AddressesController();
  $addresses->setCustomerId($_POST["customerId"]);
  $addresses->setAddressName($_POST["addressName"]);
  $addresses->setStreet($_POST["addressStreet"]);
  $addresses->setNumber($_POST["addressNumber"]);
  $addresses->setComplement($_POST["addressComplement"]);
  $addresses->setNeighborhood($_POST["addressNeighborhood"]);
  $addresses->setCity($_POST["addressCity"]);
  $addresses->settAddressState($_POST["addressState"]);
  $addresses->setZipCode($_POST["addressZipCode"]);
  echo $addresses->newAddress();
});

Utils::buildRoute("/addresses/get-one/:id", "GET", function () {
  header("content-type: application/json");
  $addresses = new AddressesController();
  echo json_encode($addresses->getOneAddress($_GET["addressId"]));
});

Utils::buildRoute("/addresses/update/:addressId", "POST", function () {
  $addresses = new AddressesController();
  $addresses->setCustomerId($_POST["customerId"]);
  $addresses->setAddressName($_POST["addressName"]);
  $addresses->setStreet($_POST["addressStreet"]);
  $addresses->setNumber($_POST["addressNumber"]);
  $addresses->setComplement($_POST["addressComplement"]);
  $addresses->setNeighborhood($_POST["addressNeighborhood"]);
  $addresses->setCity($_POST["addressCity"]);
  $addresses->settAddressState($_POST["addressState"]);
  $addresses->setZipCode($_POST["zipCode"]);
  echo $addresses->updateAddress($_GET["addressId"]);
});

Utils::buildRoute("/addresses/delete/:addressId", "GET", function () {
  $addresses = new AddressesController();
  echo $addresses->deleteAddress($_GET["addressId"]);
});

Utils::buildRoute("/addresses/get-customer-addresses/:id", "GET", function () {
  $addresses = new AddressesController();
  echo json_encode($addresses->getAddressesByCustomerId($_GET["customerId"]));
});

Utils::buildRoute("/addresses/delete-customer-address/:id", "GET", function () {
  $addresses = new AddressesController();
  echo $addresses->deleteAddressByCustomerId($_GET["customerId"]);
});
?>