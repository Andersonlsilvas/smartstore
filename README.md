# Controle de Estoque

Sistema de Controle de Estoque desenvolvido em **PHP** utilizando o padrão de arquitetura **MVC** e banco de dados **MySQL**.

## Tela do Sistema

![Tela Principal](images/tela-principal.png)

---

## Funcionalidades

- Cadastro de produtos
- Cadastro de categorias
- Listagem de produtos
- Busca dinâmica por nome (AJAX)
- Filtro por categoria
- Edição de produtos
- Exclusão de produtos

---

## Tecnologias

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- AJAX

---

## Estrutura do Projeto

- MVC
- Controllers
- Models
- Views

---

## Como executar

### 1. Clone o projeto

```bash
git clone URL_DO_REPOSITORIO
```

### 2. Copie o projeto para a pasta `htdocs` do XAMPP.

### 3. Inicie o Apache e o MySQL pelo XAMPP.

### 4. Importe os arquivos SQL localizados na pasta `database`

- smartstore_categorias.sql
- smartstore_produtos.sql

### 5. Configure a conexão com o banco de dados no arquivo:

```text
app/config/database.php
```

Informando:

- Host
- Banco de dados
- Usuário
- Senha

### 6. Execute o projeto

Acesse no navegador:

```text
http://localhost/smartstore-teste/public
```

---

## Estrutura de Pastas

```text
smartstore-teste/

├── app/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   └── views/
│
├── public/
│   ├── ajax/
│   ├── css/
│   ├── js/
│   └── index.php
│
├── database/
│   ├── smartstore_categorias.sql
│   └── smartstore_produtos.sql
│
├── images/
│   └── tela-principal.png
│
├── README.md
└── .gitignore
```

---

## Autor

**Anderson Santos**

Projeto desenvolvido para demonstrar a implementação de um sistema de Controle de Estoque utilizando PHP, MySQL e o padrão de arquitetura MVC.