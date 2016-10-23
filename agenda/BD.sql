create database bd_agenda;

use bd_agenda;

create table tb_pessoa(
     id_pessoa          int                   not null,
     tx_nome            varchar(100)          not null,
     tx_sexo            char                  not null,
      idade             int                   not null,
     tx_fone            varchar(15)           not null,
     constraint pk_tb_pessoa primary key (id_pessoa)
)engine=innodb; --Esse "engine=innodb" significa o que.

create database bd_agenda;

use bd_agenda;

create table pessoa(
  id_pessoa       int auto_increment  not null,
  nome            varchar(100)        not null,
  sexo            char                not null,
  idade           int                 not null,
  telefone        varchar(17)         not null,
  constraint pk_pessoa primary key (id_pessoa)
);
select nome, sexo, idade, telefone from pessoa;
