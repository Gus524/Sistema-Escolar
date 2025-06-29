USE db_escolar;

CREATE OR REPLACE VIEW GetInicioGestion AS
	SELECT 	g.usuario,
			i.id_inst,
			i.nom_inst
	FROM
		Institucion i
	JOIN
		Gestion g
	ON
		i.id_inst = g.id_inst;

CREATE OR REPLACE VIEW GetInicioAlumno AS
	SELECT CONCAT(a.nom_al, " ", a.ap_al, ' ', a.am_al) as nombre,
		   a.no_boleta,
		   i.id_inst,
		   i.nom_inst,
           c.desc_carr,
           p.id_plan
	FROM
		Alumno a
	JOIN
		Historial_Academico h
	ON
		h.no_boleta = a.no_boleta
	JOIN
		Plan_Estudios p
	ON 
		p.id_plan = h.id_plan
	JOIN
		Carrera c
	ON
		c.abr_carr = p.abr_carr
	JOIN
		Institucion i
	ON
		i.id_inst = c.id_inst;

CREATE OR REPLACE VIEW GetInicioDocente AS
	SELECT CONCAT(d.nom_doc, ' ', d.ap_doc, ' ', d.am_doc) AS nombre,
	   a.nom_academia,
       i.nom_inst,
       d.rfc,
       i.id_inst
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
		e.id_inst = i.id_inst;
        
CREATE OR REPLACE VIEW GetAlumnoHorario AS
	SELECT i.no_boleta, 
		i.id_periodo,
		CONCAT(g.semestre, g.abr_carr, g.turno, g.semestre, g.no_grupo) AS grupo,
		m.nom_materia,
        d.rfc,
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
		(g.id_periodo, g.abr_carr, g.id_plan, g.semestre, g.turno, g.no_grupo, g.no_materia) = 
		(i.id_periodo, i.abr_carr, i.id_plan, i.semestre, i.turno, i.no_grupo, i.no_materia)
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
		(g.id_periodo, g.abr_carr, g.id_plan, g.semestre, g.turno, g.no_grupo, g.no_materia) = 
		(dh.id_periodo, dh.abr_carr, dh.id_plan, dh.semestre, dh.turno, dh.no_grupo, dh.no_materia)
	JOIN
		Docente d
	ON
		d.rfc = dh.rfc
	JOIN
		Historial_Academico h 
	ON
		(h.no_boleta, h.id_plan) = (i.no_boleta, mc.id_plan);
        
CREATE OR REPLACE VIEW GetDocenteHorario AS
	SELECT 
		dh.id_periodo,
		CONCAT(d.nom_doc, ' ', d.ap_doc, ' ', d.am_doc) AS nombre,
		d.rfc,
        CONCAT(g.semestre, g.abr_carr, g.turno, g.semestre, g.no_grupo) AS grupo,
		CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave,
        g.inscritos,
        m.nom_materia,
		CONCAT(lun_i, '-', lun_f) AS lunes,
		CONCAT(mar_i, '-', mar_f) AS martes,
		CONCAT(mie_i, '-', mie_f) AS miercoles,
		CONCAT(jue_i, '-', jue_f) AS jue,
		CONCAT(vie_i, '-', vie_f) AS viernes  
	FROM Docente d
	JOIN 
		Docente_Horario dh
	ON 
		dh.rfc = d.rfc
	JOIN 
		Grupo_Horario g
	ON
		(g.id_periodo, g.abr_carr, g.id_plan, g.semestre, g.turno, g.no_grupo, g.no_materia) = 
		(dh.id_periodo, dh.abr_carr, dh.id_plan, dh.semestre, dh.turno, dh.no_grupo, dh.no_materia)
	JOIN 
		Mapa_Curricular mc
	ON 
		(mc.id_plan, mc.abr_carr, mc.semestre, mc.no_materia) = 
        (g.id_plan, g.abr_carr, g.semestre, g.no_materia)
	JOIN 
		Materia m
	ON 
		m.id_materia = mc.id_materia
	JOIN
		Periodo_Escolar p
	ON
		p.id_periodo = dh.id_periodo
	WHERE 
		p.activo = 1;
        
CREATE OR REPLACE VIEW GetMapaCurricular AS
	SELECT CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave, 
	   m.nom_materia, 
       m.tipo_materia,
       mc.creditos,
       m.horas_teoria,
       m.horas_prac,
       mc.abr_carr,
       p.id_plan,
       mc.semestre
	FROM
		Mapa_Curricular mc
	JOIN
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN 
		Plan_Estudios p
	ON
		p.id_plan = mc.id_plan;
        
CREATE OR REPLACE VIEW GetCarrerasInst AS
	SELECT 
	   i.id_inst,
	   c.abr_carr,
       c.no_sem,
	   c.desc_carr AS carrera
	FROM
		Carrera c
	JOIN
		Institucion i
	ON
		i.id_inst = c.id_inst;

CREATE OR REPLACE VIEW GetForMapa AS
	SELECT id_plan,
		   desc_plan AS plan,
           c.abr_carr
	FROM 
		Plan_Estudios p
	JOIN
		Carrera c
	ON
		c.abr_carr = p.abr_carr;

CREATE OR REPLACE VIEW GetAlumnosGrupo AS
	SELECT 	d.rfc,
			a.no_boleta,
			a.email_p_alumno,
			a.email_i_alumno,
            CONCAT(d.semestre, d.abr_carr, d.turno, d.semestre, d.no_grupo) AS grupo,
            CONCAT(d.abr_carr, d.semestre, d.no_materia) As clave,
			a.nom_al AS nombre, 
			a.ap_al AS ap,
			a.am_al AS am,
			id.cal_parcial_1,
			id.cal_parcial_2,
			id.cal_parcial_3,
			id.cal_extra,
			id.cal_final
	FROM 
		Inscripcion_Detalle id
	JOIN
		Docente_Horario d
	ON
		(d.id_periodo, d.abr_carr, d.id_plan, d.semestre, d.turno, d.no_grupo, d.no_materia) =
		(id.id_periodo, id.abr_carr, id.id_plan, id.semestre, id.turno, id.no_grupo, id.no_materia)
	JOIN 
		Alumno a 
	ON 
		a.no_boleta = id.no_boleta
	JOIN
		Periodo_Escolar p
	ON
		p.id_periodo = d.id_periodo
	WHERE 
		p.activo = 1;
        
CREATE OR REPLACE VIEW GetInformacionGrupo AS
	SELECT gh.semestre, 
		   gh.turno,
		   gh.no_grupo,
		   mc.abr_carr, 
           mc.no_materia,
           m.nom_materia,
           gh.disponibles,
           gh.cupo,
           gh.sobrecupo
	FROM 
		Grupo_Horario gh
	JOIN 
		Mapa_Curricular mc
	ON
		(mc.id_plan, mc.abr_carr, mc.semestre, mc.no_materia) =
        (gh.id_plan, gh.abr_carr, gh.semestre, gh.no_materia)
	JOIN
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN
		Periodo_Escolar p
	ON
		p.id_periodo = gh.id_periodo;
	
CREATE OR REPLACE VIEW GetHorarios AS
	SELECT  CONCAT(d.nom_doc, ' ', d.ap_doc, ' ', d.am_doc) AS nombre,
            m.nom_materia AS materia,
            gh.semestre,
            gh.abr_carr, 
            gh.turno, 
            gh.no_grupo,
            gh.id_plan,
            gh.id_periodo,
            CONCAT(lun_i, '-', lun_f) AS lunes,
			CONCAT(mar_i, '-', mar_f) AS martes,
			CONCAT(mie_i, '-', mie_f) AS miercoles,
			CONCAT(jue_i, '-', jue_f) AS jue,
			CONCAT(vie_i, '-', vie_f) AS viernes,
            cupo,
            disponibles,
            sobrecupo,
            mc.no_materia,
            p.activo
	FROM
		Grupo_Horario gh
	JOIN
		Mapa_Curricular mc
	ON
		(mc.id_plan, mc.abr_carr, mc.semestre, mc.no_materia) =
        (gh.id_plan, gh.abr_carr, gh.semestre, gh.no_materia)
	JOIN
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN
		Docente_Horario dh
	ON
		(dh.id_periodo, dh.abr_carr, dh.id_plan, dh.semestre, dh.turno, dh.no_grupo, dh.no_materia) =
        (gh.id_periodo, gh.abr_carr, gh.id_plan, gh.semestre, gh.turno, gh.no_grupo, gh.no_materia)
	JOIN
		Docente d
	ON
		d.rfc = dh.rfc
	JOIN
		Periodo_Escolar p
	ON
		p.id_periodo = gh.id_periodo;
	
CREATE OR REPLACE VIEW GetGruposPlan AS
	SELECT  CONCAT(semestre, abr_carr, turno, semestre, no_grupo) AS secuencia,
			semestre,
			p.id_periodo,
            id_plan,
            turno,
            p.activo
	FROM
		Grupo g
	JOIN
		Periodo_Escolar p
	ON 
		g.id_periodo = p.id_periodo;
     
CREATE OR REPLACE VIEW GetAlumnoCalificaciones AS
	SELECT i.no_boleta, 
		i.id_plan,
		i.id_periodo,
		CONCAT(g.semestre, g.abr_carr, g.turno, g.semestre, g.no_grupo) AS grupo,
		m.nom_materia,
		CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave,
        i.cal_parcial_1,
        i.cal_parcial_2,
        i.cal_parcial_3,
        i.cal_extra,
        i.cal_final
	FROM Inscripcion_Detalle i
	JOIN 
		Grupo_Horario g
	ON 
		(g.id_periodo, g.abr_carr, g.id_plan, g.semestre, g.turno, g.no_grupo, g.no_materia) = 
		(i.id_periodo, i.abr_carr, i.id_plan, i.semestre, i.turno, i.no_grupo, i.no_materia)
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
		Historial_Academico h 
	ON
		(h.no_boleta, h.id_plan) = (i.no_boleta, mc.id_plan)
	JOIN
		Periodo_Escolar p
	ON
		p.id_periodo = g.id_periodo
	WHERE
		p.activo = 1;
        
CREATE OR REPLACE VIEW GetEstadoGeneralAlumno AS
	SELECT 	e.no_boleta,
			e.id_plan,
			e.estado,
            m.nom_materia,
            a.nom_academia
	FROM
		Estado_General e
	JOIN
		Historial_Academico h 
	ON
		(e.no_boleta, e.id_plan) = (h.no_boleta, h.id_plan)
	JOIN
		Mapa_Curricular mc
	ON
		(e.id_plan, e.abr_carr, e.semestre, e.no_materia) =
        (mc.id_plan, mc.abr_carr, mc.semestre, mc.no_materia)
	JOIN 
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN
		Academia a
	ON
		a.id_academia = m.id_academia;
	
CREATE OR REPLACE VIEW GetHistorialAlumno AS
	SELECT  a.no_boleta,
			CONCAT(nom_al, ' ', ap_al, ' ', am_al) AS nombre,
            desc_carr,
            desc_plan,
            p.id_plan,
            promedio,
            ultimo_semestre
	FROM
		Alumno a
	JOIN
		Historial_Academico ha
	ON
		ha.no_boleta = a.no_boleta
	JOIN
		Plan_Estudios p
	ON
		p.id_plan = ha.id_plan
	JOIN
		Carrera c
	ON
		c.abr_carr = p.abr_carr;

CREATE OR REPLACE VIEW GetHistorialDetalle AS
	SELECT	CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave,
			m.nom_materia,
            dh.fecha_eval,
            p.desc_periodo,
            dh.forma_eval,
            dh.calificacion,
            dh.id_plan,
            dh.no_boleta,
            mc.semestre
	FROM
		Historial_Detalle dh
	JOIN
		Mapa_Curricular mc
	ON
		(mc.id_plan, mc.abr_carr, mc.semestre, mc.no_materia) =
        (dh.id_plan, dh.abr_carr, dh.semestre, dh.no_materia)
	JOIN
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN
		Periodo_Escolar p 
	ON
		p.id_periodo = dh.id_periodo;
        
CREATE OR REPLACE VIEW GetGruposDocente AS
	SELECT
			m.nom_materia,
            dh.id_periodo,
            CONCAT(mc.abr_carr, mc.semestre, mc.no_materia) AS clave,
            CONCAT(dh.semestre, dh.abr_carr, dh.turno, dh.semestre, dh.no_grupo) AS grupo,
            dh.rfc
	FROM
		Docente_Horario dh
	JOIN
		Grupo gh
	ON
		(gh.id_periodo, gh.abr_carr, gh.id_plan, gh.semestre, gh.turno, gh.no_grupo) = 
		(dh.id_periodo, dh.abr_carr, dh.id_plan, dh.semestre, dh.turno, dh.no_grupo)
	JOIN
		Mapa_Curricular mc
	ON
		(mc.id_plan, mc.abr_carr, mc.semestre, mc.no_materia) =
        (dh.id_plan, dh.abr_carr, dh.semestre, dh.no_materia)
	JOIN
		Materia m
	ON
		m.id_materia = mc.id_materia
	JOIN
		Periodo_Escolar p
	ON
		p.id_periodo = gh.id_periodo
	WHERE
		p.activo = 1;

CREATE OR REPLACE VIEW GetDatosAlumno AS
	SELECT	a.no_boleta,
			CONCAT(a.nom_al, ' ', a.ap_al, ' ', a.am_al) AS nombre,
            a.email_p_alumno,
            a.email_i_alumno,
            CONCAT(REPEAT('*', LENGTH(a.curp) - 14), RIGHT(a.curp, 4)) AS curp,
            CONCAT(REPEAT('*', LENGTH(a.telf_alumno) - 6), RIGHT(a.telf_alumno, 4)) AS telf_alumno,
            CONCAT(REPEAT('*', LENGTH(a.telm_alumno) - 6), RIGHT(a.telm_alumno, 4)) AS telm_alumno,
            a.calle,
            a.no_ext,
            a.no_int,
            a.colonia,
            a.delegacion,
            a.cp,
            c.desc_carr,
            p.desc_plan,
            ha.promedio,
            i.nom_inst AS institucion
	FROM
		Alumno a
	JOIN
		Historial_Academico ha
	ON
		ha.no_boleta = a.no_boleta
	JOIN
		Plan_Estudios p
	ON
		p.id_plan = ha.id_plan
	JOIN
		Carrera c
	ON
		c.abr_carr = p.abr_carr
	JOIN
		Institucion i 
	ON
		i.id_inst = c.id_inst;
        
CREATE OR REPLACE VIEW GetDatosDocente AS
	SELECT 	rfc,
			CONCAT(nom_doc, ' ', ap_doc, ' ', am_doc) AS nombre,
            email_p_doc,
            email_i_doc,
            CONCAT(REPEAT('*', LENGTH(tel_doc) - 6), RIGHT(tel_doc, 4)) AS tel_doc,
            calle,
            no_ext,
            no_int,
            colonia,
            delegacion,
            cp,
            a.nom_academia,
            e.desc_edificio
	FROM
		Docente d
	JOIN
		Academia a
	ON
		d.id_academia = a.id_academia
	JOIN
		Edificio e
	ON
		e.id_edificio = a.id_edificio;





		
           
        
