const createCustomerEditModal = () => {
  const modalTemplate = `
    <div class="form-container">
      <form id="register-form">
        <div class="form-header">
          <h3>EDITAR CLIENTE</h3>
          <img
            class="standard-input-icon"
            src="./../../assets/close-icon.svg"
            alt="Fechar aba"
          >
        </div>
        <div class="form-content">
          <div class="personal-informations-container">
            <div class="personal-informations-header">
              <label>INFORMAÇÕES PESSOAIS</label>
              <hr class="horizontal-line">
            </div>
            <div class="standard-input-container">
              <label for="customer-name-input">
                <span>NOME</span>
              </label>
              <div class="input-icon-container">
                <img
                  class="standard-input-icon"
                  src="./../../assets/profile-icon.svg"
                  alt="Nome do cliente"
                >
                <input
                  id="edit-customer-name-input"
                  name="customerName"
                  type="text"
                  placeholder="Digite o nome"
                  class="standard-input customer-name"
                  required
                >  
              </div>
            </div>
            <div class="standard-input-container multiple-rows-container">
              <div class="multiple-rows-input">
                <label for="customer-identifier-input">
                  <span>RG</span>
                </label>
                <div class="input-icon-container">
                  <img
                    class="standard-input-icon"
                    src="./../../assets/document-icon.svg"
                    alt="RG do cliente"
                  >
                  <input
                    id="edit-customer-identifier-input"
                    type="number"
                    name="customerRG"
                    placeholder="Digite o RG"
                    class="standard-input customer-identifier"
                    required
                  >
                </div>
              </div>
              <div class="multiple-rows-input">
                <label for="customer-identifier-input">
                  <span>CPF</span>
                </label>
                <div class="input-icon-container">
                  <img
                    class="standard-input-icon"
                    src="./../../assets/digits-icon.svg"
                    alt="CPF do cliente"
                  >
                  <input
                    id="edit-customer-identifier-input"
                    type="number"
                    name="customerCPF"
                    placeholder="Digite o CPF"
                    class="standard-input customer-identifier"
                    pattern="[0-9]+"
                    required
                  >
                </div>
              </div>
              <div class="multiple-rows-input">
                <label for="customer-age-input">
                  <span>NASCIMENTO</span>
                </label>
                <div class="input-icon-container">
                  <img 
                    class="standard-input-icon" 
                    src="./../../assets/calendar-icon.svg"
                    alt="Idade do cliente"
                  >
                  <input
                    id="edit-customer-age-input"
                    type="date"
                    placeholder="Nascimento"
                    name="customerBirthday"
                    class="standard-input customer-birthday"
                    onfocus="(this.type='date')"
                  >
                </div>
              </div>
            </div>
            <div class="standard-input-container multiple-rows-container">
              <div class="two-inputs">
                <label for="customer-email-input">
                  <span>E-MAIL</span>
                </label>
                <div class="input-icon-container">
                  <img 
                    class="standard-input-icon" 
                    src="./../../assets/mail-icon.svg"
                    alt="Email do cliente"
                  >
                  <input
                    id="edit-customer-email-input"
                    name="customerEmail"
                    type="email"
                    placeholder="Digite o e-mail"
                    class="standard-input"
                  >
                </div>
              </div>
              <div class="two-inputs">
                <label for="customer-phone-input">
                  <span>TELEFONE</span>
                </label>
                <div class="input-icon-container">
                  <img 
                    class="standard-input-icon" 
                    src="./../../assets/phone-icon.svg"
                    alt="Telefone do cliente"
                  >
                  <input
                    id="edit-customer-phone-input"
                    name="customerPhoneNumber"
                    type="text"
                    placeholder="Digite o telefone"
                    class="standard-input"
                    required
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="addresses-container">
            <div class="adresses-header">
              <label>ENDEREÇOS</label>
              <hr class="horizontal-line">
            </div>
            <div class="address-content" id="new-address-spot"></div>
            <div class="new-address-button-container">
              <button class="add-new-address-button" onclick="createNewAddressContainer()" type="button">
                <span>ADICIONAR NOVO ENDEREÇO</span>
                <img 
                class="new-address-icon" 
                src="./../../assets/add-icon.svg"
                alt="Adicionar nova localização"
                > 
              </button>
            </div>
          </div>
          <div class="primary-button-container" id="register-customer-button-container"></div>
        </div>
      </form>
    </div>
  `

}