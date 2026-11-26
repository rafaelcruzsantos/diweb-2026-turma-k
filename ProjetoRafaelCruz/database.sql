-- ============================================================
-- Linho & Lume — banco de dados (MySQL / MariaDB)
-- Importe este arquivo no phpMyAdmin (aba "Importar") ou rode:
--   mysql -u root < database.sql
-- O nome do banco precisa ser o mesmo de config/Database.php
-- ============================================================

CREATE DATABASE IF NOT EXISTS testebd3 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE testebd3;

-- Apaga as tabelas na ordem certa (filhas primeiro) para poder reimportar
DROP TABLE IF EXISTS tbl_variacao;
DROP TABLE IF EXISTS tbl_cliente;
DROP TABLE IF EXISTS tbl_produto;
DROP TABLE IF EXISTS tbl_usuario;

-- ------------------------------------------------------------
-- Usuários do sistema (login). Perfis: admin, vendedor, cliente
-- ------------------------------------------------------------
CREATE TABLE tbl_usuario (
  id     INT AUTO_INCREMENT PRIMARY KEY,
  nome   VARCHAR(100) NOT NULL,
  login  VARCHAR(100) NOT NULL UNIQUE,
  senha  VARCHAR(255) NOT NULL,          -- hash gerado por password_hash()
  perfil VARCHAR(20)  NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Dados do cliente (1 linha por usuário com perfil "cliente")
-- ------------------------------------------------------------
CREATE TABLE tbl_cliente (
  id               INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id       INT NOT NULL UNIQUE,
  telefone         VARCHAR(20)  NULL,
  nascimento       DATE         NULL,
  cidade           VARCHAR(80)  NULL,
  estilo_preferido VARCHAR(20)  NULL,
  criado_em        TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES tbl_usuario(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Produtos da loja (preço fica aqui)
-- ------------------------------------------------------------
CREATE TABLE tbl_produto (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  nome         VARCHAR(100)  NOT NULL,
  categoria    VARCHAR(40)   NOT NULL,
  descricao    VARCHAR(255)  NOT NULL,
  preco        DECIMAL(10,2) NOT NULL,
  preco_antigo DECIMAL(10,2) NULL,        -- preenchido quando está em promoção
  imagem       VARCHAR(60)   NOT NULL,    -- arquivo dentro de assets/images/
  destaque     TINYINT(1)    NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Variações: cada combinação de tamanho + cor de um produto
-- ------------------------------------------------------------
CREATE TABLE tbl_variacao (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  produto_id INT         NOT NULL,
  tamanho    VARCHAR(4)  NOT NULL,        -- P, M, G, GG
  cor        VARCHAR(30) NOT NULL,
  cor_hex    CHAR(7)     NOT NULL,        -- usado na bolinha de cor do card
  estoque    INT         NOT NULL DEFAULT 0,
  UNIQUE KEY uq_produto_tamanho_cor (produto_id, tamanho, cor),
  FOREIGN KEY (produto_id) REFERENCES tbl_produto(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- Dados iniciais
-- ============================================================

-- Administrador de teste. Login: admin | Senha: admin123 (troque depois!)
INSERT INTO tbl_usuario (nome, login, senha, perfil) VALUES
('Administrador', 'admin', '$2y$10$a6eV1zrPILb7c4iTZ2fcoudVxPiTaf.VIcINJdQ5ZpMO7Zb9UmmdG', 'admin');

-- Produtos
INSERT INTO tbl_produto (id, nome, categoria, descricao, preco, preco_antigo, imagem, destaque) VALUES

(1, 'Camisa Linho Areia', 'Camisaria', 'Linho puro, manga longa, botões de madeira.', 189.90, NULL, 'camisa.svg', 1),
(2, 'Vestido Midi Terracota', 'Vestidos', 'Viscose fluida com decote em V e cintura marcada.', 279.90, 329.90, 'vestido.svg', 1),
(3, 'Calça Alfaiataria Oliva', 'Alfaiataria', 'Cintura alta, pregas frontais e perna reta.', 229.90, NULL, 'calca.svg', 1),
(4, 'Jaqueta Jeans Lavada', 'Jeans', 'Jeans de algodão, lavagem clara e bolsos frontais.', 319.90, NULL, 'jaqueta.svg', 1),
(5, 'Blusa Cropped Algodão', 'Básicos', 'Algodão pima, gola redonda e modelagem ajustada.', 99.90, NULL, 'camisa.svg', 0),
(6, 'Saia Plissada Café', 'Alfaiataria', 'Plissado permanente, comprimento midi.', 169.90, NULL, 'vestido.svg', 0),
(7, 'Camiseta Básica Premium', 'Básicos', 'Malha encorpada que não deforma na lavagem.', 79.90, NULL, 'camisa.svg', 0),
(8, 'Macacão Utilitário', 'Jeans', 'Sarja leve, zíper frontal e bolsos amplos.', 349.90, NULL, 'calca.svg', 0);

-- Variações (produto, tamanho, cor, cor em hex, estoque)
INSERT INTO tbl_variacao (produto_id, tamanho, cor, cor_hex, estoque) VALUES

(1, 'P', 'Areia', '#e2d3b8', 8),
(1, 'M', 'Areia', '#e2d3b8', 10),
(1, 'G', 'Areia', '#e2d3b8', 12),
(1, 'GG', 'Areia', '#e2d3b8', 4),
(1, 'P', 'Branco', '#fbf6ee', 11),
(1, 'M', 'Branco', '#fbf6ee', 3),
(1, 'G', 'Branco', '#fbf6ee', 5),
(1, 'GG', 'Branco', '#fbf6ee', 7),
(2, 'P', 'Terracota', '#b5532f', 3),
(2, 'M', 'Terracota', '#b5532f', 5),
(2, 'G', 'Terracota', '#b5532f', 7),
(2, 'P', 'Oliva', '#4b5a45', 6),
(2, 'M', 'Oliva', '#4b5a45', 8),
(2, 'G', 'Oliva', '#4b5a45', 10),
(3, 'P', 'Oliva', '#4b5a45', 8),
(3, 'M', 'Oliva', '#4b5a45', 10),
(3, 'G', 'Oliva', '#4b5a45', 12),
(3, 'GG', 'Oliva', '#4b5a45', 4),
(3, 'P', 'Preto', '#2a2a26', 11),
(3, 'M', 'Preto', '#2a2a26', 3),
(3, 'G', 'Preto', '#2a2a26', 5),
(3, 'GG', 'Preto', '#2a2a26', 7),
(4, 'P', 'Azul claro', '#8ba1b8', 3),
(4, 'M', 'Azul claro', '#8ba1b8', 5),
(4, 'G', 'Azul claro', '#8ba1b8', 7),
(5, 'P', 'Branco', '#fbf6ee', 8),
(5, 'M', 'Branco', '#fbf6ee', 10),
(5, 'G', 'Branco', '#fbf6ee', 12),
(5, 'P', 'Terracota', '#b5532f', 11),
(5, 'M', 'Terracota', '#b5532f', 3),
(5, 'G', 'Terracota', '#b5532f', 5),
(6, 'P', 'Café', '#6f4e37', 3),
(6, 'M', 'Café', '#6f4e37', 5),
(6, 'G', 'Café', '#6f4e37', 7),
(6, 'P', 'Areia', '#e2d3b8', 6),
(6, 'M', 'Areia', '#e2d3b8', 8),
(6, 'G', 'Areia', '#e2d3b8', 10),
(7, 'P', 'Branco', '#fbf6ee', 8),
(7, 'M', 'Branco', '#fbf6ee', 10),
(7, 'G', 'Branco', '#fbf6ee', 12),
(7, 'GG', 'Branco', '#fbf6ee', 4),
(7, 'P', 'Preto', '#2a2a26', 11),
(7, 'M', 'Preto', '#2a2a26', 3),
(7, 'G', 'Preto', '#2a2a26', 5),
(7, 'GG', 'Preto', '#2a2a26', 7),
(7, 'P', 'Oliva', '#4b5a45', 4),
(7, 'M', 'Oliva', '#4b5a45', 6),
(7, 'G', 'Oliva', '#4b5a45', 8),
(7, 'GG', 'Oliva', '#4b5a45', 10),
(8, 'P', 'Oliva', '#4b5a45', 3),
(8, 'M', 'Oliva', '#4b5a45', 5),
(8, 'G', 'Oliva', '#4b5a45', 7),
(8, 'P', 'Areia', '#e2d3b8', 6),
(8, 'M', 'Areia', '#e2d3b8', 8),
(8, 'G', 'Areia', '#e2d3b8', 10);
