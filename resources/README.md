# 🔐 Sistema Auth — Laravel

Sistema simples de login e registro com banco de dados MySQL (Railway).

---

## 📁 Estrutura do Projeto

```
laravel-auth/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php       ← Login, Registro, Logout
│   │   └── DashboardController.php  ← Painel pós-login
│   └── Models/
│       └── User.php
├── database/migrations/
│   ├── ..._create_users_table.php
│   └── ..._create_sessions_table.php
├── resources/views/
│   ├── layouts/app.blade.php        ← Layout base
│   ├── auth/
│   │   ├── login.blade.php
│   │   └── register.blade.php
│   └── dashboard.blade.php
├── routes/web.php
├── setup.sql                        ← Script direto para o Railway
└── .env.example
```

---

## 🚀 Instalação Local

```bash
# 1. Clone o projeto e entre na pasta
composer install

# 2. Copie o .env
cp .env.example .env

# 3. Gere a APP_KEY
php artisan key:generate

# 4. Configure o banco no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_auth
DB_USERNAME=root
DB_PASSWORD=sua_senha

# 5. Rode as migrations
php artisan migrate

# 6. Inicie o servidor
php artisan serve
```

---

## 🚂 Deploy no Railway

### Opção A — SQL direto (mais rápido)

1. No Railway, clique no serviço **MySQL** → **Query**
2. Cole o conteúdo de `setup.sql` e execute
3. Pronto, tabelas criadas!

### Opção B — Migrations do Laravel

```bash
# Com a Railway CLI instalada:
railway run php artisan migrate
```

### Variáveis de ambiente no Railway

No painel do seu serviço Laravel, vá em **Variables** e adicione:

| Variável         | Valor                              |
|------------------|------------------------------------|
| `APP_ENV`        | `production`                       |
| `APP_KEY`        | (resultado de `php artisan key:generate --show`) |
| `APP_DEBUG`      | `false`                            |
| `DB_CONNECTION`  | `mysql`                            |
| `DB_HOST`        | `${{MySQL.MYSQLHOST}}`             |
| `DB_PORT`        | `${{MySQL.MYSQLPORT}}`             |
| `DB_DATABASE`    | `${{MySQL.MYSQLDATABASE}}`         |
| `DB_USERNAME`    | `${{MySQL.MYSQLUSER}}`             |
| `DB_PASSWORD`    | `${{MySQL.MYSQLPASSWORD}}`         |
| `SESSION_DRIVER` | `database`                         |

> 💡 O Railway permite usar a sintaxe `${{MySQL.MYSQLHOST}}` para referenciar variáveis de outro serviço automaticamente.

---

## 🔑 Rotas

| Método | Rota         | Descrição              | Middleware |
|--------|--------------|------------------------|------------|
| GET    | `/login`     | Tela de login          | guest      |
| POST   | `/login`     | Processar login        | guest      |
| GET    | `/register`  | Tela de cadastro       | guest      |
| POST   | `/register`  | Processar cadastro     | guest      |
| GET    | `/dashboard` | Painel do usuário      | auth       |
| POST   | `/logout`    | Encerrar sessão        | auth       |

---

## 🛡️ Segurança

- Senhas com `bcrypt` via `Hash::make()`
- Proteção CSRF em todos os formulários (`@csrf`)
- Regeneração de sessão após login/logout
- Middleware `auth` no dashboard
- Middleware `guest` nas rotas de autenticação
