SET NAMES utf8mb4;
SET COLLATION_CONNECTION = 'utf8mb4_spanish2_ci';


CREATE TABLE cat_organo_generador
(
    id_organo INT AUTO_INCREMENT,
    clave_organo VARCHAR(100) NOT NULL,
    organo_generador VARCHAR(250) NOT NULL,
    seccion VARCHAR(100) NOT NULL,
    responsable_organo VARCHAR(250) NOT NULL,
    activo_organo INT DEFAULT 1,
    PRIMARY KEY (id_organo) 
);

CREATE TABLE cat_fondo
(
    id_fondo INT AUTO_INCREMENT,
    fondo VARCHAR(250) NOT NULL,
    clave_fondo VARCHAR(100) NOT NULL,
    nombre_presidente VARCHAR(250) NOT NULL,
    puesto_presidente VARCHAR(250) NOT NULL,
    nombre_uaa VARCHAR(250) NOT NULL,
    puesto_uaa VARCHAR(250) NOT NULL,
    nombre_coordinacion_archivo VARCHAR(250) NOT NULL,
    puesto_coordicacion_archivo VARCHAR(250) NOT NULL,
    activo_fondo INT DEFAULT 1,
    PRIMARY KEY (id_fondo)
);

CREATE TABLE cat_subfondo
(
    id_subfondo INT AUTO_INCREMENT,
    sunfondo VARCHAR(250) NOT NULL,
    activo_subfondo INT DEFAULT 1,
    fk_fondo INT,
    PRIMARY KEY (id_subfondo),
    FOREIGN KEY (fk_fondo) REFERENCES cat_fondo(id_fondo)
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
    enlace_genera_serie INT NOT NULL,
    clave_serie VARCHAR(250) NOT NULL,
    descripcion_serie VARCHAR(250) NOT NULL,
    funcion_segenera_serie VARCHAR(250) NOT NULL,
    organo_generador_recepcion VARCHAR(250) NOT NULL,
    fecha_registro_serie DATETIME DEFAULT CURRENT_TIMESTAMP,
    year_incio INT NOT NULL,
    year_cierre NULL,
    palabra_clave VARCHAR(250) NOT NULL,
    observaciones_serie TEXT NULL,
    topologia_serie VARCHAR(250) NOT NULL,
    soporte_serie VARCHAR(250) NOT NULL,
    vigencia_serie INT NOT NULL,
    tiene_valor_serie INT NOT NULL,
    conservacion_serie INT NOT NULL,
    eliminacion_serie INT NOT NULL,
    responsable_serie VARCHAR(250) NOT NULL,
    fk_organo_genera_serie INT,
    fk_fondo_serie INT,
    fk_valor_serie INT,
    PRIMARY KEY (id_serie),
    FOREIGN KEY (fk_organo_genera_serie) REFERENCES cat_organo_generador(id_organo),
    FOREIGN key (fk_fondo_serie) REFERENCES cat_fondo(id_fondo),
    FOREIGN key (fk_valor_serie) REFERENCES cat_valor_documental(id_valor)
);

CREATE TABLE cat_serie
(
    id_subserie INT AUTO_INCREMENT,
    enlace_genera_subserie INT NOT NULL,
    clave_subserie VARCHAR(250) NOT NULL,
    descripcion_subserie VARCHAR(250) NOT NULL,
    funcion_segenera_subserie VARCHAR(250) NOT NULL,
    organo_generador_recepcion_subserie VARCHAR(250) NOT NULL,
    fecha_registro_subserie DATETIME DEFAULT CURRENT_TIMESTAMP,
    year_incio_subserie INT NOT NULL,
    year_cierre_subserie NULL,
    palabra_clave_subserie VARCHAR(250) NOT NULL,
    observaciones_subserie TEXT NULL,
    topologia_subserie VARCHAR(250) NOT NULL,
    soporte_ssuberie VARCHAR(250) NOT NULL,
    vigencia_subserie INT NOT NULL,
    tiene_valor_subserie INT NOT NULL,
    conservacion_subserie INT NOT NULL,
    eliminacion_subserie INT NOT NULL,
    responsable_subserie VARCHAR(250) NOT NULL,
    fk_organo_genera_ssuberie INT,
    fk_fondo_subserie INT,
    fk_valor_subserie INT,
    PRIMARY KEY (id_serie),
    FOREIGN KEY (fk_organo_genera_serie) REFERENCES cat_organo_generador(id_organo),
    FOREIGN key (fk_fondo_serie) REFERENCES cat_fondo(id_fondo),
    FOREIGN key (fk_valor_serie) REFERENCES cat_valor_documental(id_valor)
);

