<?php
require_once './../../../config.php';

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

use src\App\Utils\Utils;
use src\App\Controllers\CustomersController;
use src\App\Controllers\AddressesController;


Utils::buildRoute("/customers/get-all", "GET", function () {
  header("content-type: application/json");
  $customers = new CustomersController();
  echo json_encode($customers->getAllCustomers());
});

Utils::buildRoute("/customers/new-customer", "POST", function () {
  $customers = new CustomersController();
  $customers->setCustomerName($_POST["customerName"]);
  $customers->setCustomerBirthday($_POST["customerBirthday"]);
  $customers->setCustomerCPF($_POST["customerCPF"]);
  $customers->setCustomerRG($_POST["customerRG"]);
  $customers->setCustomerPhoneNumber($_POST["customerPhoneNumber"]);
  echo $customers->newCustomer();
});

Utils::buildRoute("/customers/get-one/:customerId", "GET", function () {
  header("content-type: application/json");
  $customers = new CustomersController();
  echo json_encode($customers->getOneCustomer($_GET["customerId"]));
});

Utils::buildRoute("/customers/update/:customerId", "POST", function () {
  $customers = new CustomersController();
  $customers->setCustomerName($_POST["customerName"]);
  $customers->setCustomerBirthday($_POST["customerBirthday"]);
  $customers->setCustomerCPF($_POST["customerCPF"]);
  $customers->setCustomerRG($_POST["customerRG"]);
  $customers->setCustomerPhoneNumber($_POST["customerPhoneNumber"]);
  echo $customers->updateCustomer($_GET["customerId"]);
});

Utils::buildRoute("/customers/delete/:customerId", "GET", function () {
  $addresses = new AddressesController();
  $customers = new CustomersController();

  $addresses->deleteAddressByCustomerId($_GET["customerId"]);
  echo $customers->deleteCustomer($_GET["customerId"]);
});
?>