DROP DATABASE cine;
CREATE DATABASE cine;
USE cine;

-- Provincias
CREATE TABLE provincias(id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50));

-- Localidades
CREATE TABLE localidades(id INT AUTO_INCREMENT PRIMARY KEY,
id_provincia INT NOT NULL,
nombre VARCHAR(50) NOT NULL,
CONSTRAINT FOREIGN KEY (id_provincia) REFERENCES provincias(id),
CONSTRAINT UNIQUE (id_provincia,nombre));

-- Administradores
CREATE TABLE administradores (id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(20) UNIQUE,
password VARCHAR(32) UNIQUE,
rango INT);


-- Tabla que contiene los cines, con todos sus datos
CREATE TABLE cines (id INT AUTO_INCREMENT PRIMARY KEY,
id_localidad INT NOT NULL,
nombre VARCHAR(100) NOT NULL,
direccion VARCHAR(100),
telefono VARCHAR(10),
fax VARCHAR(10),
metro VARCHAR(35),
autobuses VARCHAR(35),
web VARCHAR(50),
precio FLOAT,
propietario INT NOT NULL,
dia_espectador ENUM('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'),
CONSTRAINT FOREIGN KEY (id_localidad) REFERENCES localidades(id),
CONSTRAINT FOREIGN KEY (propietario) REFERENCES administradores(id));



-- Tabla de las películas --

CREATE TABLE peliculas (id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(100),
imagen VARCHAR(50),
content MEDIUMBLOB,
size INT,
tipo VARCHAR(35),
descripcion VARCHAR(1024),
genero ENUM('Ciencia Ficción','Terror','Drama','Musical','Dibujos Animados','Adultos'),
duracion INT,
activa INT(1));

-- Tabla con las salas de cada cine
CREATE TABLE salas (id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(20),
x INT,
y INT,
id_cine INT,
CONSTRAINT FOREIGN KEY(id_cine) REFERENCES cines(id));

-- Tabla que contiene las diversas formas de pago
CREATE TABLE formas_de_pago (id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) UNIQUE NOT NULL);

-- Tabla con las formas de pago que acepta cada cine
CREATE TABLE cines_formas_de_pago(id INT AUTO_INCREMENT PRIMARY KEY,
id_cine INT,
id_forma INT,
CONSTRAINT UNIQUE (id_cine,id_forma),
CONSTRAINT FOREIGN KEY(id_cine) REFERENCES cines(id),
CONSTRAINT FOREIGN KEY(id_forma) REFERENCES formas_de_pago(id));
------------------------------------------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------

-- Proyecciones
CREATE TABLE proyecciones (id INT AUTO_INCREMENT PRIMARY KEY,
id_sala INT,
id_pelicula INT,
hora_inicio VARCHAR(6),
fecha_proyeccion date,
CONSTRAINT FOREIGN KEY(id_sala) REFERENCES salas(id),
CONSTRAINT FOREIGN KEY(id_pelicula) REFERENCES peliculas(id));

-- Histórico Proyecciones, igual que las proyecciones pero sin FK
CREATE TABLE historico_proyecciones (id INT AUTO_INCREMENT PRIMARY KEY,
id_sala INT,
id_pelicula INT,
hora_inicio VARCHAR(6),
fecha date);



CREATE TABLE reservas (id INT AUTO_INCREMENT PRIMARY KEY,
id_proyeccion int,
dni varchar(10),
importe int,
id_fp int,
fecha_reserva date,
CONSTRAINT FOREIGN KEY(id_proyeccion) REFERENCES proyecciones(id),
CONSTRAINT FOREIGN KEY(id_fp) REFERENCES formas_de_pago(id));

CREATE TABLE butacas(id INT AUTO_INCREMENT PRIMARY KEY,
id_reserva int,
butaca int,
CONSTRAINT UNIQUE (id_reserva,butaca),
CONSTRAINT FOREIGN KEY(id_reserva) REFERENCES reservas(id));

CREATE TABLE reservas_temporal (id INT AUTO_INCREMENT PRIMARY KEY,
id_proyeccion int,
CONSTRAINT FOREIGN KEY(id_proyeccion) REFERENCES proyecciones(id));

CREATE TABLE butacas_temporal(id INT AUTO_INCREMENT PRIMARY KEY,
id_reserva int,
butaca int,
CONSTRAINT FOREIGN KEY(id_reserva) REFERENCES reservas_temporal(id));


CREATE TABLE historico_reservas (id INT AUTO_INCREMENT PRIMARY KEY,
id_proyeccion int,
butacas int,
dni varchar(10),
fecha_reserva date);