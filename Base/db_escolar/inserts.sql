USE db_escolar;

INSERT INTO Institucion (nom_inst, abreviatura) VALUES
('Escuela Superior de Ingeniería Mecánica y Eléctrica Unidad Zacatenco', 'ESIME Zacatenco'),
('Escuela Superior de Ingeniería Mecánica y Eléctrica Unidad Azcapotzalco', 'ESIME Azcapotzalco'),
('Escuela Superior de Ingeniería Química e Industrias Extractivas', 'ESIQIE'),  
('Escuela Superior de Física y Matemáticas', 'ESFM'),
('Escuela Superior de Cómputo', 'ESCOM'),  
('Escuela Nacional de Ciencias Biológicas', 'ENCB'),
('Escuela Superior de Ingeniería y Arquitectura Unidad Zacatenco', 'ESIA Zacatenco'),
('Escuela Superior de Ingeniería y Arquitectura Unidad Ticomán', 'ESIA Ticomán'),
('Escuela Superior de Comercio y Administración Unidad Santo Tomás', 'ESCA Santo Tomás'),
('Escuela Superior de Comercio y Administración Unidad Tepepan', 'ESCA Tepepan'),
('Escuela Superior de Turismo', 'EST'),
('Escuela Superior de Economía', 'ESE'),
('Unidad Profesional Interdisciplinaria de Ingeniería y Ciencias Sociales y Administrativas', 'UPIICSA'),
('Unidad Profesional Interdisciplinaria de Biotecnología', 'UPIBI'),
('Unidad Profesional Interdisciplinaria de Ingeniería Campus Guanajuato', 'UPIIG'),
('Escuela Superior de Enfermería y Obstetricia', 'ESEO'),
('Escuela Nacional de Medicina y Homeopatía', 'ENMH'),
('Escuela Superior de Medicina', 'ESM');

INSERT INTO Carrera (desc_carr, abr_carr, no_sem, id_inst) VALUES
('Ingeniería Industrial', 'I', 10, 13),
('Ingeniería en Informática', 'N', 10, 13),
('Ingeniería en Transporte', 'T', 10, 13),
('Administración Industrial', 'A', 8, 13),
('Ciencias de la Informática', 'C', 8, 13);

INSERT INTO Plan_Estudios (desc_plan, no_plan, abr_carr, cred_total) VALUES
('Plan 2020', 20, 'A', 338),
('Plan 2010', 10, 'A', 387),
-- Ingeniería en Informática (cve_carrera = 2)
('Plan 2021', 21, 'N', 362), 
('Plan 2010', 10, 'N', 362), 
-- Ingeniería en Transporte (cve_carrera = 3)
('Plan 2020', 20, 'T', 339), 
-- Administración Industrial (cve_carrera = 4)
('Plan 2010', 10, 'I', 273),
-- Ciencias de la Informática (cve_carrera = 5)
('Plan 2018', 18, 'C', 300); 

INSERT INTO Edificio(desc_edificio, abr_edificio, id_inst) VALUES 
('Ingeniería', 'CI', 1),
('Ligeros', 'LL', 1),
('Pesados', 'LE', 1),
('Básicas', 'CB', 1),
('Sociales', 'CS', 1);

INSERT INTO Academia (nom_academia, id_edificio) VALUES
('Matemáticas', 4),
('Informática', 1),
('Fisica', 4),
('Computación', 1),
('Administración', 5),
('Ciencias Sociales', 5),
('Laboratorio de Electricidad y Control', 3),
('Producción', 3);

INSERT INTO Alumno 
(no_boleta, nom_al, ap_al, am_al, curp, email_p_alumno, email_i_alumno, telf_alumno, telm_alumno, id_plan, calle, no_ext, no_int, colonia, delegacion, cp) 
VALUES 
('2020600407', 'Eric Gustavo', 'Gonzalez', 'Garcia', 'GOGE010116HDFNRRA5', 'e.gus.gg@gmail.com', 'egonzalezg@alumno.ipn.mx', 5555301166, 5573408674, 3, 'Jose Maria Correa', '264', 9, 'Rio Viaducto de la Piedad', 'Iztacalco', '08200'),
('2022600021', 'Sofia', 'Hernandez', 'Gomez', 'HEGO010101HDFNRRA5', 'sofia.hg@gmail.com', 'shernandezg@alumno.ipn.mx', 5512345678, 5587654321, 3, 'Av. Insurgentes Sur', '1234', 'A', 'Del Valle', 'Benito Juárez', '03100'),
('2022600022', 'Miguel', 'Lopez', 'Martinez', 'LOMA020202HDFNRRA5', 'miguel.lm@gmail.com', 'mlopem@alumno.ipn.mx', 5598765432, 5512345678, 3, 'Calle Reforma', '200', '5', 'Centro', 'Cuauhtémoc', '06000'),
('2022600023', 'Ana', 'Garcia', 'Sanchez', 'GASA030303HDFNRRA5', 'ana.gs@gmail.com', 'agarcias@alumno.ipn.mx', 5511223344, 5599887766, 3, 'Calzada de Tlalpan', '456', '10', 'Portales', 'Benito Juárez', '03300'),
('2022600001', 'Luis', 'Hernandez', 'Hernandez', 'HeHL010101HDFNRRA5', 'luis.hh@gmail.com', 'lhernandez@alumno.ipn.mx', 5598372427, 5531913127, 3, 'Periférico', 622, 2, 'Doctores', 'Álvaro Obregón', '40076'),
('2022600002', 'Luis', 'Fernandez', 'Garcia', 'FeGL010101HDFNRRA5', 'luis.fg@gmail.com', 'lfernandez@alumno.ipn.mx', 5598860057, 5560161866, 3, 'Calle Madero', 344, 2, 'Roma', 'Miguel Hidalgo', '28609'),
('2022600003', 'Luis', 'Gomez', 'Hernandez', 'GoHL010101HDFNRRA5', 'luis.gh@gmail.com', 'lgomez@alumno.ipn.mx', 5554360097, 5568806697, 3, 'Calle Reforma', 689, 12, 'Doctores', 'Gustavo A. Madero', '94649'),
('2022600004', 'Pedro', 'Martinez', 'Gomez', 'MaGP010101HDFNRRA5', 'pedro.mg@gmail.com', 'pmartinez@alumno.ipn.mx', 5575185334, 5537099001, 3, 'Calle Reforma', 1859, 2, 'Obrera', 'Venustiano Carranza', '25746'),
('2022600005', 'Carmen', 'Gomez', 'Perez', 'GoPC010101HDFNRRA5', 'carmen.gp@gmail.com', 'cgomez@alumno.ipn.mx', 5578365738, 5569699145, 3, 'Calle Reforma', 1117, 9, 'Portales', 'Azcapotzalco', '42074'),
('2022600006', 'Ana', 'Perez', 'Garcia', 'PeGA010101HDFNRRA5', 'ana.pg@gmail.com', 'aperez@alumno.ipn.mx', 5530845119, 5576501176, 3, 'Av. Revolución', 1208, 15, 'Narvarte', 'Azcapotzalco', '10250'),
('2022600007', 'Luis', 'Gonzalez', 'Fernandez', 'GoFL010101HDFNRRA5', 'luis.gf@gmail.com', 'lgonzalez@alumno.ipn.mx', 5599970561, 5551060904, 3, 'Calle Madero', 319, 7, 'Condesa', 'Álvaro Obregón', '40446'),
('2022600008', 'Sofia', 'Gonzalez', 'Martinez', 'GoMS010101HDFNRRA5', 'sofia.gm@gmail.com', 'sgonzalez@alumno.ipn.mx', 5567457326, 5572081695, 3, 'Calzada de Tlalpan', 1449, 1, 'Santa Maria la Ribera', 'Álvaro Obregón', '10555'),
('2022600009', 'Juan', 'Gonzalez', 'Hernandez', 'GoHJ010101HDFNRRA5', 'juan.gh@gmail.com', 'jgonzalez@alumno.ipn.mx', 5533145160, 5535584281, 3, 'Calzada de Tlalpan', 1516, 10, 'Portales', 'Azcapotzalco', '97049'),
('2022600010', 'Jose', 'Lopez', 'Gonzalez', 'LoGJ010101HDFNRRA5', 'jose.lg@gmail.com', 'jlopez@alumno.ipn.mx', 5581486043, 5514299313, 3, 'Eje Central', 69, 4, 'Obrera', 'Álvaro Obregón', '35759'),
('2022600011', 'Laura', 'Martinez', 'Fernandez', 'MaFL010101HDFNRRA5', 'laura.mf@gmail.com', 'lmartinez@alumno.ipn.mx', 5580013861, 5597951925, 3, 'Circuito Interior', 368, 15, 'Portales', 'Cuauhtémoc', '93884'),
('2022600012', 'Maria', 'Rodriguez', 'Lopez', 'RoLM010101HDFNRRA5', 'maria.rl@gmail.com', 'mrodriguez@alumno.ipn.mx', 5566387443, 5567592156, 3, 'Calzada de Tlalpan', 870, 13, 'Narvarte', 'Tlalpan', '13432'),
('2022600014', 'Juan', 'Fernandez', 'Sanchez', 'FeSJ010101HDFNRRA5', 'juan.fs@gmail.com', 'jfernandez@alumno.ipn.mx', 5543178369, 5513663418, 3, 'Av. Insurgentes Sur', 1763, 11, 'Del Valle', 'Iztapalapa', '11381'),
('2022600015', 'Laura', 'Garcia', 'Rodriguez', 'GaRL010101HDFNRRA5', 'laura.gr@gmail.com', 'lgarcia@alumno.ipn.mx', 5528538538, 5597535866, 3, 'Av. Insurgentes Sur', 1537, 10, 'Polanco', 'Coyoacán', '76709'),
('2022600016', 'Miguel', 'Sanchez', 'Martinez', 'SaMM010101HDFNRRA5', 'miguel.sm@gmail.com', 'msanchez@alumno.ipn.mx', 5525211112, 5573911111, 3, 'Eje Central', 1099, 5, 'Roma', 'Gustavo A. Madero', '30125'),
('2022600017', 'Carmen', 'Rodriguez', 'Sanchez', 'RoSC010101HDFNRRA5', 'carmen.rs@gmail.com', 'crodriguez@alumno.ipn.mx', 5549879185, 5555547777, 3, 'Av. Universidad', 1150, 16, 'Centro', 'Benito Juárez', '33860'),
('2022600018', 'Ana', 'Lopez', 'Martinez', 'LoMA010101HDFNRRA5', 'ana.lm@gmail.com', 'alopez@alumno.ipn.mx', 5518393009, 5522077752, 3, 'Av. Revolución', 1354, 18, 'Condesa', 'Coyoacán', '84888'),
('2022600019', 'Jose', 'Hernandez', 'Fernandez', 'HeFJ010101HDFNRRA5', 'jose.hf@gmail.com', 'jhernandez@alumno.ipn.mx', 5525398106, 5594334557, 3, 'Av. Insurgentes Sur', 1781, 9, 'Santa Maria la Ribera', 'Miguel Hidalgo', '29185'),
('2022600020', 'Pedro', 'Hernandez', 'Perez', 'HePP010101HDFNRRA5', 'pedro.hp@gmail.com', 'phernandez@alumno.ipn.mx', 5570455617, 5559837457, 3, 'Viaducto', 1183, 18, 'Doctores', 'Gustavo A. Madero', '31487');
    
-- Semestre 1
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Matemáticas discretas', 3, 1, 1),
('Obligatoria', 'Fundamentos de física', 4, 0, 3),
('Obligatoria', 'Física general experimental', 0, 2, 3),
('Obligatoria', 'Comunicación profesional interdisciplinaria', 2, 1, 6),
('Obligatoria', 'Fundamentos de administración', 3, 1, 5),
('Obligatoria', 'Responsabilidad social y ética', 2, 1, 6),
('Obligatoria', 'Lógica de programación', 2, 2, 2);

-- Semestre 2
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Cálculo diferencial e integral', 3, 1, 1),
('Obligatoria', 'Psicología en el trabajo', 2, 1, 6),
('Obligatoria', 'Metodología de la investigación', 2, 1, 6),
('Obligatoria', 'Sistemas digitales', 1, 2, 2),
('Obligatoria', 'Aplicación de sistemas digitales', 2, 1, 2),
('Obligatoria', 'Fundamentos de ingeniería de software', 2, 2, 2),
('Obligatoria', 'Estructura de datos', 2, 2, 2),
('Obligatoria', 'Programación de bajo nivel', 2, 2, 2);

-- Semestre 3
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Probabilidad', 3, 1, 1),
('Obligatoria', 'Algoritmos computacionales', 2, 2, 2),
('Obligatoria', 'Ingeniería de requerimientos', 2, 2, 2),
('Obligatoria', 'Diseño de interfaces de usuario', 2, 1, 2),
('Obligatoria', 'Arquitectura y organización de las computadoras', 3, 1, 2),
('Obligatoria', 'Construcción de bases de datos', 2, 2, 2),
('Obligatoria', 'Programación orientada a objetos', 2, 2, 2);

-- Semestre 4
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Estadística', 3, 1, 1),
('Obligatoria', 'Dispositivos programables', 1, 3, 2),
('Obligatoria', 'Ingeniería de diseño', 2, 2, 2),
('Obligatoria', 'Administración de bases de datos', 2, 2, 2),
('Obligatoria', 'Seguridad informática', 2, 2, 2),
('Obligatoria', 'Sistemas operativos', 3, 1, 2),
('Obligatoria', 'Adquisición de datos', 2, 2, 2);

-- Semestre 5
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Álgebra lineal', 3, 1, 1),
('Obligatoria', 'Métodos numéricos', 3, 1, 1),
('Obligatoria', 'Contabilidad financiera y de costos', 3, 1, 5),
('Obligatoria', 'Aplicación de la ciencia económica', 3, 1, 5),
('Obligatoria', 'Teoría de la computación y compiladores', 3, 1, 2),
('Obligatoria', 'Comunicación de datos', 3, 1, 2),
('Obligatoria', 'Programación WEB', 2, 2, 2);

-- Semestre 6
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Modelos determinísticos de investigación de operaciones', 3, 1, 1),
('Obligatoria', 'Ingeniería económica', 2, 1, 5),
('Obligatoria', 'Presupuesto y finanzas', 3, 1, 5),
('Obligatoria', 'Redes y conectividad', 3, 1, 2),
('Obligatoria', 'Fundamentos de inteligencia artificial', 3, 1, 2),
('Obligatoria', 'Ingeniería de pruebas', 2, 2, 2),
('Obligatoria', 'Programación móvil', 2, 2, 2);

-- Semestre 7
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Redes y modelos de simulación', 3, 1, 2),
('Obligatoria', 'Administración estratégica', 2, 2, 5),
('Obligatoria', 'Legislación informática', 3, 1, 2),
('Obligatoria', 'Formulación y evaluación de proyectos', 1, 3, 5),
('Obligatoria', 'Ingeniería del conocimiento', 2, 2, 2),
('Obligatoria', 'Internet de las cosas', 2, 2, 2),
('Obligatoria', 'Seguridad en redes', 3, 1, 2);

-- Semestre 8
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Obligatoria', 'Habilidades directivas', 1, 2, 5),
('Obligatoria', 'Informática empresarial', 2, 1, 2),
('Obligatoria', 'Proyecto de titulación', 0, 3, 2),
('Obligatoria', 'Gestión de proyectos', 1, 3, 5),
('Obligatoria', 'Calidad y normalización de software', 2, 2, 2),
('Obligatoria', 'Administración de tecnologías', 2, 2, 2),
('Obligatoria', 'Fundamentos de analítica de datos', 2, 2, 2),
('Obligatoria', 'Computación en la nube', 2, 2, 2);

-- Optativas 
INSERT INTO Materia (tipo_materia, nom_materia, horas_teoria, horas_prac, id_academia) VALUES
('Optativa', 'Hackeo ético (Informática)', 2, 1, 2),
('Optativa', 'Virología y criptografía (Computación)', 2, 1, 4),
('Optativa', 'Monitoreo y administración de redes (Computación)', 2, 1, 4),
('Optativa', 'Escenarios virtuales (Computación)', 2, 1, 4),
('Optativa', 'Ambientes virtuales inmersivos (Computación)', 2, 1, 4),
('Optativa', 'Simuladores virtuales (Computación)', 2, 1, 4),
('Optativa', 'Sistemas embebidos (Laboratorio de electricidad y control)', 2, 1, 7),
('Optativa', 'Informática en ambientes productivos (Producción)', 2, 1, 8),
('Optativa', 'Big Data y toma de decisiones (Informática)', 2, 1, 2);

-- Semestre 1
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 1, 1, 7, '01'),  -- Matemáticas discretas
(3, 'N', 2, 1, 8, '02'),  -- Fundamentos de física
(3, 'N', 3, 1, 2, '03'),  -- Física general experimental
(3, 'N', 4, 1, 5, '04'),  -- Comunicación profesional interdisciplinaria
(3, 'N', 5, 1, 7, '05'),  -- Fundamentos de administración
(3, 'N', 6, 1, 5, '06'),  -- Responsabilidad social y ética
(3, 'N', 7, 1, 6, '07');  -- Lógica de programación

-- Semestre 2
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 8, 2, 7, '01'),  -- Cálculo diferencial e integral
(3, 'N', 9, 2, 5, '02'),  -- Psicología en el trabajo
(3, 'N', 10, 2, 5, '03'), -- Metodología de la investigación
(3, 'N', 11, 2, 4, '04'), -- Sistemas digitales
(3, 'N', 12, 2, 5, '05'), -- Aplicación de sistemas digitales
(3, 'N', 13, 2, 6, '06'), -- Fundamentos de ingeniería de software
(3, 'N', 14, 2, 6, '07'), -- Estructura de datos
(3, 'N', 15, 2, 6, '08'); -- Programación de bajo nivel

-- Semestre 3
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 16, 3, 7, '01'), -- Probabilidad
(3, 'N', 17, 3, 6, '02'), -- Algoritmos computacionales
(3, 'N', 18, 3, 6, '03'), -- Ingeniería de requerimientos
(3, 'N', 19, 3, 5, '04'), -- Diseño de interfaces de usuario
(3, 'N', 20, 3, 7, '05'), -- Arquitectura y organización de las computadoras
(3, 'N', 21, 3, 6, '06'), -- Construcción de bases de datos
(3, 'N', 22, 3, 6, '07'); -- Programación orientada a objetos

-- Semestre 4
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 23, 4, 7, '01'), -- Estadística
(3, 'N', 24, 4, 5, '02'), -- Dispositivos programables
(3, 'N', 25, 4, 6, '03'), -- Ingeniería de diseño
(3, 'N', 26, 4, 6, '04'), -- Administración de bases de datos
(3, 'N', 27, 4, 6, '05'), -- Seguridad informática
(3, 'N', 28, 4, 7, '06'), -- Sistemas operativos
(3, 'N', 29, 4, 6, '07'); -- Adquisición de datos

-- Semestre 5
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 30, 5, 7, '01'), -- Álgebra lineal
(3, 'N', 31, 5, 7, '02'), -- Métodos numéricos
(3, 'N', 32, 5, 7, '03'), -- Contabilidad financiera y de costos
(3, 'N', 33, 5, 7, '04'), -- Aplicación de la ciencia económica
(3, 'N', 34, 5, 7, '05'), -- Teoría de la computación y compiladores
(3, 'N', 35, 5, 7, '06'), -- Comunicación de datos
(3, 'N', 36, 5, 6, '07'); -- Programación WEB

-- Semestre 6 
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 37, 6, 7, '01'), -- Modelos determinísticos de investigación de operaciones
(3, 'N', 38, 6, 5, '02'), -- Ingeniería económica
(3, 'N', 39, 6, 7, '03'), -- Presupuesto y finanzas
(3, 'N', 40, 6, 7, '04'), -- Redes y conectividad
(3, 'N', 41, 6, 7, '05'), -- Fundamentos de inteligencia artificial
(3, 'N', 42, 6, 6, '06'), -- Ingeniería de pruebas
(3, 'N', 43, 6, 6, '07'); -- Programación móvil

-- Semestre 7
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 44, 7, 7, '01'), -- Redes y modelos de simulación
(3, 'N', 45, 7, 6, '02'), -- Administración estratégica
(3, 'N', 46, 7, 7, '03'), -- Legislación informática
(3, 'N', 47, 7, 5, '04'), -- Formulación y evaluación de proyectos
(3, 'N', 48, 7, 6, '05'), -- Ingeniería del conocimiento
(3, 'N', 49, 7, 6, '06'), -- Internet de las cosas
(3, 'N', 50, 7, 7, '07'); -- Seguridad en redes

-- Semestre 8
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 51, 8, 4, '01'), -- Habilidades directivas
(3, 'N', 52, 8, 5, '02'), -- Informática empresarial
(3, 'N', 53, 8, 3, '03'), -- Proyecto de titulación
(3, 'N', 54, 8, 5, '04'), -- Gestión de proyectos
(3, 'N', 55, 8, 6, '05'), -- Calidad y normalización de software
(3, 'N', 56, 8, 6, '06'), -- Administración de tecnologías
(3, 'N', 57, 8, 6, '07'), -- Fundamentos de analítica de datos
(3, 'N', 58, 8, 6, '08'); -- Computación en la nube

-- Optativas informática
-- Optativas Semestre 5
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 59, 5, 5, '08'),  -- Hackeo ético
(3, 'N', 60, 5, 5, '09'),  -- Escenarios virtuales
(3, 'N', 61, 5, 5, '10');  -- Sistemas embebidos

-- Optativas Semestre 6
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 62, 6, 5, '08'),  -- Virología y criptografía
(3, 'N', 63, 6, 5, '09'),  -- Ambientes virtuales inmersivos
(3, 'N', 64, 6, 5, '10');  -- Informática en ambientes productivos

-- Optativas Semestre 7
INSERT INTO Mapa_Curricular (id_plan, abr_carr, id_materia, semestre, creditos, no_materia) VALUES
(3, 'N', 65, 7, 5, '08'),  -- Monitoreo y administración de redes
(3, 'N', 66, 7, 5, '09'),  -- Simuladores virtuales
(3, 'N', 67, 7, 5, '10');  -- Big data y toma de decisiones

INSERT INTO Periodo_Escolar (desc_periodo) VALUES
('24/2'),
('25/1'),
('25/2');

INSERT INTO Docente (id_academia, nom_doc, ap_doc, am_doc, rfc, email_p_doc, email_i_doc, tel_doc, calle, no_ext, no_int, colonia, delegacion, cp) VALUES
(1, 'Juan', 'Pérez', 'García', 'PGAJ850101A45', 'juan.perez@example.com', 'jperez@ipn.mx', '5551234567', 'Av. de los Maestros', '100', 'A', 'Lindavista', 'Gustavo A. Madero', 77520),
(2, 'María', 'López', 'Martínez', 'LMMR860202B56', 'maria.lopez@example.com', 'mlopez@ipn.mx', '5552345678', 'Calz. de Guadalupe', '250', '2', 'Industrial', 'Gustavo A. Madero', 77000),
(3, 'Carlos', 'Sánchez', 'Hernández', 'SHCJ870303C67', 'carlos.sanchez@example.com', 'csanchez@ipn.mx', '5553456789', 'Av. Instituto Politécnico Nacional', '500', '1', 'Zacatenco', 'Gustavo A. Madero', 77380),
(4, 'Ana', 'Rodríguez', 'Núñez', 'RANC880404D78', 'ana.rodriguez@example.com', 'arodriguez@ipn.mx', '5554567890', 'Calle de la Reforma', '10', '3', 'Polanco', 'Miguel Hidalgo', 11560),
(5, 'Luis', 'Fernández', 'Ramos', 'FRLJ890505E89', 'luis.fernandez@example.com', 'lfernandez@ipn.mx', '5555678901', 'Av. Insurgentes Sur', '1500', '4', 'Roma Sur', 'Cuauhtémoc', 6760),
(6, 'Sofía', 'Gómez', 'Vázquez', 'GVSM900606F90', 'sofia.gomez@example.com', 'sgomez@ipn.mx', '5556789012', 'Eje Central Lázaro Cárdenas', '50', '5', 'Centro Histórico', 'Cuauhtémoc', 6000),
(7, 'José', 'Martínez', 'Ruiz', 'MRJH910707G01', 'jose.martinez@example.com', 'jmartinez@ipn.mx', '5557890123', 'Av. Universidad', '1000', '6', 'Del Valle', 'Benito Juárez', 3100),
(8, 'Laura', 'Hernández', 'González', 'HGLA920808H12', 'laura.hernandez@example.com', 'lhernandez@ipn.mx', '5558901234', 'Calz. de Tlalpan', '3000', '7', 'Villa Olímpica', 'Tlalpan', 14020),
(1, 'Andrés', 'Mendoza', 'Soto', 'MSA930101H23', 'andres.mendoza@example.com', 'amendoza@ipn.mx', '5559012345', 'Av. División del Norte', '2000', '8', 'Del Carmen', 'Coyoacán', 4100),
(2, 'Clara', 'Ramírez', 'Ortiz', 'ROC940202I34', 'clara.ramirez@example.com', 'cramirez@ipn.mx', '5550123456', 'Eje 10 Sur', '100', '9', 'Portales', 'Benito Juárez', 3300),
(3, 'Esteban', 'Morales', 'Domínguez', 'MED950303J45', 'esteban.morales@example.com', 'emorales@ipn.mx', '5551234567', 'Av. Revolución', '500', '10', 'San Pedro de los Pinos', 'Benito Juárez', 1180),
(4, 'Gabriela', 'Pérez', 'Guzmán', 'PGG960404K56', 'gabriela.perez@example.com', 'gperez@ipn.mx', '5552345678', 'Circuito Interior', '100', '11', 'Condesa', 'Cuauhtémoc', 6140),
(5, 'Hugo', 'Jiménez', 'Serrano', 'JSH970505L67', 'hugo.jimenez@example.com', 'hjimenez@ipn.mx', '5553456789', 'Av. Paseo de la Reforma', '400', '12', 'Juárez', 'Cuauhtémoc', 6600),
(6, 'Isabel', 'Díaz', 'Romero', 'DIR980606M78', 'isabel.diaz@example.com', 'idiaz@ipn.mx', '5554567890', 'Calz. México-Tacuba', '200', '13', 'Tacuba', 'Miguel Hidalgo', 11410),
(7, 'Javier', 'Martínez', 'Mendoza', 'MMM990707N89', 'javier.martinez@example.com', 'jmartinez2@ipn.mx', '5555678901', 'Av. Constituyentes', '500', '14', 'Lomas Altas', 'Miguel Hidalgo', 11950),
(8, 'Karen', 'Flores', 'Torres', 'FTK000808O90', 'karen.flores@example.com', 'kflores@ipn.mx', '5556789012', 'Periférico Sur', '4000', '15', 'Jardines del Pedregal', 'Álvaro Obregón', 1070),
(1, 'Lorenzo', 'Ruiz', 'Cruz', 'RCL010909P01', 'lorenzo.ruiz@example.com', 'lruiz@ipn.mx', '5557890123', 'Av. Aztecas', '200', '16', 'Ajusco', 'Coyoacán', 4300),
(2, 'Pedro', 'Gutiérrez', 'López', 'GGLP021010Q12', 'pedro.gutierrez@example.com', 'pg@ipn.mx', '5558901234', 'Calz. Ermita Iztapalapa', '1500', '17', 'Santa María Aztahuacan', 'Iztapalapa', 9500),
(2, 'Alejandra', 'Hernández', 'García', 'HHAG031111R23', 'alejandra.hernandez@example.com', 'ah@ipn.mx', '5559012345', 'Av. Tláhuac', '1000', '18', 'Los Olivos', 'Tláhuac', 13210),
(2, 'Roberto', 'López', 'Martínez', 'LLRM041212S34', 'roberto.lopez@example.com', 'rl@ipn.mx', '5550123456', 'Eje 6 Sur', '200', '19', 'Independencia', 'Benito Juárez', 3600),
(2, 'Diana', 'Flores', 'Pérez', 'FFDP050113T45', 'diana.flores@example.com', 'df@ipn.mx', '5551234567', 'Av. Cuauhtémoc', '500', '20', 'Doctores', 'Cuauhtémoc', 6700);

INSERT INTO Grupo (semestre, abr_carr, turno, no_grupo, id_periodo) VALUES
-- Periodo 24/2
(1, 'N', 'M', 1, 2),
(1, 'N', 'M', 2, 2),
(1, 'N', 'M', 3, 2),
(1, 'N', 'M', 4, 2),
(1, 'N', 'V', 1, 2),
(1, 'N', 'V', 2, 2),
(1, 'N', 'V', 3, 2),
(1, 'N', 'V', 4, 2),
(2, 'N', 'M', 1, 2),
(2, 'N', 'M', 2, 2),
(2, 'N', 'M', 3, 2),
(2, 'N', 'M', 4, 2),
(2, 'N', 'V', 1, 2),
(2, 'N', 'V', 2, 2),
(2, 'N', 'V', 3, 2),
(2, 'N', 'V', 4, 2),
(3, 'N', 'M', 1, 2),
(3, 'N', 'M', 2, 2),
(3, 'N', 'M', 3, 2),
(3, 'N', 'M', 4, 2),
(3, 'N', 'V', 1, 2),
(3, 'N', 'V', 2, 2),
(3, 'N', 'V', 3, 2),
(3, 'N', 'V', 4, 2),
(4, 'N', 'M', 1, 2),
(4, 'N', 'M', 2, 2),
(4, 'N', 'M', 3, 2),
(4, 'N', 'M', 4, 2),
(4, 'N', 'V', 1, 2),
(4, 'N', 'V', 2, 2),
(4, 'N', 'V', 3, 2),
(4, 'N', 'V', 4, 2),
(5, 'N', 'M', 1, 2),
(5, 'N', 'M', 2, 2),
(5, 'N', 'M', 3, 2),
(5, 'N', 'M', 4, 2),
(5, 'N', 'V', 1, 2),
(5, 'N', 'V', 2, 2),
(5, 'N', 'V', 3, 2),
(5, 'N', 'V', 4, 2),
-- Periodo 25/1
(1, 'N', 'M', 1, 3),
(1, 'N', 'M', 2, 3),
(1, 'N', 'M', 3, 3),
(1, 'N', 'M', 4, 3),
(1, 'N', 'V', 1, 3),
(1, 'N', 'V', 2, 3),
(1, 'N', 'V', 3, 3),
(1, 'N', 'V', 4, 3),
(2, 'N', 'M', 1, 3),
(2, 'N', 'M', 2, 3),
(2, 'N', 'M', 3, 3),
(2, 'N', 'M', 4, 3),
(2, 'N', 'V', 1, 3),
(2, 'N', 'V', 2, 3),
(2, 'N', 'V', 3, 3),
(2, 'N', 'V', 4, 3),
(3, 'N', 'M', 1, 3),
(3, 'N', 'M', 2, 3),
(3, 'N', 'M', 3, 3),
(3, 'N', 'M', 4, 3),
(3, 'N', 'V', 1, 3),
(3, 'N', 'V', 2, 3),
(3, 'N', 'V', 3, 3),
(3, 'N', 'V', 4, 3),
(4, 'N', 'M', 1, 3),
(4, 'N', 'M', 2, 3),
(4, 'N', 'M', 3, 3),
(4, 'N', 'M', 4, 3),
(4, 'N', 'V', 1, 3),
(4, 'N', 'V', 2, 3),
(4, 'N', 'V', 3, 3),
(4, 'N', 'V', 4, 3),
(5, 'N', 'M', 1, 3),
(5, 'N', 'M', 2, 3),
(5, 'N', 'M', 3, 3),
(5, 'N', 'M', 4, 3),
(5, 'N', 'V', 1, 3),
(5, 'N', 'V', 2, 3),
(5, 'N', 'V', 3, 3),
(5, 'N', 'V', 4, 3),
-- Optativas
(5, 'N', 'M', 7, 2),
(5, 'N', 'M', 8, 2),
(5, 'N', 'M', 9, 2),
(5, 'N', 'V', 7, 2),
(5, 'N', 'V', 8, 2),
(5, 'N', 'V', 9, 2),
(5, 'N', 'M', 7, 3),
(5, 'N', 'M', 8, 3),
(5, 'N', 'M', 9, 3),
(5, 'N', 'V', 7, 3),
(5, 'N', 'V', 8, 3),
(5, 'N', 'V', 9, 3);

-- INSERTS SEMESTRE 1 para dias lunes y miercoles Semestre 1 matutino
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 1, 'M', 1, 1, 40, 'PGAJ850101A45', '11:00:00', '13:00:00', '7:00:00', '9:00:00'),
('N', 2, 1, 'M', 1, 2, 40, 'SHCJ870303C67', '09:00:00', '11:00:00', '9:00:00', '11:00:00');
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 1, 'M', 1, 4, 40, 'GVSM900606F90', '07:00:00', '09:00:00', '11:00:00', '13:00:00'),
('N', 2, 1, 'M', 1, 5, 40, 'FRLJ890505E89', '09:00:00', '11:00:00', '09:00:00', '11:00:00'),
('N', 2, 1, 'M', 1, 3, 40, 'SHCJ870303C67', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 1, 'M', 1, 6, 40, 'DIR980606M78', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 1, 'M', 1, 7, 40, 'LMMR860202B56', '07:00:00', '09:00:00', '09:00:00', '11:00:00'); 

-- INSERTS para dias lunes y miercoles
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 1, 'V', 1, 1, 40, 'PGAJ850101A45', '17:00:00', '19:00:00', '15:00:00', '17:00:00'),
('N', 2, 1, 'V', 1, 2, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '17:00:00', '19:00:00');

-- Grupo 1 vespertino
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 1, 'V', 1, 4, 40, 'GVSM900606F90', '15:00:00', '17:00:00', '19:00:00', '21:00:00'),
('N', 2, 1, 'V', 1, 5, 40, 'FRLJ890505E89', '17:00:00', '19:00:00', '17:00:00', '19:00:00'),
('N', 2, 1, 'V', 1, 3, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 1, 'V', 1, 6, 40, 'DIR980606M78', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 1, 'V', 1, 7, 40, 'LMMR860202B56', '15:00:00', '17:00:00', '17:00:00', '19:00:00');

-- INSERTS para semestre 2 Matutino
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 2, 'M', 1, 8, 40, 'PGAJ850101A45', '12:00:00', '14:00:00', '7:00:00', '9:00:00'),
('N', 2, 2, 'M', 1, 9, 40, 'SHCJ870303C67', '10:00:00', '12:00:00', '9:00:00', '11:00:00');
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 2, 'M', 1, 10, 40, 'GVSM900606F90', '07:00:00', '09:00:00', '11:00:00', '13:00:00'),
('N', 2, 2, 'M', 1, 11, 40, 'FRLJ890505E89', '09:00:00', '11:00:00', '09:00:00', '11:00:00'),
('N', 2, 2, 'M', 1, 12, 40, 'SHCJ870303C67', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 2, 'M', 1, 13, 40, 'DIR980606M78', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f)
VALUES 
('N', 2, 2, 'M', 1, 14, 40, 'LMMR860202B56', '07:00:00', '10:00:00'); 
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, vie_i, vie_f)
VALUES 
('N', 2, 2, 'M', 1, 15, 40, 'LMMR860202B56', '09:00:00', '12:00:00'); 

-- VESPERTINO SEMESTRE 2
-- INSERTS para dias lunes y miercoles
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 2, 'V', 1, 8, 40, 'PGAJ850101A45', '17:00:00', '19:00:00', '15:00:00', '17:00:00'),
('N', 2, 2, 'V', 1, 9, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '17:00:00', '19:00:00');

-- Grupo 1 vespertino
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 2, 'V', 1, 10, 40, 'GVSM900606F90', '15:00:00', '17:00:00', '19:00:00', '21:00:00'),
('N', 2, 2, 'V', 1, 11, 40, 'FRLJ890505E89', '17:00:00', '19:00:00', '17:00:00', '19:00:00'),
('N', 2, 2, 'V', 1, 12, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 2, 'V', 1, 13, 40, 'DIR980606M78', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f)
VALUES 
('N', 2, 2, 'V', 1, 14, 40, 'LMMR860202B56', '14:00:00', '17:00:00'); 
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, vie_i, vie_f)
VALUES 
('N', 2, 2, 'V', 1, 15, 40, 'LMMR860202B56', '17:00:00', '20:00:00');

-- INSERTS semestre 3
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 3, 'M', 1, 16, 40, 'PGAJ850101A45', '11:00:00', '13:00:00', '7:00:00', '9:00:00'),
('N', 2, 3, 'M', 1, 17, 40, 'SHCJ870303C67', '09:00:00', '11:00:00', '9:00:00', '11:00:00');
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 3, 'M', 1, 18, 40, 'GVSM900606F90', '07:00:00', '09:00:00', '11:00:00', '13:00:00'),
('N', 2, 3, 'M', 1, 19, 40, 'FRLJ890505E89', '09:00:00', '11:00:00', '09:00:00', '11:00:00'),
('N', 2, 3, 'M', 1, 20, 40, 'SHCJ870303C67', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 3, 'M', 1, 21, 40, 'DIR980606M78', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 3, 'M', 1, 22, 40, 'LMMR860202B56', '07:00:00', '09:00:00', '09:00:00', '11:00:00'); 

-- INSERTS para dias lunes y miercoles
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 3, 'V', 1, 16, 40, 'PGAJ850101A45', '17:00:00', '19:00:00', '15:00:00', '17:00:00'),
('N', 2, 3, 'V', 1, 17, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '17:00:00', '19:00:00');

-- Grupo 1 vespertino
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 3, 'V', 1, 18, 40, 'GVSM900606F90', '15:00:00', '17:00:00', '19:00:00', '21:00:00'),
('N', 2, 3, 'V', 1, 19, 40, 'FRLJ890505E89', '17:00:00', '19:00:00', '17:00:00', '19:00:00'),
('N', 2, 3, 'V', 1, 20, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 3, 'V', 1, 21, 40, 'DIR980606M78', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 3, 'V', 1, 22, 40, 'LMMR860202B56', '15:00:00', '17:00:00', '17:00:00', '19:00:00');

-- INSERTS semestre 4
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 4, 'M', 1, 23, 40, 'PGAJ850101A45', '11:00:00', '13:00:00', '7:00:00', '9:00:00'),
('N', 2, 4, 'M', 1, 24, 40, 'SHCJ870303C67', '09:00:00', '11:00:00', '9:00:00', '11:00:00');
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 4, 'M', 1, 25, 40, 'GVSM900606F90', '07:00:00', '09:00:00', '11:00:00', '13:00:00'),
('N', 2, 4, 'M', 1, 26, 40, 'FRLJ890505E89', '09:00:00', '11:00:00', '09:00:00', '11:00:00'),
('N', 2, 4, 'M', 1, 27, 40, 'SHCJ870303C67', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 4, 'M', 1, 28, 40, 'DIR980606M78', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 4, 'M', 1, 29, 40, 'LMMR860202B56', '07:00:00', '09:00:00', '09:00:00', '11:00:00'); 

-- INSERTS para dias lunes y miercoles
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 4, 'V', 1, 23, 40, 'PGAJ850101A45', '17:00:00', '19:00:00', '15:00:00', '17:00:00'),
('N', 2, 4, 'V', 1, 24, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '17:00:00', '19:00:00');

-- Grupo 1 vespertino
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 4, 'V', 1, 25, 40, 'GVSM900606F90', '15:00:00', '17:00:00', '19:00:00', '21:00:00'),
('N', 2, 4, 'V', 1, 26, 40, 'FRLJ890505E89', '17:00:00', '19:00:00', '17:00:00', '19:00:00'),
('N', 2, 4, 'V', 1, 27, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 4, 'V', 1, 28, 40, 'DIR980606M78', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 4, 'V', 1, 29, 40, 'LMMR860202B56', '15:00:00', '17:00:00', '17:00:00', '19:00:00');

--  INSERTS SEMESTRE 5
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 5, 'M', 1, 23, 40, 'PGAJ850101A45', '11:00:00', '13:00:00', '7:00:00', '9:00:00'),
('N', 2, 5, 'M', 1, 24, 40, 'SHCJ870303C67', '09:00:00', '11:00:00', '9:00:00', '11:00:00');
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'M', 1, 25, 40, 'GVSM900606F90', '07:00:00', '09:00:00', '11:00:00', '13:00:00'),
('N', 2, 5, 'M', 1, 26, 40, 'FRLJ890505E89', '09:00:00', '11:00:00', '09:00:00', '11:00:00'),
('N', 2, 5, 'M', 1, 27, 40, 'SHCJ870303C67', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 5, 'M', 1, 28, 40, 'DIR980606M78', '11:00:00', '13:00:00', '07:00:00', '09:00:00');
-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 5, 'M', 1, 29, 40, 'LMMR860202B56', '07:00:00', '09:00:00', '09:00:00', '11:00:00'); 

-- INSERTS para dias lunes y miercoles
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, mie_i, mie_f)
VALUES
('N', 2, 5, 'V', 1, 23, 40, 'PGAJ850101A45', '17:00:00', '19:00:00', '15:00:00', '17:00:00'),
('N', 2, 5, 'V', 1, 24, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '17:00:00', '19:00:00');

-- Grupo 1 vespertino
-- INSERTS para dias martes y jueves
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mar_i, mar_f, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'V', 1, 25, 40, 'GVSM900606F90', '15:00:00', '17:00:00', '19:00:00', '21:00:00'),
('N', 2, 5, 'V', 1, 26, 40, 'FRLJ890505E89', '17:00:00', '19:00:00', '17:00:00', '19:00:00'),
('N', 2, 5, 'V', 1, 27, 40, 'SHCJ870303C67', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias miercoles y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, mie_i, mie_f, vie_i, vie_f) 
VALUES 
('N', 2, 5, 'V', 1, 28, 40, 'DIR980606M78', '19:00:00', '21:00:00', '15:00:00', '17:00:00');

-- INSERTS para dias lunes y viernes
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, lun_i, lun_f, vie_i, vie_f) 
VALUES 
('N', 2, 5, 'V', 1, 29, 40, 'LMMR860202B56', '15:00:00', '17:00:00', '17:00:00', '19:00:00');

-- OPTATIVAS 5to - Matutino
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'M', 7, 29, 40, 'LMMR860202B56', '19:00:00', '22:00:00');
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'M', 8, 29, 40, 'LMMR860202B56', '19:00:00', '22:00:00');
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'M', 9, 29, 40, 'LMMR860202B56', '19:00:00', '22:00:00');

-- Optativa vespertino
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'V', 7, 29, 40, 'LMMR860202B56', '19:00:00', '22:00:00');
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'V', 8, 29, 40, 'LMMR860202B56', '19:00:00', '22:00:00');
INSERT INTO Grupo_Horario 
(abr_carr, id_periodo, semestre, turno, no_grupo, id_materia, cupo, rfc, jue_i, jue_f) 
VALUES 
('N', 2, 5, 'V', 9, 29, 40, 'LMMR860202B56', '19:00:00', '22:00:00');

INSERT INTO Inscripcion (no_boleta, id_periodo, fecha_inscripcion) VALUES
('2020600407', 2, '2024-08-20');

INSERT INTO Inscripcion_Detalle (no_boleta, semestre, abr_carr, turno, no_grupo, id_periodo, id_materia, rfc)
VALUES 
('2020600407', 4, 'N', 'M', 1, 2, 28, 'DIR980606M78');
