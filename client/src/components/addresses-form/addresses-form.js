const createAddressForm = (addressQuantity, containerId) => {
  const addressFormTemplate = `
    <div class="minimized-address-title full-border-element">
      <span>Endereço ${addressQuantity}</span>
      <img class="new-address-icon expand-icon" src="./../../assets/expand-icon.svg" alt="Expandir endereço">
    </div>
    <div class="address-content-expanded hidden-element">
      <div class="standard-input-container">
        <label for="customer-address-input">
          <span>NOME DO ENDEREÇO</span>
        </label>
        <div class="input-icon-container">
          <img
            class="standard-input-icon"
            src="./../../assets/house-icon.svg"
            alt="Nome do endereço do cliente"
          >
          <input
            id="address-name-input"
            name="addressName"
            placeholder="Digite o nome do endereço"
            class="standard-input"
            required
          >
        </div>
      </div>
      <div class="standard-input-container multiple-rows-container">
        <div class="street-container">
          <label for="street-input">
            <span>RUA</span>
          </label>
          <div class="input-icon-container">
            <img
              class="standard-input-icon"
              src="./../../assets/location-icon.svg"
              alt="Endereço do cliente"
            >
            <input
              id="street-input"
              name="addressStreet"
              placeholder="Digite o nome da rua"
              class="standard-input"
              required
            >
          </div>
        </div>
        <div class="address-number-container">
          <label for="address-number-input">
            <span>NÚMERO</span>
          </label>
          <div class="input-icon-container">
            <img
              class="standard-input-icon"
              src="./../../assets/number-icon.svg"
              alt="Número do endereço do cliente"
            >
            <input
              id="address-number-input"
              name="addressNumber"
              type="number"
              placeholder="Nº"
              class="standard-input"
              required
          >
          </div>
        </div>
      </div>
      <div class="standard-input-container multiple-rows-container">
        <div class="multiple-rows-input">
          <label for="neighborhood-input">
            <span>BAIRRO</span>
          </label>
          <div class="input-icon-container">
            <img
              class="standard-input-icon"
              src="./../../assets/neigh-icon.svg"
              alt="Bairro do cliente"
            >
            <input
              id="neighborhood-input"
              type="text"
              name="addressNeighborhood"
              placeholder="Digite o bairro"
              class="standard-input"
              required
            >
          </div>
        </div>
        <div class="multiple-rows-input">
          <label for="complement-input">
            <span>COMPLEMENTO</span>
          </label>
          <div class="input-icon-container">
            <img
              class="standard-input-icon"
              src="./../../assets/address-icon.svg"
              alt="Complemento do cliente"
            >
            <input
              id="complement-input"
              type="text"
              name="addressComplement"
              placeholder="Complemento"
              class="standard-input"
              required
            >
          </div>
        </div>
        <div class="multiple-rows-input">
          <label for="zip-code-input">
            <span>CEP</span>
          </label>
          <div class="input-icon-container">
            <img 
              class="standard-input-icon" 
              src="./../../assets/map-icon.svg"
              alt="CEP do cliente"
            >
            <input
              id="zip-code-input"
              type="text"
              placeholder="Digite o CEP"
              name="addressZipCode"
              class="standard-input customer-birthday"
            >
          </div>
        </div>
      </div>
      <div class="standard-input-container multiple-rows-container">
        <div class="street-container">
          <label for="city-input">
            <span>CIDADE</span>
          </label>
          <div class="input-icon-container">
            <img
              class="standard-input-icon"
              src="./../../assets/city-icon.svg"
              alt="Cidade do cliente"
            >
            <input
              id="city-input"
              type="text"
              name="addressCity"
              placeholder="Digite o nome da rua"
              class="standard-input"
              required
            >
          </div>
        </div>
        <div class="address-number-container">
          <label for="state-input">
            <span>ESTADO</span>
          </label>
          <div class="input-icon-container">
            <img
              class="standard-input-icon"
              src="./../../assets/state-icon.svg"
              alt="Estado do cliente"
            >
            <input
              id="state-input"
              name="addressState"
              type="text"
              placeholder="Estado"
              class="standard-input"
              required
            >
          </div>
        </div>
      </div>
      <div class="secundary-button-container" id="remove-address-button-container-${addressQuantity}">
      </div>
    </div>
  `;

  const newUnitaryAddressForm = document.createElement('form');
  newUnitaryAddressForm.classList.add('unitary-new-address');
  newUnitaryAddressForm.setAttribute("id", `address-form-${addressQuantity}`);
  newUnitaryAddressForm.innerHTML += addressFormTemplate;

  const fixedSecundaryButtonAttributes = {
    insiderText: 'REMOVER',
    clickFunction: `removeAddress('address-form-${addressQuantity}')`,
    containerId: `remove-address-button-container-${addressQuantity}`
  };

  const generalAddressesContainer = document.getElementById(containerId);
  generalAddressesContainer.appendChild(newUnitaryAddressForm);

  createSecundaryButton(fixedSecundaryButtonAttributes);
  listenExpandAddressEvents(newUnitaryAddressForm);

  return newUnitaryAddressForm
}

const listenExpandAddressEvents = newUnitaryAddressContainer => {
  const minimizedAddressTitle = newUnitaryAddressContainer.querySelector('.minimized-address-title');

  minimizedAddressTitle.addEventListener('click', () => {
    expandAddressContainer(minimizedAddressTitle, newUnitaryAddressContainer);
  })
}

const expandAddressContainer = (minimizedAddressTitle, unitaryAddressContainer) => {
  const addressContent = unitaryAddressContainer.querySelector('.address-content-expanded');
  const expandIconSource = unitaryAddressContainer.querySelector('.expand-icon').src;

  expandIconSource.indexOf('expand-icon.svg') != -1
    ? unitaryAddressContainer.querySelector('.expand-icon').src = './../../assets/minimize-icon.svg'
    : unitaryAddressContainer.querySelector('.expand-icon').src = './../../assets/expand-icon.svg'

  addressContent.classList.toggle('hidden-element');
  minimizedAddressTitle.classList.toggle('full-border-element');
}

const removeAddress = addressToRemoveId => {
  const addressToRemove = document.getElementById(addressToRemoveId)
  addressToRemove.remove();
}

const submitAddresses = async (customerCPF) => {
  for (let index = 0; index < addressQuantity; index++) {
    if (document.getElementById(`address-form-${index + 1}`)) {
      const addressFormElement = document.getElementById(`address-form-${index + 1}`);
      const addressFormToSubmit = new FormData(addressFormElement);
      addressFormToSubmit.append('customerCPF', customerCPF);

      await fetch(serverPaths.addressesResource, {
        method: 'POST',
        body:  addressFormToSubmit
      })

      addressFormElement.reset();
      startInputListeners();
    }
  }
}