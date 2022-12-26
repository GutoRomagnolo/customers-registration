<?php
namespace src\App\Utils;
class Utils {
  public static function buildRoute($route = "/", $method = "GET", $callback = NULL) {
    $routeFromUser = explode("/", $_SERVER["PATH_INFO"]);
    $routeFromSystem = explode("/", $route);

    if (count($routeFromUser) === count($routeFromSystem)) {
      foreach ($routeFromSystem as $key => $value) {
        if (strpos($value, ":") !== false) {
          $field_name = str_replace(":", "", $routeFromSystem[$key]);
          $_GET[$field_name] = (int) $routeFromUser[$key];
          $fixed_route[$key] = $routeFromUser[$key];
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

  public function checkSessionExistence() {
    global $appURL;
    if (!isset($_SESSION["userId"])) {
      header("location: $appURL/login/login.php");
    }
  }
  
  public function avoidSessionStart() {
    global $appURL;
    if (isset($_SESSION["userId"])) {
      header("location: $appURL/select-mode/select_mode.php");
    }
  }
}
?>