<?php
function createSecundaryButton($buttonInsiderText, $buttonClickFunction) {
  $secundaryButtonTemplate = "
    <div class=\"remove-address-button-container\">
      <button class=\"remove-address-button\" type=\"button\" onclick=\"$buttonClickFunction\">
        <span>$buttonInsiderText</span>
      </button>
    </div>
  ";

  echo $secundaryButtonTemplate;
}
?>