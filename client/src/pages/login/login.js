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

startInputListeners();