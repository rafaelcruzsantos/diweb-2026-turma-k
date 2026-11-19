drop schema academia_avaliacao;
create schema academia_avaliacao;
use academia_avaliacao;

create table alunos (
id_aluno int not null auto_increment,
nome varchar(100) not null,
idade int not null,
telefone varchar(20) not null,
primary key (id_aluno)
);

create table planos (
id_plano int not null auto_increment,
nome_plano varchar(50) not null,
valor decimal(10,2) not null,
primary key (id_plano)
);

create table matricula (
id_matricula int not null auto_increment,
id_aluno int not null,
id_plano int not null,
data_matricula date not null,

primary key (id_matricula),

constraint fk_matricula_aluno
foreign key (id_aluno)
references alunos (id_aluno),


constraint fk_matricula_plano
foreign key (id_plano)
references planos (id_plano)
);

show tables;
describe alunos;
describe planos;
describe matricula;

insert into alunos (nome, idade, telefone)
values
('Ana Souza', '22', '619999990001'),
('Carlos Lima','18','619999999002'),
('Mariana Alves','25','6199999003');

select*from alunos;

insert into planos (nome_plano, valor)
values
('Mensal', 100.00),
('Trimestral', 270.00),
('Anual',960.00);

select*from planos;

insert into matricula (id_aluno, id_plano, data_matricula)
values
('1','2','2026-10-21'),
('2','2','2026-10-21'),
('3','3','2026-10-21');

select*from matricula;

alter table alunos
add email varchar(100);
describe alunos;

update planos
set valor = 120.00
where nome_plano = 'Mensal';
 
 select*from planos;
 
 insert into alunos(nome, idade, telefone)
 values
 ('Pedro Martins', '30', '6199999004');
 
 delete from alunos
 where nome = 'Pedro Martins';
 select*from alunos;
 
 create table teste (
 id_teste int not null auto_increment,
 descricao varchar(100),
 primary key (id_teste)
 );
 
 drop table teste;
 
 
 