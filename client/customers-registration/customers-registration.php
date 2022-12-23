<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  function registerCustomer($registerFileName) {
    if (file_exists("$registerFileName")) {
      $actualCustomersRegisters = file_get_contents("$registerFileName");
      $customersRegisterObject = json_decode($actualCustomersRegisters, true);

      $customersFields = array(
        'name' => $_POST['customer-name'],
        'email' => $_POST['customer-email'],
        'identifier' => $_POST['customer-identifier'],
        'gender' => $_POST['customer-gender'],
        'age' => $_POST['customer-age'],
        'address' => $_POST['customer-address'],
      );

      $customersRegisterObject[] = $customersFields;
      return json_encode($customersRegisterObject);
    }
    else {
      $newCustomerRegister = array();
      $newCustomerRegister[] = array(
        'name' => $_POST['customer-name'],
        'email' => $_POST['customer-email'],
        'identifier' => $_POST['customer-identifier'],
        'gender' => $_POST['customer-gender'],
        'age' => $_POST['customer-age'],
        'address' => $_POST['customer-address'],
      );
      echo "file not exist<br/>";
      return json_encode($newCustomerRegister);
    }
  }

  $fileName = './../customers-list/customers-register.json';
  file_put_contents("$fileName", registerCustomer($fileName));
}
?>  