create database bd_agenda;

use bd_agenda;

create table tb_pessoa(
     id_pessoa          int                  not null,
     tx_nome            varchar(100)  not null,
     tx_sexo             char                not null,
     ni_idade            int                   not null,
     tx_fone              varchar(15)    not null,
     constraint pk_tb_pessoa primary key (id_pessoa)
)engine=innodb;
