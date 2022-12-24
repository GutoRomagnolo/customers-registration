<?php
function createPrimaryButton($buttonInsiderText, $buttonId, $buttonClickFunction, $buttonType) {
  $primaryButtonTemplate = "
    <div class=\"primary-button-container\">
      <button
        id=\"$buttonId\"
        class=\"primary-button\"
        type=\"$buttonType\"
        name=\"primary-button\"
        onclick=\"$buttonClickFunction\"
      >
        <span>$buttonInsiderText</span>
      </button>
    </div>
  ";

  echo $primaryButtonTemplate;
}
?>