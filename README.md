# Projeto de Gerenciamento de Tarefas

Este é um projeto desenvolvido em Laravel para o gerenciamento de tarefas. Ele permite criar, editar, filtrar e excluir tarefas, além de aplicar filtros.

## Requisitos

Certifique-se de ter os seguintes itens instalados:

- PHP >= 8.1
- Composer
- Node.js (para compilar os assets)
- Banco de Dados (usei PostgreSQL)

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/yasminMVieira/to-do-adv.git
   cd to-do-adv
   ```

2. Instale as dependências do PHP com o Composer:
   ```bash
   composer install
   ```

3. Instale as dependências do Node.js e compile os assets:
   ```bash
   npm install
   npm run dev
   ```

4. Configure o arquivo `.env`:
   - Configure as variáveis de ambiente do banco de dados e outras configurações necessárias no arquivo `.env`.
   - Existe o .env.example

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

6. Execute as migrações para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate
   ```

7. (Opcional) Popular o banco de dados com dados de teste:
   ```bash
   php artisan db:seed
   ```

8. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```


## Funcionalidades Principais

- **Autenticação**: Usuários podem registrar-se e fazer login para acessar o sistema.
- **CRUD de Tarefas**:
  - Criar novas tarefas, especificando título, descrição e categoria.
  - Editar e excluir tarefas existentes.
  - Marcar tarefas como concluídas.
- **Filtros**:
  - Filtrar tarefas por categoria.
  - Exibir apenas tarefas concluídas.

