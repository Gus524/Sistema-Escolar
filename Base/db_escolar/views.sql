USE db_escolar;

CREATE VIEW getAlumnos AS
SELECT a.*, p.desc_plan, c.desc_carr
	FROM Alumno a 
	JOIN Plan_Estudios p
		ON a.id_plan = p.id_plan
	JOIN Carrera c
		ON c.abr_carr = p.abr_carr;
        
        
SELECT d.rfc, a.nom_academia
FROM Docente d
JOIN Academia a
ON d.id_academia = a.id_academia;

SELECT m.nom_materia, a.nom_academia
FROM Materia m
JOIN Academia a
ON m.id_academia = a.id_academia;

SELECT m_c.semestre, m.id_materia, m.nom_materia
FROM Mapa_Curricular m_c
JOIN Materia m
ON m_c.id_materia = m.id_materia
WHERE semestre = 5;

SELECT * FROM getAlumnos;
SELECT * FROM Docente;
SELECT * FROM Grupo;
SELECT * FROM Grupo_Horario;

SELECT * FROM Grupo_Horario WHERE semestre=5 AND turno='M' AND id_materia = 28;

SELECT * FROM Inscripcion_Detalle;

SELECT i.no_boleta, g.* FROM Inscripcion_Detalle i
LEFT JOIN Grupo_Horario g
ON i.id_materia = g.id_materia
WHERE no_boleta = '2020600407' AND g.turno = 'M' AND g.id_materia=28 AND g.semestre = 5;