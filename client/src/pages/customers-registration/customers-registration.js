const registerForm = document.getElementById('register-form');
const newAddressSpot = document.getElementById('new-address-spot');
const submitButton = document.getElementById('primary-button');
const mainContainer = document.getElementById('main-container');
let addressQuantity = 0;

const createNewAddressContainer = async () => {
  addressQuantity++;
  const addressFormResponse = await fetch('./../../components/addresses-form/addresses-form.php', {
    method: 'POST',
    body: JSON.stringify({ 
      'addressQuantity': `${addressQuantity}`
    })
  })

  const newAddressContainer = document.createElement('div');
  newAddressContainer.classList.add('unitary-new-address');
  newAddressContainer.innerHTML += await addressFormResponse.text();

  listenExpandAddressEvents(newAddressContainer);
  newAddressSpot.appendChild(newAddressContainer);
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

const listenExpandAddressEvents = newAddressContainer => {
  const minimizedAddressTitle = newAddressContainer.querySelector('.minimized-address-title');

  minimizedAddressTitle.addEventListener('click', () => {
    expandAddressContainer(minimizedAddressTitle, newAddressContainer);
  })
}

const expandAddressContainer = (minimizedAddressTitle, addressContainer) => {
  const addressContent = addressContainer.querySelector('.address-content-expanded');
  const expandIconSource = addressContainer.querySelector('.expand-icon').src;

  expandIconSource.indexOf('expand-icon.svg') != -1
    ? addressContainer.querySelector('.expand-icon').src = './../../assets/minimize-icon.svg'
    : addressContainer.querySelector('.expand-icon').src = './../../assets/expand-icon.svg'

  addressContent.classList.toggle('hidden-element');
  minimizedAddressTitle.classList.toggle('full-border-element');
}

startInputListeners();