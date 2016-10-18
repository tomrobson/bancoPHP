create database bd_agenda;

use bd_agenda;

create table tb_pessoa(
     id_pessoa          auto_increment        not null,
     tx_nome            varchar(100)          not null,
     tx_sexo            char                  not null,
      dataNascimento          int                   not null,
     tx_fone            varchar(15)           not null,
     constraint pk_tb_pessoa primary key (id_pessoa)
)engine=innodb; --Esse "engine=innodb" significa o que.

create database bdAgenda;

use bd_Agenda;

create table pessoa(
  id_pessoa       auto_increment      not null,
  nome            varchar(100)        not null,
  sexo            char                not null,
  nascimento      int                 not null,
  telefone        varchar(17)         not null,
  constraint pk_pessoa primary key (id_pessoa)
);
