<?php
// require_once "configurations.php";

// spl_autoload_register(function($class_name) {
//   if (file_exists("{$class_name}.php")) {
//     require_once "{$class_name}.php";
//   }
// });

// use src\Utils\Utils;
// use src\Controllers\UsersController;
// use src\Controllers\ClientsController;
// use src\Controllers\AddressesController;

// Utils::routing("/users/login", "GET", function() {
//     $users = new UsersController();
//     $users->setLogin($_POST["login"]);
//     $users->setPasskey($_POST["passkey"]);
//     echo json_encode($users->createSession());
// });

// Utils::routing("/users/exit", "GET", function() {
//     $users = new UsersController();
//     $users->setSessionId($_POST["session_id"]);
//     echo json_encode($users->destroySession());
// });

// Utils::routing("/users/list", "GET", function() {
//     header("content-type: application/json");
//     $users = new UsersController();
//     echo json_encode($users->list());
// });

// Utils::routing("/users/new", "POST", function() {
//     $users = new UsersController();
//     $users->setLogin($_POST["login"]);
//     $users->setPasskey($_POST["passkey"]);
//     echo $users->new();
// });

// Utils::routing("/users/show/:id", "GET", function() {
//     header("content-type: application/json");
//     $users = new UsersController();
//     echo json_encode($users->show($_GET["id"]));
// });

// Utils::routing("/users/save/:id", "POST", function() {
//     $users = new UsersController();
//     $users->setLogin($_POST["login"]);
//     $users->setPasskey($_POST["passkey"]);
//     echo $users->save($_GET["id"]);
// });

// Utils::routing("/users/remove/:id", "GET", function() {
//     $users = new UsersController();
//     echo $users->remove($_GET["id"]);
// });

// Utils::routing("/clients/list", "GET", function() {
//     header("content-type: application/json");
//     $clients = new ClientsController();
//     echo json_encode($clients->list());
// });

// Utils::routing("/clients/new", "POST", function() {
//     $clients = new ClientsController();
//     $clients->setName($_POST["name"]);
//     $clients->setBirthdate($_POST["birthdate"]);
//     $clients->setCPF($_POST["cpf"]);
//     $clients->setRG($_POST["rg"]);
//     $clients->setPhone($_POST["phone"]);
//     echo $clients->new();
// });

// Utils::routing("/clients/show/:id", "GET", function() {
//     header("content-type: application/json");
//     $clients = new ClientsController();
//     echo json_encode($clients->show($_GET["id"]));
// });

// Utils::routing("/clients/save/:id", "POST", function() {
//     $clients = new ClientsController();
//     $clients->setName($_POST["name"]);
//     $clients->setBirthdate($_POST["birthdate"]);
//     $clients->setCPF($_POST["cpf"]);
//     $clients->setRG($_POST["rg"]);
//     $clients->setPhone($_POST["phone"]);
//     echo $clients->save($_GET["id"]);
// });

// Utils::routing("/clients/remove/:id", "GET", function() {
//     $addresses = new AddressesController();
//     $addresses->removeByClientId($_GET["id"]);
//     $clients = new ClientsController();
//     echo $clients->remove($_GET["id"]);
// });

// Utils::routing("/addresses/list", "GET", function() {
//     header("content-type: application/json");
//     $addresses = new AddressesController();
//     echo json_encode($addresses->list());
// });

// Utils::routing("/addresses/new", "POST", function() {
//     $addresses = new AddressesController();
//     $addresses->setStreet($_POST["street"]);
//     $addresses->setNumber($_POST["number"]);
//     $addresses->setComplement($_POST["complement"]);
//     $addresses->setDistrict($_POST["district"]);
//     $addresses->setCity($_POST["city"]);
//     $addresses->setStateProvince($_POST["state_province"]);
//     $addresses->setCountry($_POST["country"]);
//     $addresses->setZipcode($_POST["zipcode"]);
//     $addresses->setClientId($_POST["client_id"]);
//     echo $addresses->new();
// });

// Utils::routing("/addresses/show/:id", "GET", function() {
//     header("content-type: application/json");
//     $addresses = new AddressesController();
//     echo json_encode($addresses->show($_GET["id"]));
// });

// Utils::routing("/addresses/save/:id", "POST", function() {
//     $addresses = new AddressesController();
//     $addresses->setStreet($_POST["street"]);
//     $addresses->setNumber($_POST["number"]);
//     $addresses->setComplement($_POST["complement"]);
//     $addresses->setDistrict($_POST["district"]);
//     $addresses->setCity($_POST["city"]);
//     $addresses->setStateProvince($_POST["state_province"]);
//     $addresses->setCountry($_POST["country"]);
//     $addresses->setZipcode($_POST["zipcode"]);
//     $addresses->setClientId($_POST["client_id"]);
//     echo $addresses->save($_GET["id"]);
// });

// Utils::routing("/addresses/remove/:id", "GET", function() {
//     $addresses = new AddressesController();
//     echo $addresses->remove($_GET["id"]);
// });

// Utils::routing("/addresses/list-clients-addresses/:id", "GET", function() {
//     $addresses = new AddressesController();
//     echo json_encode($addresses->listByClientId($_GET["id"]));
// });

// Utils::routing("/addresses/remove-clients-addresses/:id", "GET", function() {
//     $addresses = new AddressesController();
//     echo $addresses->removeByClientId($_GET["id"]);
// });