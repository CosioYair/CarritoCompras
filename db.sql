create database vinateria;

create table usuarios (
id_usuario int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre_completo varchar(100) not null,
correo varchar(100) not null,
password varchar(80) not null,
id_nivel int(11),
empleado int(5) not null,
creacion timestamp default now()
);

create table categoria (
id_categoria int(11) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(100) not null,
creacion timestamp default now()
);

create table pedido (
id_pedido int(11) AUTO_INCREMENT PRIMARY KEY,
id_sucursal int(11) not null,
id_usuario_compra  int(11) not null,
id_usuario_venta  int(11) not null,
descuento int(11),
estatus varchar(50) not null,
creacion timestamp default now()
);

create table pedido2cliente (
id_pedido_cliente int(11) AUTO_INCREMENT PRIMARY KEY,
id_pedido  int(11) not null,
id_producto  int(11) not null,
descuento int(11),
creacion timestamp default now()
);

create table nivel (
id_nivel int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
tipo varchar (100) not null,
creacion timestamp default now()
);


create table productos(
id_producto int (11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre varchar(100) not null,
descripcion varchar (255) not null,
codigo varchar(80) not null,
cantidad int(11) not null,
id_sucursal int(11) not null,
id_categoria int(11) not null,
precio1 int(11) not null,
precio2 int(11) not null,
precio3 int(11) not null,
precio_provedor int(11) not null,
id_provedor int(11) not null,
creacion timestamp default now()
);
create table provedores(
id_provedor int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre varchar(100) not null,
direccion varchar(100) not null,
correo varchar(100) not null,
telefono varchar(20) not null,
creacion timestamp default now()
);

create table sucursal(
id_sucursal int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre varchar(100) not null,
direccion varchar(100) not null,
telefono varchar(20) not null,
creacion timestamp default now()
);
ALTER TABLE pedido ADD fecha_entrega TIMESTAMP default now();
ALTER TABLE pedido2cliente ADD cantidad int(11) not null;
ALTER TABLE pedido2cliente ADD precio_elegido_venta varchar(80) not null;