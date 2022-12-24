<?php
namespace src\utils;

class Utils {
  public static function routing($route = "/", $method = "GET", $callback = NULL) {
    $user_route = explode("/", $_SERVER["PATH_INFO"]);
    $system_route = explode("/", $route);

    if (count($user_route) === count($system_route)) {
      foreach ($system_route as $key => $value) {
        if (strpos($value, ":") !== false) {
          $field_name = str_replace(":", "", $system_route[$key]);
          $_GET[$field_name] = (int) $user_route[$key];
          $fixed_route[$key] = $user_route[$key];
        } else {
          $fixed_route[$key] = $value;
        }
      }

      $fixed_route = implode("/", $fixed_route);

      if ($fixed_route == $_SERVER["PATH_INFO"] && $method == $_SERVER["REQUEST_METHOD"]) {
        call_user_func($callback);
        die();
      }
    }
  }
}
?>