<?php
namespace src\App\Utils;
class Utils {
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