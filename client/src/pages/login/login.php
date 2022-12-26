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
  <link href="./login.css" rel="stylesheet">
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
            <label>FAZER LOGIN</label>
            <hr class="horizontal-line">
          </div>
          <div class="standard-input-container">
            <label for="user-email-input">
              <span>E-MAIL</span>
            </label>
            <div class="input-icon-container">
              <img class="standard-input-icon" src="./../../assets/mail-icon.svg" alt="Email do usuário">
              <input id="user-email-input" name="userEmail" type="email" placeholder="Digite o e-mail"
                class="standard-input" required>
            </div>
          </div>
          <div class="standard-input-container">
            <label for="user-email-input">
              <span>SENHA</span>
            </label>
            <div class="input-icon-container">
              <img class="standard-input-icon" src="./../../assets/password-icon.svg" alt="Senha do usuário">
              <input id="user-email-input" name="userPassword" type="email" placeholder="Digite a senha"
                class="standard-input" required>
            </div>
          </div>
          <?php createPrimaryButton('ENTRAR', 'login-button', '', 'submit'); ?>
        </div>
        <div class="create-account-container">
          <div class="create-account-header">
            <hr class="horizontal-line">
            <label>NOVO POR AQUI?</label>
          </div>
          <?php createPrimaryButton('CRIAR CONTA', 'redirect-create-account-button', 'redirectCreateAccount()', 'button'); ?>
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