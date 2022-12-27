const registerForm = document.getElementById('register-form');
const newAddressSpot = document.getElementById('new-address-spot');
const mainContainer = document.getElementById('main-container');
let addressQuantity = 0;

const primaryButtonAttributes = {
  id: 'submit-form-button',
  type: 'submit',
  containerId: 'register-customer-button-container',
  clickFunction: '',
  insiderText: 'CADASTRAR'
}

const runInitialFunctions = () => {
  createPrimaryButton(primaryButtonAttributes);
  startInputListeners();
  createStandardHeader();
}

const createNewAddressContainer = () => {
  addressQuantity++;

  createAddressForm(addressQuantity, 'new-address-spot');
  startInputListeners();
}

const submitRegisterForm = async (event) => {
  event.preventDefault();
  try {
    await fetch('customers-registration.php', {
      method: 'POST',
      body: new FormData(registerForm)
    });

    const successMessage = 'Cliente registrado com sucesso!';
    invokeRegisterResultMessage('success', successMessage);
    registerForm.reset();
    startInputListeners();
  } catch (error) {
    const errorMessage = 'Não foi possível cadastrar o cliente!';
    invokeRegisterResultMessage('fail', errorMessage);
    console.log("Um erro ocorreu ao cadastrar cliente: ", error);
  }
};

const validateFormInputs = (formInputs) => {
  submitButton = document.getElementById(primaryButtonAttributes.id);
  const formIsValid = formInputs.every(input => input.value)
  formIsValid
    ? submitButton.removeAttribute('disabled')
    : submitButton.setAttribute('disabled', 'disabled')
}

const invokeRegisterResultMessage = (result, resultMessage) => {
  registerForm.innerHTML += `
    <div class="success-message" id="success-message">
      <h4>${resultMessage}</h4>
      <img class="success-icon" src="./../../assets/${result}-icon.svg">
    </div>
  `
  setTimeout(() => {
    const successMessage = document.getElementById('success-message')
    successMessage.style.display = 'none';
  }, 2200)
}

const startInputListeners = () => {
  const formInputs = Array.from(document.querySelectorAll('input'));
  validateFormInputs(formInputs);

  formInputs.forEach(input => {
    input.addEventListener('input', event => validateFormInputs(formInputs));
  })
}

runInitialFunctions();