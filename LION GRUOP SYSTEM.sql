-- lenguaje de definicion de datos DDL --

create database LION_GRUOP_SYSTEM;
use LION_GRUOP_SYSTEM;

create table funcion
(
id_funcion integer primary key not null auto_increment,
nombre_funcion varchar (20) not null
);

create table tipo_colaborador
(
id_tipo_colaborador int primary key not null auto_increment,
tipo_colaborador varchar(30)not null
);

create table colaborador
(
id_colaborador int primary key not null auto_increment,
cedula int not null unique,
nombres varchar(45) not null,
apellidos varchar(45) not null,
id_funcion int not null,
id_tipo_colaborador int not null,
telefono int,
correo varchar(60),
constraint fk_funcion_colaborador
foreign key (id_funcion)
references funcion(id_funcion)
on delete cascade
on update cascade,
constraint fk_tip_colab_colaborador
foreign key (id_tipo_colaborador)
references tipo_colaborador(id_tipo_colaborador)
on delete cascade
on update cascade
);


create table beneficiarios
(
id_beneficiario int auto_increment primary key not null,
nombre varchar(50) not null,
apellidos varchar(50) not null,
fecha_ingreso date not null,
tipo_documento varchar (30)not null,
n_documento int unique not null
);

create table afiliados
(
id_afiliado int primary key not null auto_increment,
nombres varchar(45) not null,
apellidos varchar(45) not null,
nombre_empresa varchar(60)not null,
nit_empresa int not null unique,
tipo_documento varchar(30) not null,
n_documento int not null unique,
correo varchar (50),
id_beneficiario int not null,
constraint fk_beneficiarios_afiliados
foreign key (id_beneficiario)
references beneficiarios(id_beneficiario)
);


create table reclamaciones
(
id_reclamaciones int not null primary key auto_increment,
id_afiliado int not null,
fecha_reclamacion date not null,
eps_traslado varchar(50) not null,
id_colaborador int not null,
constraint fk_colaborador_reclamaciones
foreign key (id_colaborador)
references colaborador(id_colaborador),
constraint fk_afiliados_reclamaciones
foreign key (id_afiliado)
references afiliados(id_afiliado)
);

create table eps
(
id_eps int primary key not null auto_increment,
nombre varchar(60) not null,
numero_nit int unique not null,
telefono int,
direccion varchar(60)
);

create table formularios
(
id_formulario int not null primary key auto_increment,
id_afiliado int not null,
id_colaborador int not null,
id_eps int not null,
nombre_razonsocial varchar(50) not null,
numero_nit int unique not null,
fecha_radicacion date not null,
fecha_aprobacion date not null,
tipo_novedad varchar(100) not null,
constraint fk_afiliados_formularios
foreign key (id_afiliado)
references afiliados(id_afiliado)
on delete cascade
on update cascade,
constraint fk_colaborador_formularios
foreign key (id_colaborador)
references colaborador(id_colaborador)
on delete cascade
on update cascade,
constraint fk_eps_formularios
foreign key (id_eps)
references eps(id_eps)
on delete cascade
on update cascade
);

create table afiliacion
(
id_afiliacion int primary key not null auto_increment,
id_colaborador int not null,
id_formulario int not null,
id_afiliado int not null,
fecha_afiliacion date not null,
constraint fk_colaborador_afiliacion
foreign key (id_colaborador)
references colaborador(id_colaborador)
on delete cascade
on update cascade,
constraint fk_afiliado_afiliacion
foreign key (id_afiliado)
references afiliados(id_afiliado)
on delete cascade
on update cascade,
constraint fk_formulario_afiliacion
foreign key (id_formulario)
references formularios(id_formulario)
on delete cascade
on update cascade
);

create table comision 
(
id_comision int auto_increment primary key not null,
fecha_comision date not null,
id_colaborador int not null,
id_afiliacion int not null,
descripcion varchar(200),
constraint fk_colaborador_comision
foreign key (id_colaborador)
references colaborador(id_colaborador)
on delete cascade
on update cascade,
constraint fk_afiliacion_comision
foreign key (id_afiliacion)
references afiliacion(id_afiliacion)
on delete cascade
on update cascade
);

create table tipo_informe
(
id_tipo_informe int not null primary key auto_increment,
nombre varchar(30) not null
);

create table informe 
(
id_informe int not null primary key auto_increment,
id_tipo_informe int not null,
id_comision int not null,
fecha_comision date not null,
descripcion varchar(30),
observaciones varchar(200),
constraint fk_tipoinf_informe
foreign key (id_tipo_informe)
references tipo_informe(id_tipo_informe)
on delete cascade
on update cascade,
constraint fk_comision_informe
foreign key (id_comision)
references comision(id_comision)
on delete cascade
on update cascade
);


create table expedientes
(
id_expediente int not null primary key auto_increment,
fecha_expediente date not null,
id_informe int not null,
descripcion varchar(30),
observaciones varchar(250),
constraint fk_informe_expedientes
foreign key (id_informe)
references informe(id_informe)
);

show tables;

show tables like 'expedientes';

describe expedientes;

alter table expediente add column nombre varchar(100);

alter table expediente drop column nombre;

drop database LION_GRUOP_SYSTEM;

drop table tipo_informe;

-- lenguaje de manipulacion de datos DML --

insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('pepe', 'lopez', 21/12/2021,'cedula', 1000213213);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('jose', 'alvarez', 21/12/2021,'pasaporte', 1596487452);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('juan', 'benitez', 21/12/2021,'tarjeta de identidad', 235612445);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('andres', 'castillo', 21/12/2021,'pasaporte', 963369885);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('david', 'castro', 21/12/2021,'cedula', 159945885);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('jefferson', 'contreras', 21/12/2021,'cedula', 456685963);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('wilson', 'garzon', 21/12/2021,'pasaporte', 111125632);
insert into beneficiarios (nombre, apellidos, fecha_ingreso, tipo_documento, n_documento) VALUES ('pedro', 'diaz', 21/12/2021,'cedula', 696985447);

insert into afiliados (nombres, apellidos, nombre_empresa, nit_empresa, tipo_documento, n_documento, correo, id_beneficiario) values ('daniel', 'galindo', 'cosmeticos s.a', 123123, 'cedula', 1000202202, 'daniel@gmail.com',1);
insert into afiliados (nombres, apellidos, nombre_empresa, nit_empresa, tipo_documento, n_documento, correo, id_beneficiario) values ('rodolfo', 'gutierrez', 'drogas s.a', 456456, 'cedula', 1111222333, 'rodolfo@gmail.com',2);



SET SQL_SAFE_UPDATES = 0;

update beneficiarios set tipo_documento ='pasaporte' where nombre = 'pepe';
update beneficiarios set n_documento ='1000256233' where nombre = 'jose';
update beneficiarios set apellidos ='benitez' where nombre = 'juan';
update beneficiarios set nombre ='carlos' where nombre = 'andres';
update beneficiarios set tipo_documento ='cedula' where nombre = 'david';
update beneficiarios set tipo_documento ='pasaporte' where nombre = 'jefferson';
update beneficiarios set apellidos ='rodriguez' where nombre = 'wilson';
update beneficiarios set tipo_documento ='pasaporte' where nombre = 'pedro';

delete from beneficiarios WHERE nombre = 'pepe';
delete from beneficiarios WHERE tipo_documento = 'pasaporte';
delete from beneficiarios WHERE apellidos = 'benitez';
delete from beneficiarios WHERE n_documento ='1000256233';

select * from beneficiarios;
select nombre from beneficiarios;
select tipo_documento from beneficiarios where tipo_documento = 'pasaporte';

select *
from afiliados A
join beneficiarios B
on A.id_beneficiario = B.id_beneficiario






















