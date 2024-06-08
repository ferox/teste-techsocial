<p align="center">
  <a>
    <img src="https://cloud.disroot.org/apps/files_sharing/publicpreview/dSMnAX4RQXpKDRZ?file=/&fileId=295473319&x=1920&y=1080&a=true&etag=41040cd2bbba5481d2a94f75eaed74d3" alt="Screenshot Site" width="500" height="100%">
  </a>
  <h3 align="center">Teste Desenvolvedor FullStack PHP - TechSocial</h3>
</p>

<!--ÍNDICE -->
<details open="open">
  <summary>Índice</summary>
  <ol>
    <li>
      <a href="#sobre-o-teste">Sobre o teste</a>
      <ul>
        <li><a href="#tecnologias">Tecnologias</a></li>
      </ul>
    </li>
    <li>
      <a href="#iniciando">Iniciando</a>
      <ul>
        <li><a href="#requisitos">Requisitos</a></li>
      </ul>
    </li>
    <li>
      <a href="#passo-a-passo">Passo-a-passo</a>
      <ul>
        <li><a href="#criando-os-containers-usando-o-lando">Criando os containers usando o Lando</a></li>
        <li><a href="#criando-arquivo-com-as-variáveis-de-ambiente">Criando arquivo com as variáveis de ambiente</a></li>
        <li><a href="#editando-as-variáveis-de-ambiente-caso-necessite">Editando as variáveis de ambiente caso necessite</a></li>
        <li><a href="#instalando-as-dependências-do-projeto-com-composer">Instalando as dependências do projeto com composer</a></li>
        <li><a href="#criando-a-estrutura-do-banco-de-dados-e-suas-tabelas">Criando a estrutura do banco de dados e suas tabelas</a></li>
        <li><a href="#acessando-o-projeto-pelo-navegador">Acessando o projeto pelo navegador</a></li>
      </ul>
    </li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

<!-- ABOUT -->
## Sobre o Teste

O objetivo do desafio é criar uma aplicação monolítica com um front-end, integrado ao
projeto, que utiliza as informações consumidas do back-end em tela.

### Tecnologias

* [PHP 8.2](https://www.php.net/)
* [Apache 2](https://www.apache.org/)
* [PostgreSQL](https://www.postgresql.org/)
* [Phinx Database Migration](https://phinx.org/)
* [Doctrine ORM](https://www.doctrine-project.org/)
* [Lando](https://lando.dev/)


<!-- INICIANDO -->
## Iniciando

Para rodar o projeto localmente você precisa instalar todos os requisitos listados abaixo:

### Requisitos

Tenha em sua máquina o Docker e o Lando instalados:
* Docker version 26.1.4, build 5650f9b
  ```sh
  docker -v
  ```
* Lando - v3.21.0
  ```sh
  lando version
  ```
## Passo-a-Passo

### Criando os containers usando o Lando

* Clone o repositório
  ```sh
  git clone https://github.com/ferox/teste-techsocial.git
  ```
* Tenha certeza de estar dentro do diretório clonado, exemplo: ~/Projetos/Github.com/teste-techsocial
  ```sh
  pwd
  ```
* Criando e iniciando os containers
  ```sh
  lando start
  ```

### Criando arquivo com as variáveis de ambiente

#### Na raiz do projeto você encontra os seguinte arquivo:

- .env.lando

#### Renomeie ele, como mostrado abaixo:

- .env

### Editando as variáveis de ambiente caso necessite

* Abra o arquivo .env e edite as seguintes variáveis
  ```sh
  DB_HOST=database
  DB_NAME=lamp
  DB_USER=postgres
  DB_PASS=
  DB_PORT=5432
  
  # Banco de Dados de Teste
  TEST_DB_HOST=testdb
  TEST_DB_NAME=database
  TEST_DB_USER=postgres
  TEST_DB_PASS=
  TEST_DB_PORT=5432

### Instalando as dependências do projeto com composer

* Instale através do lando
  ```sh
  lando composer install
  ```

### Criando a estrutura do banco de dados e suas tabelas

* Vamos usar o migrate do phinx
  ```sh
  lando migrate
  ```
  
### Acessando o projeto pelo navegador

[https://teste-php-techsocial.lndo.site](https://teste-php-techsocial.lndo.site)

## License

[GNU General Public License v3](https://www.gnu.org/licenses/gpl-3.0.en.html)
