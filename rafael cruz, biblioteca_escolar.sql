drop schema biblioteca_escolar;
create schema biblioteca_escolar;
create database biblioteca_escolar;
use  biblioteca_escolar;

create table alunos (
id_aluno int not null auto_increment,
nome varchar(100) not null,
turma varchar(20) not null,
idade int not null,
primary key (id_aluno)
);

create table livros (
id_livro int not null auto_increment,
titulo varchar(100) not null,
autor varchar(100) not null,
quantidade int not null,
primary key (id_livro)
);

create table emprestimos (
id_emprestimo int not null auto_increment,
id_aluno int,
id_livro int,
data_emprestimo date not null,
dias_prazo int not null,

primary key (id_emprestimo),

constraint fk_emprestimo_aluno
foreign key (id_aluno)
references alunos (id_aluno),

constraint fk_emprestimo_livro
foreign key (id_livro)
references livros (id_livro)
);



insert into alunos (nome, turma, idade)
values
('Ana Souza', '1A', 15),
('Carlos Lima', '2B', 16),
('Rodrigues', '3C', 17),
('Rafael', '4D', 18);

select*from alunos;



insert into livros (titulo, autor, quantidade)
values
('Tristia Tristezas', 'Dante', 10),
('Divina Comédia', 'Dante Allegeri', 30),
('+ Esperto que o Diabo', 'Não lembro',20),
('Game of Thrones', '???', 45);

select*from livros;

insert into emprestimos (id_aluno, id_livro, data_emprestimo, dias_prazo)
values
(1, 2, '2026-10-13', 7),
(2, 1, '2026-10-13', 8),
(3, 1, '2026-10-13', 9),
(1, 3, '2026-10-13', 10);

alter table alunos
add telefone varchar(20);

select*from alunos;

update alunos
set telefone = '61999999001'
where id_aluno =1;

select*from alunos;
