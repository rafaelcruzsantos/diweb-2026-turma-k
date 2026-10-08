drop schema loja_sistema;
create schema loja_sistema;
create database loja_sistema;
use loja_sistema;

CREATE TABLE cliente (
id_cliente int not null auto_increment,
nome varchar(100) not null,
email varchar(100) not null,
cidade varchar(50),
primary key (id_cliente)
);

CREATE TABLE produto (
id_produto int not null auto_increment,
nome varchar(100) not null,
preco decimal(10,2) not null,
estoque int not null,
primary key (id_produto)
);


CREATE TABLE venda (
id_venda int not null auto_increment,
id_cliente int not null,
id_produto int not null,
quantidade int not null,
data_venda date not null,

primary key (id_venda),

constraint fk_venda_cliente
foreign key (id_cliente)
references cliente (id_cliente),

constraint fk_venda_produto
foreign key (id_produto)
references produto (id_produto)
);

show tables;

describe cliente;
describe produto;
describe venda;

insert into cliente (nome, email, cidade)
values 
('Rafael Cruz Santos', 'rafaeldacrus423@gmail.com', 'Brasília'),
('Mariana Santos', 'marianasantos123@gmail.com', 'Cruzeiro'),
('Sara Rodrigues', 'sararodrigues492@gmail.com', 'Ceilândia');

select * from cliente;

insert into produto (nome, preco, estoque)
values
('Teclado' , '80.00', '15'),
('Mouse', '150.00', '30'),
('Monitor', '3000.00', '10');

select * from produto;

insert into venda (id_cliente, id_produto, quantidade, data_venda)
values
(1, 2, 2, '2026-10-08'),
(2, 1, 1, '2026-10-08'),
(1, 3, 1, '2026-10-08'),
(3, 3, 1, '2026-10-08');

select*from venda;

alter table cliente
 add telefone varchar(20);
 
 describe cliente;



