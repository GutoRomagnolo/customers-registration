<?php
namespace src\App\Controllers;

use src\App\Models\Customers;

class CustomersController extends Customers {
    public function __construct() {
        parent::__construct();
    }

    public function newCustomer():string {
      return $this->createCustomer();
    }
}