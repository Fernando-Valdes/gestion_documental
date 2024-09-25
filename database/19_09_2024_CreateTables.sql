SET NAMES utf8mb4;
SET COLLATION_CONNECTION = 'utf8mb4_spanish2_ci';


CREATE TABLE cat_usuario
(
    enlace INT,
    prefijo VARCHAR(10) NULL,
    nombre VARCHAR(250) NOT NULL,
    paterno VARCHAR(250) NOT NULL,
    materno VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    puesto_usuario VARCHAR(250) NOT NULL,
    fk_organo INT DEFAULT 0,
    activo_usuario INT DEFAULT 1,
    PRIMARY KEY (enlace)
);

CREATE TABLE cat_rol 
(
    id_rol INT AUTO_INCREMENT,
    nombre_rol VARCHAR(250),
    nombre_corto_rol VARCHAR(250),
    descripcion_rol VARCHAR(500),
    PRIMARY KEY (id_rol)
);

CREATE TABLE cat_permiso
(
    id_permiso INT AUTO_INCREMENT,
    nombre_permiso VARCHAR(250),
    descripcion_permiso VARCHAR(500),
    icon_permiso VARCHAR(100),
    href_permiso VARCHAR(250),
    PRIMARY KEY (id_permiso)
);

CREATE TABLE cat_permiso_rol
(
    fk_permiso INT,
    fk_rol INT,
    FOREIGN key (fk_permiso) REFERENCES cat_permiso(id_permiso),
    FOREIGN KEY (fk_rol) REFERENCES cat_rol(id_rol)
);

CREATE TABLE cat_rol_usuario
(
    id_rol_usuario INT AUTO_INCREMENT,
    fk_enlace INT,
    fk_rol_usuario INT,
    PRIMARY key (id_rol_usuario),
    FOREIGN KEY (fk_enlace) REFERENCES cat_usuario(enlace),
    FOREIGN KEY (fk_rol_usuario) REFERENCES cat_rol(id_rol)
);

CREATE TABLE cat_fondo
(
    id_fondo INT AUTO_INCREMENT,
    logo LONGBLOB, 
    fondo VARCHAR(250) NOT NULL,
    clave_fondo VARCHAR(100) NOT NULL,
    fk_user_presidencia INT,
    fk_user_uaa INT,
    fk_user_coordinacion_archivo INT,
    activo_fondo INT DEFAULT 1,
    PRIMARY KEY (id_fondo),
    FOREIGN KEY (fk_user_presidencia) REFERENCES cat_usuario(enlace),
    FOREIGN KEY (fk_user_uaa) REFERENCES cat_usuario(enlace),
    FOREIGN KEY (fk_user_coordinacion_archivo) REFERENCES cat_usuario(enlace),
);

CREATE TABLE cat_subfondo
(
    id_subfondo INT AUTO_INCREMENT,
    clave_subfondo VARCHAR(50),
    subfondo VARCHAR(250) NOT NULL,
    activo_subfondo INT DEFAULT 1,
    fk_fondo INT,
    PRIMARY KEY (id_subfondo),
    FOREIGN KEY (fk_fondo) REFERENCES cat_fondo(id_fondo)
);

CREATE TABLE cat_organo_generador
(
    id_organo INT AUTO_INCREMENT,
    clave_organo VARCHAR(100) NOT NULL,
    organo_generador VARCHAR(250) NOT NULL,
    seccion VARCHAR(100) NOT NULL,
    activo_organo INT DEFAULT 1,
    fk_user_organo_generador INT,
    fk_user_responsable_archivo INT,
    fk_subfondo INT,
    PRIMARY KEY (id_organo),
    FOREIGN KEY (fk_user_organo_generador) REFERENCES cat_usuario(enlace),
    FOREIGN KEY (fk_user_responsable_archivo) REFERENCES cat_usuario(enlace),
    FOREIGN KEY (fk_subfondo) REFERENCES cat_subfondo(id_subfondo)
);

CREATE TABLE cat_valor_documental
(
    id_valor INT AUTO_INCREMENT,
    valor VARCHAR(100),
    activo_valor INT DEFAULT 1,
    PRIMARY KEY (id_valor)
);

CREATE TABLE cat_serie
(
    id_serie INT AUTO_INCREMENT,
    clave_serie VARCHAR(250) NOT NULL,
    descripcion_serie VARCHAR(250) NOT NULL,
    funcion_segenera_serie VARCHAR(250) NOT NULL,
    organo_generador_recepcion_serie VARCHAR(250) NOT NULL,
    fecha_registro_serie DATETIME DEFAULT CURRENT_TIMESTAMP,
    year_incio_serie INT NOT NULL,
    year_cierre_serie INT NULL,
    palabra_clave_serie VARCHAR(250) NOT NULL,
    observaciones_serie TEXT NULL,
    topologia_serie VARCHAR(250) NOT NULL,
    soporte_serie VARCHAR(250) NOT NULL,
    vigencia_serie INT NOT NULL,
    tiene_valor_serie INT NOT NULL,
    conservacion_serie INT NOT NULL,
    eliminacion_serie INT NOT NULL,
    fk_organo_genera INT,
    fk_valor_serie INT,
    fk_enlace_genera_serie INT,
    PRIMARY KEY (id_serie),
    FOREIGN KEY (fk_organo_genera) REFERENCES cat_organo_generador(id_organo),
    FOREIGN key (fk_valor_serie) REFERENCES cat_valor_documental(id_valor),
    FOREIGN key (fk_enlace_genera_serie) REFERENCES cat_usuario(enlace)
);

CREATE TABLE cat_subserie
(
    id_subserie INT AUTO_INCREMENT,
    clave_subserie VARCHAR(250) NOT NULL,
    descripcion_subserie VARCHAR(250) NOT NULL,
    funcion_segenera_subserie VARCHAR(250) NOT NULL,
    organo_generador_recepcion_subserie VARCHAR(250) NOT NULL,
    fecha_registro_subserie DATETIME DEFAULT CURRENT_TIMESTAMP,
    year_incio_subserie INT NOT NULL,
    year_cierre_subserie INT NULL,
    palabra_clave_subserie VARCHAR(250) NOT NULL,
    observaciones_subserie TEXT NULL,
    topologia_subserie VARCHAR(250) NOT NULL,
    soporte_subserie VARCHAR(250) NOT NULL,
    vigencia_subserie INT NOT NULL,
    tiene_valor_subserie INT NOT NULL,
    conservacion_subserie INT NOT NULL,
    eliminacion_subserie INT NOT NULL,
    fk_valor_subserie INT,
    fk_serie INT,
    fk_enlace_genera_subserie INT,
    PRIMARY KEY (id_subserie),
    FOREIGN key (fk_valor_subserie) REFERENCES cat_valor_documental(id_valor),
    FOREIGN key (fk_serie) REFERENCES cat_serie(id_serie),
    FOREIGN key (fk_enlace_genera_subserie) REFERENCES cat_usuario(enlace)
);


INSERT INTO cat_permiso
    (nombre_permiso,descripcion_permiso,icon_permiso,href_permiso) 
VALUES 
    ('Inicio', 'Panel Inicial del Sistema','glyphicon glyphicon-home','../Home/home.php'),
    ('Documentos Recibidos', 'Administración de los documentos recibidos','glyphicon glyphicon-folder-open',''),
    ('Documentos Producidos','Administración de los documentos producidos','glyphicon glyphicon-file',''),
    ('Clasificación archivistica', 'Cuadro de clasificación archivistica del área','glyphicon glyphicon-list-alt','../Clasificacion_archivistica/cuadro_clasificacion.php'),
    ('Órgano generador', 'Administración de los órganos generadores de información','glyphicon glyphicon-briefcase',''),
    ('Catálogos', 'Administración de los catálogos existentes','glyphicon glyphicon-list',''),
    ('Usuarios', 'Administración de los usuarios del sistema','glyphicon glyphicon-user',''),
    ('Configuración', 'Configuracion del sistema','glyphicon glyphicon-cog','');


INSERT INTo cat_rol
    (nombre_rol, nombre_corto_rol, descripcion_rol)
VALUES
    ('Administrador', 'admin', 'Administrador del sistema (Área de Informática)'),
    ('Usuario', 'user', 'Usuario general para el uso del sistema'),
    ('Coordinacion de archivos', 'archivos', 'Área coordinadora de archivos');


INSERT INTO cat_permiso_rol
    (fk_permiso,fk_rol)
VALUES
    (1,1),
    (1,2),
    (1,3),
    (2,1),
    (2,2),
    (2,3),
    (3,1),
    (3,2),
    (3,3),
    (4,1),
    (4,2),
    (4,3),
    (5,1),
    (5,3),
    (6,1),
    (6,3),
    (7,1),
    (7,3),
    (8,1);

INSERT INTO cat_usuario
    (enlace,prefijo,nombre,paterno,materno,email,puesto_usuario)
VALUES
    (1,'DRA','SUSANA','SARMIENTO','LOPEZ','susana.sarmiento@hotmail.com','MAGISTRADA PRESIDENTA'),
    (101,'L.C.P.','OSCAR MARIO','ORANTES','COUTIÑO','oscarmorantes10@hotmail.com','JEFE DE LA UNIDAD DE APOYO ADMINISTRATIVO'),
    (43,'L.A.E.','JOSE EUSTAQUIO','GOMEZ','TRUJILLO','jgomezovcpalenque@gmail.com','JEFE DEL AREA DE FINANCIEROS'),
    (118,'L.A.E.','MARIA DEL ROSARIO','AVENDAÑO','PEREZ','marosaven@hotmail.com','JEFA DEL AREA DE RECURSOS MATERIALES Y SERVICIOS GENERALES'),
    (99,'L.D.','JOSUE','CASTILLO','MELCHOR','joscasmel@gmail.com','JEFE DEL AREA DE RECURSOS HUMANOS'),
    (51,'I.S.C.','LUIS ENRIQUE','ALVAREZ','GONZALEZ','GONZALEZ','JEFE DEL AREA DE INFORMATICA'),
    (46,'DR.','FERNANDO','CASTELLANOS','COUTIÑO','tribunaldejusticiachiapas@gmail.com','JEFE DEL AREA DE PLANEACION'),
    (85,'L.D.','ALEJANDRO','GONZALEZ','RUIZ','ale.asistenciajuridica@gmail.com','JEFE DE LA UNIDAD DE TRANSPARENCIA'),
    (48,'L.D.','MARCO ANTONIO','SARMIENTO','GALLEGOS','sargama1@gmail.com','JEFE DEL AREA DE CONTRALORIA'),
    (128,'L.C.C.','ANGEL GABRIEL','COBAXIN','RAMOS','acobax@gmail.com','JEFE DEL AREA DE COMUNICACION SOCIAL'),
    (126,'MTRO.','OSCAR EDUARDO','TREJO','CRUZ','otrejo2112@gmail.com','JEFE DEL AREA DE DEFENSORIA DE OFICIO'),
    (74,'L.D.','FABIOLA','SIMUTA','SANDOVAL','fabi_04@hotmail.com','JEFA DEL AREA DE COORDINADORA DE ARCHIVOS'),
    (101,'L.C.P.','OSCAR MARIO','ORANTES','COUTIÑO','oscarmorantes10@hotmail.com','JEFE DE LA UNIDAD DE APOYO ADMINISTRATIVO'),
    (30,'L.D.','EUGENIA CANDELARIA','MORENO','CASTILLO','eugenia.castillo.ta@gmail.com','PRESIDENTA COMITÉ DE IGUALDAD Y DERECHOS HUMANOS'),
    (72,'MTRA.','MONICA DE JESUS','TREJO','VELAZQUEZ','acinom2009@live.com.mx','PRESIDENTA COMITÉ DE ÉTICA Y CONDUCTA'),
    (1,'DRA','SUSANA','SARMIENTO','LOPEZ','susana.sarmiento@hotmail.com','MAGISTRADA PRESIDENTA'),
    (82,'DR.','VICTOR MARCELO','RUIZ','REYNA','vruiz1974@gmail.com','PRESIDENTE SALA DE REVISIÓN'),
    (78,'L.D.','LISANDRO ARTURO','CERVANTES','GONZALEZ','lisandrocervantes27@gmail.com','JUEZ JUZGADO DE JURISDICCIÓN ADMINISTRATIVA'),
    (80,'MTRO.','ELMAR MARIO','GUIRAO','MALDONADO','andariego38@hotmail.com','JUEZ JUZGADO ESPECIALIZADO EN RESPONSABILIDAD ADMINISTRATIVA');

INSERT INTO cat_fondo
    (fondo,clave_fondo,fk_user_presidencia,fk_user_uaa,fk_user_coordinacion_archivo)
VALUES 
    ('TRIBUNAL ADMINISTRATIVO DEL PODER JUDICIAL DEL ESTADO DE CHIAPAS','TAPJE',1,101,74);

INSERT INTO cat_subfondo
    (clave_subfondo,subfondo,fk_fondo)
VALUES
    ('01','PLENO DEL TRIBUNAL ADMINISTRATIVO', 1),
    ('02','ÓRGANOS JURISDICCIONALES', 1);

INSERT INTO cat_organo_generador
    (clave_organo,organo_generador,seccion,fk_user_organo_generador,fk_user_responsable_archivo, fk_subfondo)
VALUES 
    ('01','PRESIDENCIA DEL PLENO','',1,,)
    ('02','UNIDAD DE APOYO ADMINISTRATIVO','',,,)
    ('03','ÁREA DE RECURSOS FINANCIEROS','',,,)
    ('04','ÁREA DE RECURSOS MATERIALES Y SERVICIOS GENERALES','',,,)
    ('05','ÁREA DE RECURSOS HUMANOS','',,,)
    ('06','ÁREA DE INFORMÁTICA','',,,)
    ('07','ÁREA DE PLANEACIÓN','',,,)
    ('08','UNIDAD DE TRANSPARENCIA','',,,)
    ('09','CONTRALORÍA','',,,)
    ('10','ÁREA DE COMUNICACIÓN SOCIAL','',,,)
    ('11','ÁREA DE DEFENSORÍA DE OFICIO','',,,)
    ('12','ÁREA COORDINADORA DE ARCHIVOS','',,,)
    ('13','FONDO AUXILIAR','',,,)
    ('14','COMITÉ DE IGUALDAD Y DERECHOS HUMANOS','',,,)
    ('15','COMITÉ DE ÉTICA Y CONDUCTA','',,,)
    ('16','COMITÉ DEL VOLUNTARIADO DE CORAZÓN','',,,)
    ('01','SALA DE REVISIÓN','',,,)
    ('02','JUZGADO DE JURISDICCIÓN ADMINISTRATIVA','',,,)
    ('03','JUZGADO ESPECIALIZADO EN RESPONSABILIDAD ADMINISTRATIVA','',,,)



