create database aula18;
use aula18;

create table equipe (
		id integer not null primary key,
		nome varchar(30) not null,
		cidade varchar(30) not null
);

create table atleta (
		id integer not null primary key,
		nome varchar(30) not null,
		sobrenome varchar(30) not null,
		posicao varchar(30) not null,
		equipe_id integer not null,
		
		constraint equipe_fk 
			foreign key (equipe_id) 
			references equipe(id)
);

insert into equipe (id,nome,cidade) values (1,'Tabajara','Fim do Mundo');
insert into equipe (id,nome,cidade) values (2,'Ibis','Onde Judas Perdeu as Meias');

insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (0,'Carlos','Moreira','Goleiro',1);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (1,'Antonio','Garcia','Defesa',1);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (2,'Cassio','Schuch','Ala',1);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (3,'Julio','Antunes','Ala',1);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (4,'Lucas','Tessmann','Ataque',1);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (5,'Gabriel','Donato','Goleiro',2);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (6,'Ivan','Armstrong','Defesa',2);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (7,'Alberto','Contador','Ala',2);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (8,'Nairo','Quintana','Ala',2);
insert into atleta (id,nome,sobrenome,posicao,equipe_id) values (9,'Luke','Basso','Ataque',2);