<?php
namespace src\App\Controllers;

use src\App\Models\Addresses;

class AddressesController extends Addresses {
  public function __construct() {
    parent::__construct();
  }

  public function newAddress(): string {
    // Verificar se já existe com o mesmo CEP e número
    return $this->createAddress();
  }

  public function destroyAddress($test): string {
    return $this->deleteAddress($test);
  }
}