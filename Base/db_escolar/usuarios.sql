USE db_escolar;

CREATE ROLE 'alumno'; -- crear rol
GRANT SELECT ON db_escolar.* TO 'alumno'; -- asignar permisos al rol

DROP USER '2020600407'@'%';

CREATE USER '2020600407'@'%' IDENTIFIED BY 'Gus123456_'; -- crear usuario
GRANT SELECT ON db_escolar.* TO '2020600407';
FLUSH privileges; -- asignar el rol al usuario
GRANT SELECT, EXECUTE, UPDATE, SHOW VIEW, INSERT ON db_escolar.* TO '2020600407';
FLUSH PRIVILEGES;

CREATE USER '2020600408'@'%' identified BY 'Snr123456.';
GRANT SELECT ON db_escolar.* TO '2020600408';
FLUSH PRIVILEGES;

CREATE USER 'DIR980606M78'@'%' identified BY 'Prueba123_';
GRANT SELECT ON db_escolar.* TO 'DIR980606M78';
FLUSH PRIVILEGES;

CREATE USER 'LMMR860202B56'@'%' identified BY 'Prueba123_';
GRANT SELECT ON db_escolar.* TO 'LMMR860202B56';
FLUSH PRIVILEGES;

CREATE USER 'InfoUpiicsa'@'%' identified by 'Prueba123_';
GRANT SELECT, EXECUTE, UPDATE, SHOW VIEW, INSERT ON db_escolar.* TO 'InfoUpiicsa';
FLUSH PRIVILEGES;

INSERT INTO Alumno (no_boleta, nom_al, ap_al, am_al, curp, email_p_alumno, email_i_alumno, telf_alumno, telm_alumno, id_plan) VALUES 
(2020600408, 'Susana', 'Nonato', 'Ramirez', 'GOGE010116HDFNRRA5', 'e.gus.gg@gmail.com', 'egonzalezg@alumno.ipn.mx', 5555301166, 5573408674, 3);

