drop schema biblioteca_escolar;
create schema biblioteca_escolar;
create database biblioteca_escolar;
use  biblioteca_escolar;
--Comando para criar uma tabela.
create table alunos (
id_aluno int not null auto_increment,
nome varchar(100) not null,
turma varchar(20) not null,
idade int not null,
primary key (id_aluno) --Comando para dizer qual é a chave primária.
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

constraint fk_emprestimo_aluno --Criando o nome da chave estrangeira, juntando a chave primária da tabela com outra chave primária da tabela selecionada.
foreign key (id_aluno) --Dizendo qual é a chave primária sendo usada, para criar a chaveira estrangeira.
references alunos (id_aluno), --Dizendo onde está a chave primária (tabela alunos, chave primária id_aluno)

constraint fk_emprestimo_livro
foreign key (id_livro)
references livros (id_livro)
);


--Inserindo valores na tabela, nome turma e idade.
insert into alunos (nome, turma, idade)
values
('Ana Souza', '1A', 15),
('Carlos Lima', '2B', 16),
('Rodrigues', '3C', 17),
('Rafael', '4D', 18);

select*from alunos; --Comando pra mostrar a tabela e o que está dentro dela, vai aparecer o que vc escreveu no outro comando (insert into).



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

alter table alunos  --Fazendo alteração na tabela alunos
add telefone varchar(20); --Colocando uma nova divisão na tabela, para guardar telefones.

select*from alunos;

update alunos  --Atualizando a tabela alunos.
set telefone = '61999999001' --Colocando um telefone, na nova tabela, "telefone" que acabamos de adicionar.
where id_aluno =1; --Dizendo que o número que colocamos, vai pra primeira pessoa que tem o id "1", que vai ser a Ana.

select*from alunos;
