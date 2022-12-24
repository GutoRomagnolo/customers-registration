<?php
function createPrimaryButton($buttonInsiderText) {
  $primaryButtonTemplate = "
    <div class=\"primary-button-container\">
      <button
        id=\"primary-button\"
        class=\"primary-button\"
        type=\"submit\"
        name=\"primary-button\"
        disabled
      >
        <span>$buttonInsiderText</span>
      </button>
    </div>
  ";

  echo $primaryButtonTemplate;
}
?>