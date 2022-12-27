const createStandardHeader = () => {
  const standardHeaderTemplate = `
    <nav class="header-navigation">
      <a class="customers-nav" href="./client/src/pages/customers-registration/customers-registration.html">
        <div>CADASTRO DE CLIENTES</div>
      </a>
      <a class="customers-nav" href="./client/src/pages/customers-list/customers-list.html">
        <div>LISTA DE CLIENTES</div>
      </a>
    </nav>
  `

  const headerElement = document.querySelector('header');
  headerElement.innerHTML += standardHeaderTemplate;
}