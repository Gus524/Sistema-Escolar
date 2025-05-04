USE db_escolar;

DELIMITER //

CREATE TRIGGER add_historial_alumno
AFTER INSERT ON Historial_Academico
FOR EACH ROW
BEGIN
	DECLARE carrera CHAR(1);
    
    SELECT c.abr_carr INTO carrera
    FROM 
		Carrera c
    JOIN
		Plan_Estudios p
    ON 
		p.abr_carr = c.abr_carr
    WHERE 
		p.id_plan = NEW.id_plan;
    
	CALL InsertEstadoAlumno(NEW.no_boleta, NEW.id_plan, carrera);
    CALL InsertTrayectoriaAlumno(NEW.no_boleta, NEW.id_plan, carrera);

END //

DELIMITER ;

DELIMITER //

CREATE TRIGGER check_inscripcion_alumno
BEFORE INSERT ON Inscripcion_Detalle
FOR EACH ROW
BEGIN
	-- Variable para almacenar el cupo
	DECLARE cupo_disponible INT;
    
    SELECT disponibles INTO cupo_disponible
		FROM Grupo_Horario
	WHERE 
		(id_periodo, abr_carr, id_plan, semestre, turno, no_grupo, no_materia) =
        (NEW.id_periodo, NEW.abr_carr, NEW.id_plan, NEW.semestre, NEW.turno, NEW.no_grupo, NEW.no_materia);
	-- Comprobar cupo disponible mayor a 0
    IF cupo_disponible <= 0 THEN
		-- Lanza un error para detener el insert y detiene la transaccion
        SIGNAL SQLSTATE '45000'
		SET MESSAGE_TEXT = 'No hay cupo disponible para el grupo seleccionado.';
	END IF;
    
    -- Si el cupo es suficiente se reduce el cupo disponible y se aumenta la cantidad de inscritos
    UPDATE Grupo_Horario
    SET disponibles = disponibles - 1, inscritos = inscritos + 1
    WHERE 
		(id_periodo, abr_carr, id_plan, semestre, turno, no_grupo, no_materia) =
        (NEW.id_periodo, NEW.abr_carr, NEW.id_plan, NEW.semestre, NEW.turno, NEW.no_grupo, NEW.no_materia);
END //

DELIMITER ;

DELIMITER //

CREATE TRIGGER change_estado_inscripcion
AFTER INSERT ON Inscripcion_Detalle
FOR EACH ROW
BEGIN
    -- Se actualiza el estado de la materia cuando un alumno se inscribe
	UPDATE Estado_General
    SET estado = 'EN CURSO'
    WHERE
		(id_plan, abr_carr, semestre, no_materia) =
        (NEW.id_plan, NEW.abr_carr, NEW.semestre, NEW.no_materia);
END //

DELIMITER ;

DELIMITER //

CREATE TRIGGER change_cupo_grupo_horario
AFTER DELETE ON Inscripcion_Detalle
FOR EACH ROW
BEGIN
	-- Se actualiza el cupo disponible de acuerdo al Grupo que se acaba de eliminar el registro
	UPDATE Grupo_Horario
    SET disponibles = disponibles + 1, inscritos = inscritos - 1
    WHERE
		(id_periodo, abr_carr, id_plan, semestre, turno, no_grupo, no_materia) =
        (OLD.id_periodo, OLD.abr_carr, OLD.id_plan, OLD.semestre, OLD.turno, OLD.no_grupo, OLD.no_materia);
        
END //

DELIMITER ;

DELIMITER //

CREATE TRIGGER update_historial_alumno
AFTER INSERT ON Historial_Detalle
FOR EACH ROW
BEGIN
	-- Actualiza el semestre mas alto cursado por el alumno
	IF NEW.semestre > (SELECT ultimo_semestre 
    FROM Historial_Academico 
		WHERE (no_boleta, id_plan) = (NEW.no_boleta, NEW.id_plan))
	THEN
		UPDATE Historial_Academico SET ultimo_semestre = NEW.semestre
	WHERE (no_boleta, id_plan) = (NEW.no_boleta, NEW.id_plan);
    END IF;
    
    -- Actualiza el promedio general del alumno
	UPDATE Historial_Academico SET 
    promedio = (SELECT AVG(calificacion) 
    FROM Historial_Detalle 
		WHERE (no_boleta, id_plan) = (NEW.no_boleta, NEW.id_plan))
    WHERE (no_boleta, id_plan) = (NEW.no_boleta, NEW.id_plan);
END //

DELIMITER  ;

DELIMITER //

CREATE TRIGGER check_estado_materia
AFTER UPDATE ON Historial_Detalle
FOR EACH ROW
BEGIN
    -- Actualiza el promedio general del alumno
	UPDATE Historial_Academico SET 
    promedio = (SELECT AVG(calificacion) 
    FROM Historial_Detalle 
		WHERE (no_boleta, id_plan) = (NEW.no_boleta, NEW.id_plan))
    WHERE (no_boleta, id_plan) = (NEW.no_boleta, NEW.id_plan);
END //

DELIMITER ;

-- DELIMITER //
-- CREATE TRIGGER tr_institucion_insert
-- AFTER INSERT ON Institucion
-- FOR EACH ROW
-- BEGIN
-- 	SET @user_name = SUBSTRING_INDEX(USER(), '@', 1),
-- 		@user_ip = SUBSTRING_INDEX(USER(), '@', -1);
--     INSERT INTO Bitacora_Institucion (operacion, ip_us, name_user, nom_new, abr_new) 
--     VALUES (
--         'INSERT', 
-- 		@user_ip, 
--         @user_name, 
--         NEW.nombre_inst, 
--         NEW.abreviatura
--     );
-- END; //
-- DELIMITER ;
