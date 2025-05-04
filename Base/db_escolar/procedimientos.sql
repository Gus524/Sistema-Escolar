USE db_escolar;

DELIMITER //

CREATE PROCEDURE InsertEstadoAlumno(
	IN boleta	BIGINT,
    IN plan		INT,
    IN carrera 	CHAR(1)
)
BEGIN 
	DECLARE done INT DEFAULT FALSE;
    DECLARE v_semestre 		INT;
    DECLARE v_no_materia	CHAR (2);
    
    DECLARE cur CURSOR FOR
		SELECT semestre, no_materia
        FROM Mapa_Curricular
        WHERE (abr_carr, id_plan) = (carrera, plan);
        
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
    
    read_loop: LOOP
		FETCH cur INTO v_semestre, v_no_materia;
        IF done THEN
			LEAVE read_loop;
		END IF;
        
        INSERT INTO Estado_General (no_boleta, abr_carr, semestre, id_plan, no_materia)
        VALUES (boleta, carrera, v_semestre, plan, v_no_materia);
	END LOOP;
    
    CLOSE cur;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE InsertTrayectoriaAlumno(
	IN boleta		BIGINT,
    IN plan			INT,
    IN carrera		CHAR(1)
)
BEGIN
	DECLARE done INT DEFAULT FALSE;
    DECLARE v_periodos_per INT;
    DECLARE v_cred_faltantes INT;
    
    DECLARE cur CURSOR FOR
		SELECT cred_total, max_semestres
        FROM Carrera
        WHERE abr_carr = carrera;
	
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
    
    read_loop: LOOP
		FETCH cur INTO v_cred_faltantes, v_periodos_per;
		IF done THEN
			LEAVE read_loop;
		END IF;
	
		INSERT INTO Trayectoria_Alumno (per_disponibles, cred_faltantes, no_boleta, id_plan)
        VALUES (v_periodos_per, v_cred_faltantes, boleta, plan);
	END LOOP;
    
    CLOSE cur;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE InsertFinPeriodo (
	IN 			periodo INT,
    IN			institucion INT
)
BEGIN   
	-- Se obtienen todos la boleta y los detalles de los alumnos que estuvieron inscritos en el periodo escolar
	CREATE TEMPORARY TABLE nuevo AS (
		SELECT 
				id.no_boleta,
				id.id_periodo,
				id.id_plan,
				id.abr_carr,
				id.semestre,
				id.no_materia,
				id.cal_final As calificacion,
				CASE
					WHEN EXISTS (
						SELECT 1
						FROM Inscripcion_Detalle pre
						WHERE (pre.no_boleta, pre.id_plan, pre.semestre, pre.no_materia) =
						(id.no_boleta, id.id_plan, id.semestre, id.no_materia)
						AND id.id_periodo <> pre.id_periodo
						AND id.cal_final > pre.cal_final
					) THEN 'REC'
					WHEN id.cal_extra IS NOT NULL AND ((id.cal_parcial_1 + id.cal_parcial_2 + id.cal_parcial_3)/3 <= 6) THEN 'EXT'
					ELSE 'ORD'
				END AS forma_eval,
				CURDATE() AS fecha_eval 
			FROM
				Inscripcion_Detalle id
			LEFT JOIN
				Historial_Detalle hd
			ON
				(id.no_boleta, id.id_plan, id.no_materia) =
				(hd.no_boleta, hd.id_plan, hd.no_materia)
			WHERE
				id.id_periodo = periodo
	-- se asigna un alias para manejar tanto el insert como el update de la otra tabla
	);
    -- Se insertan los datos en el historial detalle (kardex)
	INSERT INTO Historial_Detalle (no_boleta, id_periodo, id_plan, abr_carr, semestre, no_materia, calificacion, forma_eval, fecha_eval)
    SELECT * FROM nuevo
    ON DUPLICATE KEY UPDATE
		id_periodo = CASE WHEN (nuevo.calificacion >= Historial_Detalle.calificacion) THEN nuevo.id_periodo END,
        forma_eval = CASE WHEN (nuevo.calificacion >= Historial_Detalle.calificacion) THEN nuevo.forma_eval END,
		calificacion = GREATEST(nuevo.calificacion, Historial_Detalle.calificacion),
        fecha_eval = CASE WHEN (nuevo.calificacion >= Historial_Detalle.calificacion) THEN nuevo.fecha_eval END;
	-- Se actualiza el estado general de los alumnos
	UPDATE Estado_General eg
    JOIN
		nuevo
	ON
		(eg.no_boleta, eg.id_plan) = (nuevo.no_boleta, nuevo.id_plan)
	SET
		estado = CASE 
					WHEN (nuevo.calificacion <= 5 AND nuevo.forma_eval = 'REC') THEN 'DESFASADA' 
					WHEN (nuevo.calificacion <= 5 AND nuevo.forma_eval <> 'REC') THEN 'REPROBADA' 
					WHEN (nuevo.calificacion >= 6) THEN 'CURSADA' 
				END
	WHERE (eg.id_plan, eg.abr_carr, eg.semestre, eg.no_materia) = (nuevo.id_plan, nuevo.abr_carr, nuevo.semestre, nuevo.no_materia);
    
    DROP TEMPORARY TABLE nuevo;
END //

DELIMITER ;


-- DELIMITER //

-- CREATE PROCEDURE InsertNewSchool (
-- 	IN p_nom_inst VARCHAR(128),
--     IN p_abreviatura VARCHAR (20)
-- )
-- BEGIN
-- 	DECLARE exit_loop BOOLEAN DEFAULT FALSE;
--     DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_loop = TRUE;
--     
--     BEGIN 
-- 		START TRANSACTION;
--         
--         INSERT INTO Institucion (nom_inst, abreviatura) 
--         VALUES (p_nom_inst, p_abreviatura);
--         
--         COMMIT;
--         
-- 	END;
--     
--     IF exit_loop THEN
-- 		ROLLBACK;
--         SELECT 0 AS resultado;
-- 	ELSE 
-- 		SELECT 1 AS resultado;
-- 	END IF;
-- END //

-- DELIMITER ;

-- DELIMITER //
