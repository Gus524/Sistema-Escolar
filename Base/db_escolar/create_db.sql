CREATE DATABASE db_escolar;
USE db_escolar;

CREATE TABLE Institucion (
	id_inst				INT PRIMARY KEY AUTO_INCREMENT,
    nom_inst			VARCHAR(128),
    abreviatura			VARCHAR(20),
    UNIQUE (nom_inst),
    UNIQUE (abreviatura)
);

CREATE TABLE Carrera (
    abr_carr			CHAR(1) PRIMARY KEY,
    desc_carr			VARCHAR(64) NOT NULL,
    no_sem				INT,
    -- max_semestres		INT,
    id_inst				INT,
    FOREIGN KEY (id_inst) REFERENCES Institucion(id_inst)
);

CREATE TABLE Plan_Estudios (
    id_plan 			INT AUTO_INCREMENT PRIMARY KEY,
    desc_plan	 		VARCHAR(64) NOT NULL,
    no_plan				NUMERIC(3), -- 20, 21, etc
    abr_carr			CHAR(1) NOT NULL,
    cred_total			INT NOT NULL,
    FOREIGN KEY (abr_carr) REFERENCES Carrera(abr_carr)
);

CREATE TABLE Edificio (
    id_edificio 		INT AUTO_INCREMENT PRIMARY KEY,
    desc_edificio 		VARCHAR(64) NOT NULL,
    abr_edificio		CHAR(3),
    id_inst				INT NOT NULL,
    FOREIGN KEY (id_inst) REFERENCES Institucion(id_inst)
);

CREATE TABLE Academia (
    id_academia 		INT AUTO_INCREMENT PRIMARY KEY,
    nom_academia 		VARCHAR(64) NOT NULL,
    id_edificio			INT NOT NULL,
    FOREIGN KEY (id_edificio) REFERENCES Edificio(id_edificio)
);

CREATE TABLE Materia (
    id_materia 			INT AUTO_INCREMENT PRIMARY KEY,
    tipo_materia 		VARCHAR(20) NOT NULL, -- Obligatoria u Optativa
    nom_materia 		VARCHAR(64) NOT NULL,
    horas_teoria		INT,
    horas_prac			INT,
    id_academia			INT,
    FOREIGN KEY (id_academia) REFERENCES Academia (id_academia)
    -- tiempo_auto		 	INT
);

-- Abr Carrera, id_mat, semestre
CREATE TABLE Mapa_Curricular (
	abr_carr			CHAR(1) NOT NULL,
    id_plan	 			INT NOT NULL,
    id_materia 			INT NOT NULL,
    semestre 			INT NOT NULL,
    creditos			INT NOT NULL,
    no_materia			CHAR(2),
    PRIMARY KEY (abr_carr, id_plan, id_materia),
    FOREIGN KEY (id_plan) REFERENCES Plan_Estudios(id_plan),
    FOREIGN KEY (id_materia) REFERENCES Materia(id_materia),
    FOREIGN KEY (abr_carr) REFERENCES Carrera (abr_carr)
);

CREATE TABLE Alumno (
	no_boleta			NUMERIC(10),
    id_plan	 			INT NOT NULL,
    nom_al 				VARCHAR(64) NOT NULL,
    ap_al 				VARCHAR(64) NOT NULL,
    am_al 				VARCHAR(64) NOT NULL,
    curp 				VARCHAR(20),
    email_p_alumno 		VARCHAR(128) NOT NULL,
    email_i_alumno 		VARCHAR(128),
    telf_alumno 		VARCHAR(12),
    telm_alumno 		VARCHAR(12),
    calle				VARCHAR(64),
    no_ext				VARCHAR(10),
    no_int				VARCHAR(10),
    colonia				VARCHAR(64),
    delegacion			VARCHAR(64),
    cp					NUMERIC(5),
    CONSTRAINT no_boleta PRIMARY KEY (no_boleta),
    FOREIGN KEY (id_plan) REFERENCES Plan_Estudios(id_plan)
);

CREATE TABLE Docente (
    rfc 				VARCHAR(13) PRIMARY KEY,
    id_academia 		INT NOT NULL,
    nom_doc 			VARCHAR(64) NOT NULL,
    ap_doc 				VARCHAR(64) NOT NULL,
    am_doc	 			VARCHAR(64) NOT NULL,
    email_p_doc	 		VARCHAR(128),
    email_i_doc 		VARCHAR(128),
    tel_doc 			VARCHAR(10),
    calle				VARCHAR(64),
    no_ext				VARCHAR(10),
    no_int				VARCHAR(10),
    colonia				VARCHAR(64),
    delegacion			VARCHAR(64),
    cp					NUMERIC(5),
    FOREIGN KEY (id_academia) REFERENCES Academia(id_academia)
);

CREATE TABLE Periodo_Escolar (
    id_periodo 			INT AUTO_INCREMENT PRIMARY KEY,
    desc_periodo 		VARCHAR(4) NOT NULL  -- Ej: 24/1
);

CREATE TABLE Grupo(
	semestre 			INT NOT NULL,
    abr_carr			CHAR(1),
    turno 				CHAR(1),
    no_grupo 			INT NOT NULL,
    id_periodo 			INT NOT NULL,
    PRIMARY KEY (semestre, abr_carr, turno, no_grupo, id_periodo),
    CHECK (turno IN('M', 'V')),
    FOREIGN KEY (abr_carr) REFERENCES Carrera(abr_carr),
    FOREIGN KEY (id_periodo) REFERENCES Periodo_Escolar(id_periodo)
);

CREATE TABLE Grupo_Horario (
	semestre 			INT NOT NULL,
    abr_carr			CHAR(1),
    turno 				CHAR(1),
    no_grupo 			INT NOT NULL,
    id_periodo 			INT NOT NULL,
    id_materia 			INT NOT NULL,
    cupo				INT,
    disponibles			INT DEFAULT 40,
    rfc					VARCHAR(13),
	lun_i 				TIME,
    lun_f				TIME,
    lun_sal				VARCHAR(10),
    mar_i 				TIME,
    mar_f				TIME,
    mar_sal				VARCHAR(10),
    mie_i 				TIME,
    mie_f				TIME,
    mie_sal				VARCHAR(10),
    jue_i 				TIME,
    jue_f				TIME,
    jue_sal				VARCHAR(10),
    vie_i 				TIME,
    vie_f				TIME,
    vie_sal				VARCHAR(10),
    PRIMARY KEY (semestre, abr_carr, turno, no_grupo, id_periodo, id_materia, rfc),
    FOREIGN KEY (semestre, abr_carr, turno, no_grupo, id_periodo) 
        REFERENCES Grupo (semestre, abr_carr, turno, no_grupo, id_periodo),
    FOREIGN KEY (id_materia) REFERENCES Materia(id_materia),
    FOREIGN KEY (rfc) REFERENCES Docente(rfc)
);

CREATE TABLE Inscripcion (
    no_boleta 			NUMERIC(10) NOT NULL,
    id_periodo 			INT NOT NULL,
    fecha_inscripcion 	DATE NOT NULL,
    PRIMARY KEY (no_boleta, id_periodo),
    FOREIGN KEY (no_boleta) REFERENCES Alumno(no_boleta),
    FOREIGN KEY (id_periodo) REFERENCES Periodo_Escolar(id_periodo)
);

CREATE TABLE Inscripcion_Detalle (
    no_boleta			NUMERIC(10),
    semestre 			INT NOT NULL,
    abr_carr			CHAR(1),
    turno 				CHAR(1),
    no_grupo 			INT NOT NULL,
    id_periodo 			INT NOT NULL,
    id_materia 			INT NOT NULL,
    rfc		 			VARCHAR(13),
    cal_parcial_1 		INT,
    cal_parcial_2 		INT,
    cal_parcial_3 		INT,
	cal_extra			INT, 
    cal_final 			INT,
    FOREIGN KEY (no_boleta, id_periodo)
		REFERENCES Inscripcion (no_boleta, id_periodo),
    FOREIGN KEY (semestre, abr_carr, turno, no_grupo, id_periodo, id_materia, rfc)
        REFERENCES Grupo_Horario (semestre, abr_carr, turno, no_grupo, id_periodo, id_materia, rfc)
);

CREATE TABLE Historial_Academico (
	id_historial		INT PRIMARY KEY AUTO_INCREMENT,
    no_boleta			NUMERIC (10) NOT NULL,
    promedio			FLOAT DEFAULT 0.0,
    FOREIGN KEY (no_boleta) REFERENCES Alumno (no_boleta)
);

CREATE TABLE Historial_Detalle (
	id_historial		INT NOT NULL,
    id_plan				INT NOT NULL,
    semestre			INT NOT NULL,
    id_materia			INT NOT NULL,
    calificacion		INT NOT NULL,
    id_periodo			INT NOT NULL,
    forma_eval			VARCHAR(3) CHECK(forma_eval IN('ORD', 'REC', 'EXT', 'ETS', 'EQV')),
    FOREIGN KEY (id_historial) REFERENCES Historial_Academico(id_historial),
    FOREIGN KEY (id_plan) REFERENCES Plan_Estudios(id_plan),
    FOREIGN KEY (id_periodo) REFERENCES Periodo_Escolar(id_periodo),
    FOREIGN KEY (id_materia) REFERENCES Materia(id_materia)
);

CREATE TABLE Estado_General (
	no_boleta			NUMERIC (10) NOT NULL,
    id_materia			INT NOT NULL,
    estado				VARCHAR(10) CHECK (estado IN ('REPROBADA', 'NO CURSADA', 'DESFASADA')),
    FOREIGN KEY (no_boleta) REFERENCES Alumno (no_boleta),
    FOREIGN KEY (id_materia) REFERENCES Materia (id_materia)
);

CREATE TABLE Trayectoria_Alumno (
	no_boleta			NUMERIC(10),
    per_cur				INT DEFAULT 0,
    per_dis				INT,
    cred_per			FLOAT,
    cred_fal			FLOAT,
    cred_obt			FLOAT,
    FOREIGN KEY (no_boleta) REFERENCES Alumno (no_boleta)
);

