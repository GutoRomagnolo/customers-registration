const createPrimaryButton = (buttonAttributes) => {
  console.log('buttonAttributes', buttonAttributes)
  primaryButtonTemplate = `
    <button
      id=${buttonAttributes.id}
      class="primary-button"
      type=${buttonAttributes.type}
      name="primary-button"
      onclick=${buttonAttributes.clickFunction}
    >
      <span>${buttonAttributes.insiderText}</span>
    </button>
  `;

  const primaryButtonContainer = document.getElementById(buttonAttributes.containerId);
  primaryButtonContainer.innerHTML += primaryButtonTemplate;
}