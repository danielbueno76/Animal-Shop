create database ldst004;

use ldst004;

create table usuarios
(
	login char(30) not null primary key,
	password char(30) not null,
	privilegio int unsigned not null,
	nombre char(30) not null,
	apellidos char(60) not null,
	email char(60),
	telefono char(20),
	direccion char(100) not null,
	ciudad char(30) not null
);

create table pedidos
(
	id_pedido int unsigned not null auto_increment primary key,
	login char(30) not null,
	coste_total float(6,2),
	fecha datetime not null
);

create table animales
(
	id_animales int unsigned not null auto_increment primary key,
	descripcion char(60) not null,
	tipo_animal char(30) not null,
	tipo_producto char(30) not null,
	imagen_ruta char(100) not null,
	limite_producto int unsigned not null,
	precio float(5,2) not null
);

create table pedido_animales
(
	id_pedido int unsigned not null,
	id_animales int unsigned not null,
	cantidad int unsigned not null,
	
	primary key (id_pedido, id_animales)
);