const customerListContainer = document.getElementById("customers-list");
let customersRegister = [];

const getCustomersRegister = async () => {
  try {
    const response = await fetch(serverPaths.customersResource, {
      method: 'GET'
    });

    customersRegister = await response.json()
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
          <h4>${customer.customer_name}</h4>
          <hr class="horizontal-line">
        </div>
        <div class="standard-container about-container">
          <div class="three-row">
            <h3>CPF</h3>
            <h4>${customer.cpf}</h4>
            <hr class="horizontal-line">
          </div>
          <div class="three-row">
            <h3>RG</h3>
            <h4>${customer.rg}</h4>
            <hr class="horizontal-line">
          </div>
          <div class="three-row">
            <h3>NASCIMENTO</h3>
            <h4>${customer.birthday}</h4>
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
            <h3>TELEFONE</h3>
            <h4>${customer.phone_number}</h4>
            <hr class="horizontal-line">
          </div>
        </div>
      </div>`;
  });
};

// const sortCustomersRegisterByIdentifer = customersRegisterToSort => {
//   return customersRegisterToSort.sort((nextCustomer, previousCustomer) => {
//     if (nextCustomer.identifier > previousCustomer.identifier) {
//       return 1;
//     } else if (nextCustomer.identifier === previousCustomer.identifier) {
//       if (nextCustomer.name > previousCustomer.name) {
//         return 1;
//       } else {
//         return -1;
//       }
//     } else {
//       return -1;
//     }
//   });
// }

getCustomersRegister();
createStandardHeader();
