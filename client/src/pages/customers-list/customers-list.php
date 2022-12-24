<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>SCD - Lista de clientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="customers-list.css" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    >
    <link rel="icon" type="image/x-icon" href="./../../assets/document-icon.svg">
  </head>

  <body>
    <?php require_once "../../components/standard_header/standard_header.php" ?>
    <section class="main-container">
      <h1>LISTA DE CLIENTES</h1>
      <div class="customers-list-container" id="customers-list"></div>
      <footer class="footer-container">
        <div class="footer-text">
          <p class="author-name">Gustavo Ramos Romagnolo</p>
          <h4>@GutoRomagnolo</h4>
        </div>
        <a href="https://github.com/GutoRomagnolo" target="_blank">
          <img class="icon-git" alt="Github" src="./../../assets/icon-git.png">
        </a>
      </footer>
    </section>
    <script src="./customers-list.js"></script>
  </body>
</html>
