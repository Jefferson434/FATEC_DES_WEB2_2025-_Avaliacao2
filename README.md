# 🛍️ Sistema de Catálogo Virtual da Lojinha

Este é um sistema simples em PHP para que lojistas possam **cadastrar, visualizar e remover produtos** do seu catálogo virtual. O sistema exige **autenticação via login** e é construído com **orientação a objetos e PDO** para segurança e organização.

---

## ✅ Funcionalidades

- 🔐 Login e Logout com autenticação de usuário
- 🧾 Cadastro de produtos
- 📋 Listagem de produtos
- ❌ Remoção de produtos
- 🎨 Interface com Bootstrap (responsiva e moderna)
- 💾 Acesso ao banco de dados com PDO (orientado a objetos)

---

## 📁 Estrutura de Diretórios

├── code/
│ └── login.php # Classe Login (autenticação)
├── classes/
│ └── DB.php # Classe DB (PDO e acesso ao banco)
├── views/
│ ├── login_formulario.php # Formulário de login
│ └── produtos.php # Cadastro, listagem e remoção
├── index.php # Controlador principal
├── logout.php # Encerra a sessão
├── loja.sql # Script SQL para criação da base
└── README.md


---

## 🧪 Login de Teste

Usuário: admin
Senha: admin

---

---

##  Cadastrar Produto

![alt text](image-1.png)

---

---

## Visualizar Produto

![alt text](image.png)

Usuário: admin
Senha: admin

---

---

## 🧪 Remover Produto

![alt text](image.png)

Usuário: admin
Senha: admin

---
## 🛠️ Requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor local como XAMPP, WAMP, MAMP ou similar
- Navegador moderno

---

## ⚙️ Instalação

1. Clone ou baixe este repositório.
2. Importe o arquivo `loja.sql` no seu phpMyAdmin (crie o banco `loja`).
3. Inicie seu servidor local (Apache + MySQL).
4. Acesse via navegador: `http://localhost/nome-da-pasta/index.php`

---

## 🧠 Banco de Dados

### 📦 Tabela `produtos`

| Campo      | Tipo              |
|------------|-------------------|
| id         | INT (PK, AI)      |
| nome       | VARCHAR(100)      |
| preco      | DECIMAL(10,2)     |
| descricao  | VARCHAR(255)      |
| categoria  | VARCHAR(30)       |

### 👤 Tabela `usuarios`

| Campo      | Tipo              |
|------------|-------------------|
| id         | INT (PK, AI)      |
| username   | VARCHAR(50)       |
| senha      | VARCHAR(32) (MD5) |

---

## 💬 Observações

- A conexão ao banco é feita exclusivamente pela classe `DB` usando PDO.
- Comandos SQL estão encapsulados (seguindo boas práticas de segurança).
- O sistema pode ser facilmente adaptado para múltiplos usuários.

---

## 📸 Captura de Tela

![alt text](image.png)
![alt text](image-1.png)
![alt text](image.png)

---

## 📄 Licença

Este projeto é de uso acadêmico/livre. Modifique e use como desejar!
