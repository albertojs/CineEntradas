USE cine;


insert into localidades(id_provincia,nombre) values(31,'Alcala de Henares'),(31,'Alcobendas'),(31,'Collado Villalba'),
(31,'Getafe'),(31,'Madrid'),(31,'Majadahonda'),(31,'Tres Cantos');


INSERT INTO administradores (nombre,password,rango) VALUES ('admin','f6fdffe48c908deb0f4c3bd36c032e72',1);
INSERT INTO administradores (nombre,password,rango) VALUES ('kk','kk',2); 


insert into cines(id_localidad,nombre,direccion,telefono,fax,metro,autobuses,web,precio,propietario,dia_espectador) values
(3,'Cines Planetocio','Centro comercial Planetocio','918501111','','','','www.planetocio.es',6.0,2,'Lunes'),
(3,'Cines Estrella','Centro comercial Los Valles','918502222','','','','www.valles.es',6.0,2,'Martes'),
(3,'Cines Albasan','Centro comercial El Canguro','918503333','','','','www.albasan.es',6.0,2,'Miércoles'),
(3,'Cines de Verano','Parque de las Bombas','918504444','','','','www.verano.es',6.0,2,'Jueves'),
(3,'Cines Angeles','Parque de los Belgas','918505555','','','','www.angeles.es',6.0,2,'Viernes'),
(3,'Cines Gran via','Parque Las Cigüeñas','918506666','','','','www.pajaros.es',6.0,2,'Sábado'),
(3,'Cines Planetocio','Centro comercial Planetocio','918507777','','','','planetocio@plane.es',6.0,2,'Domingo'),
(3,'Cines Estrella','Centro comercial Los Valles','918508888','','','','www.valles.es',6.0,2,'Sábado'),
(1,'Cines Albasan','Centro comercial El Canguro','918509999','','','','www.canguro.es',6.0,2,'Viernes'),
(1,'Cines de Verano','Parque de las Bombas','918500000','','','','www.bombas.es',6.0,2,'Jueves'),
(1,'Cines Angeles','Parque de los Belgas','918501234','','','','www.belgas.es',6.0,2,'Miércoles'),
(1,'Cines Gran via','Parque Las Cigüeñas','918504567','','','','www.pajaros.es',6.0,2,'Martes'),
(2,'Cines Planetocio','Centro comercial Planetocio','918501478','','','','planetocio@plane.es',6.0,2,'Lunes'),
(2,'Cines Estrella','Centro comercial Los Valles','918502589','','','','www.valles.es',6.0,2,'Miércoles'),
(4,'Cines Albasan','Centro comercial El Canguro','918503698','','','','www.canguro.es',6.0,2,'Viernes'),
(4,'Cines de Verano','Parque de las Bombas','918506541','','','','www.bombas.es',6.0,2,'Martes'),
(5,'Cines Angeles','Parque de los Belgas','918508563','','','','www.belgas.es',6.0,2,'Jueves'),
(6,'Cines Gran via','Parque Las Cigüeñas','918503657','','','','www.pajaros.es',6.0,2,'Domingo'); 




--Peliculas
INSERT INTO peliculas (titulo,descripcion,genero,duracion,activa) VALUES 
('Volver','Castañete Español','Ciencia Ficción',100,1),
('Torrente','Policiaca Español','Terror',100,1),
('ESDLA III','Frodo muere','Drama',200,1),
('Rocky VI','Boxeador','Musical',100,1),
('Infiltrados','Oscar direccion','Dibujos Animados',160,1),
('Bambi','Clasicazo','Adultos',130,1),
('Eragon','Te vas a dormir','Adultos',120,1);



--Salas
insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,1);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,1);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,1);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,1);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,1);
insert into salas (nombre,x,y,id_cine) values ('Sala6',5,6,1);
insert into salas (nombre,x,y,id_cine) values ('Sala7',5,6,1);
-------------

insert into salas (nombre,x,y,id_cine) values ('Sala1',6,6,2);
insert into salas (nombre,x,y,id_cine) values ('Sala2',6,6,2);
insert into salas (nombre,x,y,id_cine) values ('Sala3',6,6,2);
insert into salas (nombre,x,y,id_cine) values ('Sala4',6,6,2);

insert into salas (nombre,x,y,id_cine) values ('Sala1',4,5,3);
insert into salas (nombre,x,y,id_cine) values ('Sala2',4,5,3);
insert into salas (nombre,x,y,id_cine) values ('Sala3',4,5,3);

insert into salas (nombre,x,y,id_cine) values ('Sala1',3,4,4);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,4,4);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,4,4);
insert into salas (nombre,x,y,id_cine) values ('Sala4',3,4,4);

insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,5);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,5);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,5);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,5);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,5);

insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,6);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,6);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,6);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,6);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,6);

insert into salas (nombre,x,y,id_cine) values ('Sala1',3,5,7);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,5,7);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,5,7);

insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala6',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala7',5,6,8);
insert into salas (nombre,x,y,id_cine) values ('Sala1',3,5,9);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,5,9);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,5,9);

insert into salas (nombre,x,y,id_cine) values ('Sala1',3,5,10);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,5,10);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,5,10);

insert into salas (nombre,x,y,id_cine) values ('Sala1',10,6,11);
insert into salas (nombre,x,y,id_cine) values ('Sala2',10,6,11);
insert into salas (nombre,x,y,id_cine) values ('Sala3',10,6,11);
insert into salas (nombre,x,y,id_cine) values ('Sala4',10,6,11);
insert into salas (nombre,x,y,id_cine) values ('Sala5',10,6,11);

insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,12);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,12);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,12);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,12);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,12);
insert into salas (nombre,x,y,id_cine) values ('Sala6',5,6,12);
insert into salas (nombre,x,y,id_cine) values ('Sala7',5,6,12);

insert into salas (nombre,x,y,id_cine) values ('Sala1',3,4,13);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,4,13);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,4,13);
insert into salas (nombre,x,y,id_cine) values ('Sala4',3,4,13);

insert into salas (nombre,x,y,id_cine) values ('Sala1',3,5,14);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,5,14);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,5,14);

insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,15);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,15);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,15);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,15);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,15);
insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,16);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,16);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,16);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,16);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,16);

insert into salas (nombre,x,y,id_cine) values ('Sala1',3,5,17);
insert into salas (nombre,x,y,id_cine) values ('Sala2',3,5,17);
insert into salas (nombre,x,y,id_cine) values ('Sala3',3,5,17);

insert into salas (nombre,x,y,id_cine) values ('Sala1',5,6,18);
insert into salas (nombre,x,y,id_cine) values ('Sala2',5,6,18);
insert into salas (nombre,x,y,id_cine) values ('Sala3',5,6,18);
insert into salas (nombre,x,y,id_cine) values ('Sala4',5,6,18);
insert into salas (nombre,x,y,id_cine) values ('Sala5',5,6,18);
insert into salas (nombre,x,y,id_cine) values ('Sala6',5,6,18);
insert into salas (nombre,x,y,id_cine) values ('Sala7',5,6,18);


--Proyecciones

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (1,1,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (2,2,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (3,3,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (4,4,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (5,5,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (6,6,'01:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (7,7,'18:15','2007-01-11');
--cine2
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'15:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'18:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'21:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'15:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'18:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'21:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'15:00','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'18:00','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (8,1,'21:00','2007-03-15');
----------------------
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'15:15','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'18:15','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'21:15','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'15:15','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'18:15','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'21:15','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'15:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'18:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (9,3,'21:15','2007-03-15');
----------------------
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'16:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'19:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'01:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'16:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'19:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'01:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'16:00','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'19:00','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (10,5,'01:00','2007-03-15');
----------------------
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'13:15','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'18:15','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'22:00','2007-03-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'13:15','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'18:15','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'22:00','2007-03-14');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'13:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'18:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (11,7,'22:00','2007-03-15');
--cine3
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (12,7,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (13,5,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (14,2,'22:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (15,1,'13:15','2007-02-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (16,2,'18:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (17,3,'18:15','2007-02-17');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (18,7,'18:15','2007-01-19');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (19,1,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (20,3,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (21,5,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (22,7,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (23,2,'20:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (24,1,'01:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (25,3,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (26,5,'21:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (27,7,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (28,2,'21:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (29,7,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (30,5,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (31,2,'18:15','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (32,1,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (33,2,'13:15','2007-02-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (34,3,'18:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (35,4,'18:15','2007-02-17');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (36,5,'18:15','2007-01-19');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (37,6,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (38,7,'20:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (39,7,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (40,5,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (41,2,'20:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (42,7,'01:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (43,5,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (44,2,'21:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (45,1,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (46,3,'21:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (47,5,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (48,7,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (49,2,'18:15','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (50,1,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (51,2,'13:15','2007-02-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (52,3,'18:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (53,4,'18:15','2007-02-17');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (54,5,'18:15','2007-01-19');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (55,6,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (56,7,'20:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (57,1,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (58,2,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (59,3,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (60,7,'01:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (61,7,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (62,5,'21:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (63,2,'18:15','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (64,1,'21:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (65,3,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (66,5,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (67,7,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (68,2,'22:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (69,1,'13:15','2007-02-13');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (70,3,'18:15','2007-03-15');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (71,5,'18:15','2007-02-17');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (72,7,'18:15','2007-01-19');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (73,2,'20:00','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (74,7,'20:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (75,5,'01:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (76,2,'18:15','2007-01-11');

Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (77,1,'21:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (78,2,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (79,3,'21:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (80,4,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (81,5,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (82,6,'18:15','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (83,7,'22:00','2007-01-11');
Insert into proyecciones (id_sala,id_pelicula,hora_inicio,fecha_proyeccion) values (83,1,'22:00','2007-01-11');



-- Formas de pago
INSERT INTO formas_de_pago (nombre) VALUES ('Efectivo');
INSERT INTO formas_de_pago (nombre) VALUES ('Visa');
INSERT INTO formas_de_pago (nombre) VALUES ('Mastercard');
INSERT INTO formas_de_pago (nombre) VALUES ('Paypal');
INSERT INTO formas_de_pago (nombre) VALUES ('MobiPay');


-- Cines - Formas de pago
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (1,1);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (1,2);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (1,3);

INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (2,1);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (2,4);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (2,5);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (2,3);

INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (3,1);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (3,2);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (3,3);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (3,4);
INSERT INTO cines_formas_de_pago (id_cine,id_forma) VALUES (3,5);

INSERT INTO reservas (id_proyeccion,dni,importe,id_fp,fecha_reserva)
	values (8,02285960,6.0,1,'2007-03-13'),
	(9,02285960,6.0,1,'2007-03-13'),
	(11,02285960,6.0,1,'2007-03-13'),
	(10,02285960,6.0,1,'2007-03-13'),
	(8,02285960,6.0,1,'2007-03-13'),
	(9,02285960,6.0,1,'2007-03-13'),
	(10,02285960,6.0,1,'2007-03-13'),
	(8,02285960,6.0,1,'2007-03-13'),
	(9,02285960,6.0,1,'2007-03-13'),
	(10,02285960,6.0,1,'2007-03-13');

INSERT INTO butacas (id_reserva,butaca) values
	(1,0),
	(1,1),
	(1,2),
	(1,3),
	(2,1),
	(2,2),
	(3,1),
	(3,2),
	(4,1),
	(4,2),
	(5,4),
	(5,5),
	(6,1),
	(6,2),
	(7,1),
	(7,2),
	(8,6),
	(8,7),
	(9,1),
	(9,2);
	




























