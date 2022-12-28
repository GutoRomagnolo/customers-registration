const registerForm = document.getElementById('register-form');
let addressQuantity = 0;

const primaryButtonAttributes = {
  id: 'submit-form-button',
  type: 'button',
  containerId: 'register-customer-button-container',
  clickFunction: 'submitAllPageForms()',
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

const submitPersonalInformations = async () => {
  const personalInformationsForm = new FormData(registerForm)
  await fetch(serverPaths.customersResource, {
    method: 'POST',
    body: personalInformationsForm
  });

  registerForm.reset();
  startInputListeners();

  return personalInformationsForm.get("customerCPF");
};

const submitAllPageForms = async () => {
  try {
    const customerCPF = await submitPersonalInformations();
    await submitAddresses(customerCPF);

    const successMessage = 'Cliente registrado com sucesso!';
    invokeRegisterResultMessage('success', successMessage);
  }
  catch (error) {
    const errorMessage = 'Não foi possível cadastrar o cliente!';
    invokeRegisterResultMessage('fail', errorMessage);
    console.log("Um erro ocorreu ao cadastrar cliente: ", error);
  }
}

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