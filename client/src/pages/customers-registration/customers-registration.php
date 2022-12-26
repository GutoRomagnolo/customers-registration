<?php
  require_once './../../components/primary-button/primary-button.php';
  require_once './../../components/secundary-button/secundary-button.php';
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Programação para a Web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="customers-registration.css" rel="stylesheet">
    <link href="./../../components/primary-button/primary-button.css" rel="stylesheet">
    <link href="./../../components/secundary-button/secundary-button.css" rel="stylesheet">
    <link href="./../../components/addresses-form/addresses-form.css" rel="stylesheet">
    <link href="./../../components/standard-header/standard-header.css" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    >
    <link rel="icon" type="image/x-icon" href="./../../assets/document-icon.svg">
  </head>

  <body>
    <?php require_once './../../components/standard-header/standard-header.php' ?>
    <div class="main-container" id="main-container">
      <form
        id="register-form"
        class="register-form"
        onsubmit="submitRegisterForm(event)"
      >
        <div class="form-header">
          <h3>CADASTRO DE CLIENTES</h3>
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
                  id="customer-name-input"
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
                    id="customer-identifier-input"
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
                    id="customer-identifier-input"
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
                    id="customer-age-input"
                    type="date"
                    placeholder="Nascimento"
                    name="customerBirthday"
                    class="standard-input customer-birthday"
                    onfocus="(this.type='date')"
                  >
                </div>
              </div>
            </div>
            <div class="standard-input-container">
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
                  id="customer-email-input"
                  name="customerEmail"
                  type="email"
                  placeholder="Digite o e-mail"
                  class="standard-input"
                  required
                >
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
        </div>
        <?php createPrimaryButton('CADASTRAR', 'submit-form-button', '', 'submit');?>
      </form>
      <footer class="footer-container">
        <div class="footer-text">
          <p class="author-name">Gustavo Ramos Romagnolo</p>
          <h4>@GutoRomagnolo</h4>
        </div>
        <a href="https://github.com/GutoRomagnolo" target="_blank">
          <img class="icon-git" alt="Github" src="./../../assets/icon-git.png">
        </a>
      </footer>
    </div>
    <script src="./customers-registration.js"></script>
  </body>
</html>
