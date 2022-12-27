const loginButton = document.getElementById('login-button');

const startInputListeners = () => {
  const formInputs = Array.from(document.querySelectorAll('input'));
  validateFormInputs(formInputs);

  formInputs.forEach(input => {
    input.addEventListener('input', event => validateFormInputs(formInputs));
  })
}

const validateFormInputs = (formInputs) => {
  const formIsValid = formInputs.every(input => input.value)
  formIsValid
    ? loginButton.removeAttribute('disabled')
    : loginButton.setAttribute('disabled', 'disabled')
}

const redirectCreateAccount = () => {
  window.open('./../sign-up/sign-up.php', "_self");
}

startInputListeners();
createPrimaryButton('ENTRAR', 'login-button', '', 'submit', 'login-button-container');
createPrimaryButton('CRIAR CONTA', 'redirect-create-account-button', 'redirectCreateAccount()', 'button','sign-up-button-container');