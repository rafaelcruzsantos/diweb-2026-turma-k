# Linho & Lume — loja de roupas (PHP MVC)

Site da loja Linho & Lume integrado ao template MVC (PHP + PDO + MySQL).

## Como rodar (XAMPP / WAMP / Laragon)

1. Copie a pasta do projeto para `htdocs` (ou `www`).
2. No phpMyAdmin, importe o arquivo `database.sql` (ele cria o banco `testebd3`).
3. Se o seu banco tiver outro nome, usuário ou senha, ajuste `config/Database.php`.
4. Abra `http://localhost/linho-lume-mvc/` no navegador.

> Este projeto usa PHP, então **não funciona no GitHub Pages** (que só publica HTML/CSS).

## Acessos de teste

| Perfil | Login | Senha |
|--------|-------|-------|
| Administrador | `admin` | `admin123` |
| Cliente | crie em **Cadastre-se** | a que você escolher |

Troque a senha do admin depois de testar.

## Estrutura

```
index.php                 front controller (?controller=...&action=...)
config/Database.php       conexão PDO
app/helpers.php           e() escapa HTML, preco() formata moeda
app/models/               Model (base), Usuario, Cliente, Produto
app/controllers/          Home, Produto, Login, Cadastro, Painel, Usuario, Cliente
app/views/                layouts (header/footer) + uma pasta por controller
assets/                   css e imagens
database.sql              tabelas + dados iniciais
```

## Banco de dados

- `tbl_usuario` — login, senha (hash) e perfil (`admin`, `vendedor`, `cliente`)
- `tbl_cliente` — telefone, nascimento, cidade e estilo preferido (1 por usuário cliente)
- `tbl_produto` — nome, categoria, descrição, **preço**, preço antigo, imagem, destaque
- `tbl_variacao` — **tamanho** + **cor** + estoque de cada produto

## Páginas

| Rota | Quem acessa |
|------|-------------|
| `home`, `produto`, `login`, `cadastro` | todos |
| `painel` | qualquer usuário logado |
| `cliente` (lista de clientes) | admin e vendedor |
| `usuario` (CRUD de usuários) | somente admin |
