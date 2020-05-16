create database lab;

create table cliente(

    id_cliente int,
    id_usuario int not null,
    cedula varchar(45),
    nombre varchar(200),
    apellido varchar(200),
    email varchar(200),
    ubicacion varchar(200),
    celular varchar(45),
    primary key(id_cliente)
      );

create table usuarios(

    id_usuario int auto_increment,
    nombre varchar(50),
    apellido varchar(50),
    email varchar(50),
    password text(50),
    fechacaptura date,
    primary key(id_usuario)
      );

create table raza (

    id_raza int auto_increment,
    id_usuario int not null,
    nombreraza varchar(150),
    fechacaptura date,
    primary key(id_raza)
      );

create table toro(

    id_toro int auto_increment,
    id_raza int not null,
    id_propietario int auto_increment,
    id_usuario int
    nombre varchar(50),
    codigo varchar(50),
    estado varchar(1),
    ubicacion varchar(200),
    primary key(id_toro)
     );

create table propietario(

    id_propietario int auto_increment,
    id_usuario int not null,
    cedula varchar(45),
    nombre varchar(200),
    apellido varchar(200),
    celular varchar(45),
    ubicacion varchar(200),
    primary key(id_propietario)
     );

create table pajilla(

    id_pajilla int auto_increment,
    id_toro int,
    id_usurio int not null,
    unidades varchar(45),
    utilizada varchar(45),
    disponible varchar(45),
    cod_muestra varchar(45),
    fecha_muestra date,
    fecha_ext date,
    destino_muestra varchar(200)
        )

