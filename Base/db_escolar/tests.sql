USE db_escolar;

SELECT * FROM Institucion;

CREATE VIEW getAlumnos AS
SELECT a.*, p.desc_plan, c.desc_carr
	FROM Alumno a 
	JOIN Plan_Estudios p
		ON a.id_plan = p.id_plan
	JOIN Carrera c
		ON c.abr_carr = p.abr_carr;

SELECT CONCAT(d.nom_doc, ' ', d.ap_doc, ' ', d.am_doc) AS nombre,
	   a.nom_academia,
       i.nom_inst
FROM
	Docente d
JOIN
	Academia a 
ON
	d.id_academia = a.id_academia
JOIN
	Edificio e
ON
	e.id_edificio = a.id_edificio
JOIN
	Institucion i 
ON
	e.id_inst = i.id_inst
WHERE
	d.rfc = 'DIR980606M78';

-- Obtener los docentes y a que academia pertenecen
SELECT d.rfc, a.nom_academia, a.id_academia
FROM Docente d
JOIN Academia a
ON d.id_academia = a.id_academia;

-- Obtener materias y sus academias
SELECT CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave, 
		   m.nom_materia, 
           mc.semestre,
           a.id_academia,
           a.nom_academia
	FROM
		Mapa_Curricular mc
	JOIN
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN 
		Plan_Estudios p
	ON
		p.id_plan = mc.id_plan
	JOIN
		Academia a 
	ON
		a.id_academia = m.id_academia
	WHERE
		p.id_plan = 3 AND mc.abr_carr = 'N'
	ORDER BY mc.semestre;

SELECT m_c.semestre, m.id_materia, m.nom_materia, m_c.no_materia
FROM Mapa_Curricular m_c
JOIN Materia m
ON m_c.id_materia = m.id_materia
WHERE semestre = 4 AND m_c.no_materia = '06';

SELECT * FROM getAlumnos;
SELECT * FROM Docente;
SELECT * FROM Grupo;
SELECT * FROM Grupo_Horario;

-- Horarios por semestre
SELECT m.nom_materia,
       g.*  
FROM Grupo_Horario g
JOIN Mapa_Curricular mc
	ON mc.semestre = g.semestre
JOIN Materia m
	ON (m.id_materia = mc.id_materia 
	AND mc.no_materia = g.no_materia)
WHERE (g.id_periodo = 2 AND
       g.abr_carr = 'N' AND
       g.id_plan = 3 AND
       g.semestre = 1)
ORDER BY g.semestre, g.turno, g.no_grupo ASC;

SELECT * FROM Inscripcion_Detalle;

SELECT * FROM Docente_Horario WHERE rfc = 'GVSM900606F90'
ORDER BY semestre;

-- Horario Alumno
SELECT i.no_boleta, 
    CONCAT(g.semestre, g.abr_carr, g.turno, g.semestre, g.no_grupo) AS grupo,
    m.nom_materia,
    CONCAT(d.nom_doc, ' ', d.ap_doc, ' ', d.am_doc) AS nombre,
    CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave,
    CONCAT(lun_i, '-', lun_f) AS lunes,
    CONCAT(mar_i, '-', mar_f) AS martes,
    CONCAT(mie_i, '-', mie_f) AS miercoles,
    CONCAT(jue_i, '-', jue_f) AS jue,
    CONCAT(vie_i, '-', vie_f) AS viernes
FROM Inscripcion_Detalle i
JOIN 
    Grupo_Horario g
ON 
    (g.abr_carr, g.no_materia, g.turno, g.id_periodo, g.semestre, g.no_grupo) = 
    (i.abr_carr, i.no_materia, i.turno, i.id_periodo, i.semestre, i.no_grupo)
JOIN 
    Mapa_Curricular mc
ON 
    mc.semestre = i.semestre
JOIN 
    Materia m
ON 
    (m.id_materia = mc.id_materia AND
    mc.no_materia = i.no_materia)
JOIN
    Docente_Horario dh
ON 
    (g.abr_carr, g.no_materia, g.turno, g.id_periodo, g.semestre, g.no_grupo) = 
    (dh.abr_carr, dh.no_materia, dh.turno, dh.id_periodo, dh.semestre, dh.no_grupo)
JOIN
    Docente d
ON
    d.rfc = dh.rfc
WHERE no_boleta = '2020600407' AND i.id_periodo = 2;

-- Horario Docente
SELECT m.nom_materia,
       d.nom_doc,
       g.*  
FROM Docente d
JOIN Grupo_Horario g
	ON g.rfc = d.rfc
JOIN Mapa_Curricular mc
	ON mc.semestre = g.semestre
JOIN Materia m
	ON (m.id_materia = mc.id_materia 
	AND mc.no_materia = g.no_materia)
WHERE d.rfc = 'DIR980606M78' AND g.id_periodo = 2;

SELECT CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave, 
	   m.nom_materia, 
       m.tipo_materia,
       mc.creditos,
       m.horas_teoria,
       m.horas_prac
FROM
	Mapa_Curricular mc
JOIN
	Materia m
ON
	m.id_materia = mc.id_materia
JOIN 
	Plan_Estudios p
ON
	p.id_plan = mc.id_plan
WHERE
	p.id_plan = 3 AND mc.abr_carr = 'N';
    
SELECT 
	   c.abr_carr,
	   c.desc_carr AS carrera
FROM
	Carrera c
JOIN
	Institucion i
ON
	i.id_inst = c.id_inst
WHERE i.id_inst = 13;

SELECT id_plan,
	   desc_plan
FROM 
	Plan_Estudios p
JOIN
	Carrera c
ON
	c.abr_carr = p.abr_carr
WHERE p.abr_carr = 'A';

-- Inicio de alumno
CALL InicioAlumno (2020600407);
CALL GetDocenteHorario ('LMMR860202B56', 2);
DROP PROCEDURE GetPlanCarr;

SELECT COUNT(*) AS total_registros, 
       COUNT(DISTINCT rfc) AS docentes_unicos
FROM Grupo_Horario
GROUP BY semestre, abr_carr, turno, no_grupo, id_periodo, no_materia
HAVING COUNT(DISTINCT rfc) > 1;

CALL GetMapaCurr(3, 'N');

SELECT * FROM Estado_General;

SELECT c.abr_carr
    FROM 
		Carrera c
    JOIN
		Plan_Estudios p
    ON 
		p.abr_carr = c.abr_carr
    WHERE 
		p.id_plan = 3;
        
SELECT semestre, no_materia
        FROM Mapa_Curricular
        WHERE (abr_carr, id_plan) = ('N', 3);
        
SELECT * FROM Estado_General
WHERE no_boleta = 2020600407;

SELECT nom_materia, estado 
FROM 
	GetEstadoGeneralAlumno
WHERE 
	no_boleta = 2020600407;

SELECT * FROM Carrera;
SELECT * FROM Trayectoria_Alumno;

show grants for 'infoupiicsa'@'%';
