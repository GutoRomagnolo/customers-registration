<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $addressFormRequestJSON = file_get_contents('php://input');
  $addressFormRequestObject = json_decode($addressFormRequestJSON);

  createAddressForm($addressFormRequestObject->addressQuantity);
}

function createAddressForm($addressQuantity) {
  $addressFormTemplate = "
    <div class=\"minimized-address-title full-border-element\">
      <span>Endereço $addressQuantity</span>
      <img class=\"new-address-icon expand-icon\" src=\"./../../assets/expand-icon.svg\" alt=\"Expandir endereço\">
    </div>
    <div class=\"address-content-expanded hidden-element\">
      <div class=\"standard-input-container\">
        <label for=\"customer-address-input\">
          <span>NOME DO ENDEREÇO</span>
        </label>
        <div class=\"input-icon-container\">
          <img
            class=\"standard-input-icon\"
            src=\"./../../assets/house-icon.svg\"
            alt=\"Nome do endereço do cliente\"
          >
          <input
            id=\"address-name-input\"
            name=\"customer-address-name\"
            placeholder=\"Digite o nome do endereço\"
            class=\"standard-input\"
            required
          >
        </div>
      </div>
      <div class=\"standard-input-container multiple-rows-container\">
        <div class=\"street-container\">
          <label for=\"street-input\">
            <span>RUA</span>
          </label>
          <div class=\"input-icon-container\">
            <img
              class=\"standard-input-icon\"
              src=\"./../../assets/location-icon.svg\"
              alt=\"Endereço do cliente\"
            >
            <input
              id=\"street-input\"
              name=\"customer-address-street\"
              placeholder=\"Digite o nome da rua\"
              class=\"standard-input\"
              required
            >
          </div>
        </div>
        <div class=\"address-number-container\">
          <label for=\"address-number-input\">
            <span>NÚMERO</span>
          </label>
          <div class=\"input-icon-container\">
            <img
              class=\"standard-input-icon\"
              src=\"./../../assets/number-icon.svg\"
              alt=\"Número do endereço do cliente\"
            >
            <input
              id=\"address-number-input\"
              name=\"customer-address-number\"
              type=\"number\"
              placeholder=\"Nº\"
              class=\"standard-input\"
              required
          >
          </div>
        </div>
      </div>
      <div class=\"standard-input-container multiple-rows-container\">
        <div class=\"multiple-rows-input\">
          <label for=\"neighborhood-input\">
            <span>BAIRRO</span>
          </label>
          <div class=\"input-icon-container\">
            <img
              class=\"standard-input-icon\"
              src=\"./../../assets/neigh-icon.svg\"
              alt=\"Bairro do cliente\"
            >
            <input
              id=\"neighborhood-input\"
              type=\"text\"
              name=\"customer-address-neighborhood\"
              placeholder=\"Digite o bairro\"
              class=\"standard-input\"
              required
            >
          </div>
        </div>
        <div class=\"multiple-rows-input\">
          <label for=\"complement-input\">
            <span>COMPLEMENTO</span>
          </label>
          <div class=\"input-icon-container\">
            <img
              class=\"standard-input-icon\"
              src=\"./../../assets/address-icon.svg\"
              alt=\"Complemento do cliente\"
            >
            <input
              id=\"complement-input\"
              type=\"text\"
              name=\"customer-address-complement\"
              placeholder=\"Complemento\"
              class=\"standard-input\"
              required
            >
          </div>
        </div>
        <div class=\"multiple-rows-input\">
          <label for=\"zip-code-input\">
            <span>CEP</span>
          </label>
          <div class=\"input-icon-container\">
            <img 
              class=\"standard-input-icon\" 
              src=\"./../../assets/map-icon.svg\"
              alt=\"Idade do cliente\"
            >
            <input
              id=\"zip-code-input\"
              type=\"text\"
              placeholder=\"Digite o CEP\"
              name=\"customer-address-zip-code\"
              class=\"standard-input customer-birthday\"
            >
          </div>
        </div>
      </div>
      <div class=\"standard-input-container multiple-rows-container\">
        <div class=\"street-container\">
          <label for=\"city-input\">
            <span>CIDADE</span>
          </label>
          <div class=\"input-icon-container\">
            <img
              class=\"standard-input-icon\"
              src=\"./../../assets/city-icon.svg\"
              alt=\"Cidade do cliente\"
            >
            <input
              id=\"city-input\"
              type=\"text\"
              name=\"customer-address-city\"
              placeholder=\"Digite o nome da rua\"
              class=\"standard-input\"
              required
            >
          </div>
        </div>
        <div class=\"address-number-container\">
          <label for=\"state-input\">
            <span>ESTADO</span>
          </label>
          <div class=\"input-icon-container\">
            <img
              class=\"standard-input-icon\"
              src=\"./../../assets/state-icon.svg\"
              alt=\"Estado do cliente\"
            >
            <input
              id=\"state-input\"
              name=\"customer-address-state\"
              type=\"text\"
              placeholder=\"Estado\"
              class=\"standard-input\"
              required
            >
          </div>
        </div>
      </div>
    </div>
  ";
  echo $addressFormTemplate;
}
?>