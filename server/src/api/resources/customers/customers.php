<?php
include_once('./../../../app/customers/CustomersController.php');
include_once('./../../../app/addresses/AddressesController.php');

use src\App\Controllers\AddressesController;
use src\App\Controllers\CustomersController;

spl_autoload_register(function ($className) {
  if (file_exists("{$className}.php")) {
    require_once "{$className}.php";
  }
});

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $customers = new CustomersController();
  $customers->setCustomerEmail($_POST["customerEmail"]);
  $customers->setCustomerName($_POST["customerName"]);
  $customers->setCustomerBirthday($_POST["customerBirthday"]);
  $customers->setCustomerCPF($_POST["customerCPF"]);
  $customers->setCustomerRG($_POST["customerRG"]);
  $customers->setCustomerPhoneNumber($_POST["customerPhoneNumber"]);
  echo $customers->newCustomer();
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $customers = new CustomersController();
  $customers->setCustomerEmail($_POST["customerEmail"]);
  $customers->setCustomerName($_POST["customerName"]);
  $customers->setCustomerBirthday($_POST["customerBirthday"]);
  $customers->setCustomerCPF($_POST["customerCPF"]);
  $customers->setCustomerRG($_POST["customerRG"]);
  $customers->setCustomerPhoneNumber($_POST["customerPhoneNumber"]);
  echo $customers->updateCustomer($_GET["customerId"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  $addresses = new AddressesController();
  $customers = new CustomersController();

  $addresses->deleteAddressByCustomerId($_DELETE["customerId"]);
  echo $customers->deleteCustomer($_DELETE["customerId"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['customerId'])) {
  $customers = new CustomersController();
  echo json_encode($customers->getAllCustomers());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['customerId'])) {
  $customers = new CustomersController();
  echo json_encode($customers->getOneCustomer($_GET["customerId"]));
}

?>