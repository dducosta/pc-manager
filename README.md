# PC Manager

Sistema web desenvolvido em Laravel para gerenciamento de peças de computador. O sistema permite cadastrar, editar, excluir e consultar peças, facilitando o controle de estoque de componentes de hardware.

## Funcionalidades

* Autenticação de usuários
* Dashboard inicial
* Cadastro de peças
* Edição de peças
* Exclusão de peças
* Listagem de peças
* Pesquisa de peças

## Tecnologias Utilizadas

* PHP 8.3
* Laravel 13
* SQLite
* Blade
* Tailwind CSS
* Vite

## Instalação

Clone o repositório:

```bash
git clone https://github.com/dducosta/pc-manager.git
```

Entre na pasta do projeto:

```bash
cd pc-manager
```

Instale as dependências do PHP:

```bash
composer install
```

Instale as dependências do Node:

```bash
npm install
```

Copie o arquivo de configuração:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

## Banco de Dados

Execute as migrations:

```bash
php artisan migrate
```

Popule o banco com os dados iniciais:

```bash
php artisan db:seed
```

## Executando o Projeto

Inicie o servidor Laravel:

```bash
php artisan serve
```

Em outro terminal, execute o Vite:

```bash
npm run dev
```

A aplicação ficará disponível em:

```
http://localhost:8000
```

## Usuário de Teste

Será criado automaticamente pelo Seeder.

**E-mail:** [admin@pcmanager.com](mailto:admin@pcmanager.com)

**Senha:** 12345678

**Perfil:** Administrador

## Estrutura do Projeto

* CRUD de peças de computador
* Dashboard
* Autenticação
* Banco de dados utilizando Migrations e Seeders

## Desenvolvido para

Atividade da disciplina **Desenvolvimento de Aplicações com Laravel** do Instituto Federal de São Paulo (IFSP).
