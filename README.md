# SDC - Sistema de Cadastro de Clientes

## Pré-requisitos
Ter instalado:
- PHP 7.4.3;
- MySQL 8.0.31;
- Apache 2.4.41.

Caso seja necessário, [clique aqui](https://www.vultr.com/docs/install-linux-apache-mysql-and-php-lamp-on-ubuntu-20-04-lts/?utm_source=performance-max-latam&utm_medium=paidmedia&obility_id=17096555207&utm_adgroup=&utm_campaign=&utm_term=&utm_content=&gclid=Cj0KCQiAwJWdBhCYARIsAJc4idCbU5N5w0hQ5c8Skcqth9VIcupXEw87X-DErKaP0RosoFtagZzxSggaAoAHEALw_wcB#) para visitar o guia que utilizei para instalar e normalizar todos esses requisitos.

## Como executar o programa

Navegue até o diretório no qual o projeto foi clonado, via terminal, mas não entre na pasta do projeto, pois será necessário executar esse comando na pasta:
```sh
php -S localhost:3000 -t customers-registration
```

Não será necessária a execução de um script SQL para gerar o banco de dados e suas tabelas, pois isso acontece sistematicamente ao navegar pelo programa. Porém, caso ocorra algum problema relacionado às permissões do usuário "root", deixo abaixo alguns links que me ajudaram na solução:

[Link 1;](https://askubuntu.com/questions/763336/cannot-enter-phpmyadmin-as-root-mysql-5-7/763359#763359)
[Link 2](https://www.youtube.com/watch?v=UtaAhHJVoeg)

Caso queira ter uma visão melhor das tabelas, recomendo o uso de softwares de gerenciamento de banco de dados. Para conectar-se ao banco, basta visualizar os dados de conexão no arquivo "config.php", localizado em server/src/app/database/config.php. 

## Iniciando a navegação



## A fazer
- Melhor estruturação da API.
- Rotas de acesso.
- Máscaras de formatação em todos os campos.
