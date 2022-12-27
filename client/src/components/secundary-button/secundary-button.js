const createSecundaryButton = (buttonAttributes) => {
  console.log('buttonAttributes', buttonAttributes)
  const secundaryButtonTemplate = `
    <button class="secundary-button" type="button" onclick="${buttonAttributes.clickFunction}">
      <span>${buttonAttributes.insiderText}</span>
    </button>
  `;

  const secundaryButtonContainer = document.getElementById(buttonAttributes.containerId);
  secundaryButtonContainer.innerHTML += secundaryButtonTemplate;
}