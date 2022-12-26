<?php
require_once './../../components/primary-button/primary-button.php';
require_once './../../components/secundary-button/secundary-button.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <title>SCD - Cadastro de clientes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./sign-up.css" rel="stylesheet">
  <link href="./../../components/primary-button/primary-button.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./../../assets/document-icon.svg">
</head>

<body>
  <header>
    <img class="header-icon" src="./../../assets/customers-icon.svg" alt="Sistema de cadastro de clientes">
    <h1>SCD - SISTEMA DE CADASTRO DE CLIENTES</h1>
  </header>
  <div class="main-container" id="main-container">
    <form id="register-form" class="register-form" onsubmit="submitLoginForm(event)">
      <div class="form-content">
        <div class="login-form-container">
          <div class="login-form-header">
            <label>CRIAR CONTA</label>
            <hr class="horizontal-line">
          </div>
          <div class="standard-input-container">
            <label for="user-name-input">
              <span>NOME</span>
            </label>
            <div class="input-icon-container">
              <img class="standard-input-icon" src="./../../assets/customer-icon.svg" alt="Nome do usuário">
              <input id="user-name-input" name="user-name" type="text" placeholder="Digite seu nome"
                class="standard-input" required>
            </div>
          </div>
          <div class="standard-input-container">
            <label for="user-email-input">
              <span>E-MAIL</span>
            </label>
            <div class="input-icon-container">
              <img class="standard-input-icon" src="./../../assets/mail-icon.svg" alt="Email do usuário">
              <input id="user-email-input" name="user-email" type="email" placeholder="Digite seu e-mail"
                class="standard-input" required>
            </div>
          </div>
          <div class="standard-input-container">
            <label for="user-email-input">
              <span>SENHA</span>
            </label>
            <div class="input-icon-container">
              <img class="standard-input-icon" src="./../../assets/password-icon.svg" alt="Senha do usuário">
              <input id="user-password-input" name="user-password" type="password" placeholder="Digite sua senha"
                class="standard-input" required>
            </div>
          </div>
          <div class="standard-input-container">
            <label for="user-email-input">
              <span>CONFIRME A SENHA</span>
            </label>
            <div class="input-icon-container">
              <img class="standard-input-icon" src="./../../assets/password-icon.svg" alt="Confirmação de senha">
              <input id="user-confirm-password-input" name="user-password-confirm" type="password" placeholder="Digite novamente sua senha"
                class="standard-input" required>
            </div>
          </div>
          <?php createPrimaryButton('CRIAR CONTA', 'sign-up-button', '', 'submit'); ?>
        </div>
      </div>
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
  <script src="./login.js"></script>
</body>

</html>