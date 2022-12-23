const customerListContainer = document.getElementById("customers-list");
let customersRegister = [];

const getCustomersRegister = async () => {
  try {
    const response = await fetch("./customers-register.json");
    const disorderlyCustomersRegister = await response.json();
    disorderlyCustomersRegister.forEach(customer => customer.identifier = Number(customer.identifier))
  
    customersRegister = sortCustomersRegisterByIdentifer(disorderlyCustomersRegister);
    generateRegisterList();
  } catch (error) {
    customerListContainer.innerHTML += `
      <p class="registers-not-found">Nenhum registro encontrado :(</p>
    `
  }
};

const generateRegisterList = () => {
  customersRegister.forEach((customer) => {
    customerListContainer.innerHTML += 
      `<div class="register-container">
        <div class="standard-container">
          <h3>NOME</h3>
          <h4>${customer.name}</h4>
          <hr class="horizontal-line">
        </div>
        <div class="standard-container about-container">
          <div class="three-row">
            <h3>RA</h3>
            <h4>${customer.identifier}</h4>
            <hr class="horizontal-line">
          </div>
          <div class="three-row">
            <h3>GÊNERO</h3>
            <h4>${customer.gender}</h4>
            <hr class="horizontal-line">
          </div>
          <div class="three-row">
            <h3>IDADE</h3>
            <h4>${customer.age}</h4>
            <hr class="horizontal-line">
          </div>
        </div>
        <div class="standard-container">
          <div>
            <h3>E-MAIL</h3>
            <h4>${customer.email}</h4>
            <hr class="horizontal-line">
          </div>
        </div>
        <div>
          <div>
            <h3>ENDEREÇO</h3>
            <h4>${customer.address}</h4>
            <hr class="horizontal-line">
          </div>
        </div>
      </div>`;
  });
};

const sortCustomersRegisterByIdentifer = customersRegisterToSort => {
  return customersRegisterToSort.sort((nextCustomer, previousCustomer) => {
    if (nextCustomer.identifier > previousCustomer.identifier) {
      return 1;
    } else if (nextCustomer.identifier === previousCustomer.identifier) {
      if (nextCustomer.name > previousCustomer.name) {
        return 1;
      } else {
        return -1;
      }
    } else {
      return -1;
    }
  });
}

getCustomersRegister();
