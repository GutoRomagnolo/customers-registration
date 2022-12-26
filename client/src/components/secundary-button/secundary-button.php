<?php
function createSecundaryButton($buttonInsiderText, $buttonClickFunction) {
  $secundaryButtonTemplate = "
    <div class=\"secundary-button-container\">
      <button class=\"secundary-button\" type=\"button\" onclick=\"$buttonClickFunction\">
        <span>$buttonInsiderText</span>
      </button>
    </div>
  ";

  echo $secundaryButtonTemplate;
}
?>