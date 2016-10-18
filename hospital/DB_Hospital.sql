create database bd_hospital;

create table tb_especialidade(
	id_especialidade	int		not null,
	tx_especialidade	varchar(50)	not null,
	constraint pk_tb_especialidade primary key (id_especialidade)
)engine=innodb;

create table tb_medico(
	id_medico		int		not null primary key,
	especialidade_id	int 	not null,
	tx_nome			varchar(100)	not null,
	tx_crm			varchar(10)	not null,
	tx_sexo			char		not null,
	tx_cpf			varchar(11)	not null,
	foreign key (especialidade_id) references tb_especialidade (id_especialidade)
)engine=innodb;

insert into tb_especialidade values(1, 'Cardiologia');
insert into tb_especialidade values(2, 'Ortopedia');
insert into tb_especialidade values(3, 'Urologia');
insert into tb_especialidade values(4, 'Pediatria');
insert into tb_especialidade values(5, 'Neurologia');
insert into tb_especialidade values(6, 'Radiologia');
insert into tb_especialidade values(7, 'Otorrino');
insert into tb_especialidade values(8, 'Clínica Médica');

update tb_especialidade set tx_especialidade='Otorrinolaringologia' where id_especialidade=7;
insert into tb_medico values(1, 1,"Luan", "111111", "M", "11111111111");
insert into tb_medico values(2, 3,"Luan da Costa", "1111", "M", "11111111112");
insert into tb_medico values(3, 6,"David", "11111", "M", "11111111113");
insert into tb_medico values(4, 4,"Rafael", "111", "M", "11111111114");
insert into tb_medico values(5, 1,"Jhonatan", "11", "M", "11111111115");
insert into tb_medico values(6, 4,"Jose", "1", "M", "11111111116");
