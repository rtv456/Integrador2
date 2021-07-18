
DROP PROCEDURE IF EXISTS sp_listCita;
DELIMITER ;;
CREATE PROCEDURE sp_listCita(
IN p_perfil VARCHAR(10), 
IN p_id INT,
IN L_FECHA VARCHAR(20)
)
BEGIN

IF p_perfil='1' then
	SELECT 
	C.idCita,
	S.descripcion as descSede, 
	E.descripcion as descEspecialidad,
	CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
	CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
	DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
	concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
	'success'status
	FROM citas C
	INNER JOIN horario H ON H.idHorario=C.idHorario
	INNER JOIN medico M ON M.idMedico=H.idMedico
	INNER JOIN persona PER ON PER.idPersona=M.idPersona
	INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
	INNER JOIN sede S ON S.idSede=E.idSede
	INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
	INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
	WHERE C.estado<>0 AND cast(c.fechaHoraCita as date)=L_FECHA;
end if;


IF p_perfil='2' then
	SELECT 
	C.idCita,
	S.descripcion as descSede, 
	E.descripcion as descEspecialidad,
	CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
	CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
	DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
	concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
	'success'status
	FROM citas C
	INNER JOIN horario H ON H.idHorario=C.idHorario
	INNER JOIN medico M ON M.idMedico=H.idMedico
	INNER JOIN persona PER ON PER.idPersona=M.idPersona
	INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
	INNER JOIN sede S ON S.idSede=E.idSede
	INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
	INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
	WHERE C.estado<>0 AND cast(C.fechaHoraCita as date)=L_FECHA
    AND M.idPersona=p_id;
end if;


IF p_perfil='3' then
	SELECT 
	C.idCita,
	S.descripcion as descSede, 
	E.descripcion as descEspecialidad,
	CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
	CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
	DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
	concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
	'success'status
	FROM citas C
	INNER JOIN horario H ON H.idHorario=C.idHorario
	INNER JOIN medico M ON M.idMedico=H.idMedico
	INNER JOIN persona PER ON PER.idPersona=M.idPersona
	INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
	INNER JOIN sede S ON S.idSede=E.idSede
	INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
	INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
	WHERE C.estado<>0 AND cast(C.fechaHoraCita as date)=L_FECHA
    AND PAC.idPersona=p_id;
end if;

END;


;;


DROP PROCEDURE IF EXISTS sp_listCitaTodo;
DELIMITER ;;
CREATE PROCEDURE sp_listCitaTodo(
IN p_perfil VARCHAR(10), 
IN p_id INT
)
BEGIN

IF p_perfil='1' then
	SELECT 
	C.idCita,
	S.descripcion as descSede, 
	E.descripcion as descEspecialidad,
	CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
	CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
	DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
	concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
	'success'status
	FROM citas C
	INNER JOIN horario H ON H.idHorario=C.idHorario
	INNER JOIN medico M ON M.idMedico=H.idMedico
	INNER JOIN persona PER ON PER.idPersona=M.idPersona
	INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
	INNER JOIN sede S ON S.idSede=E.idSede
	INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
	INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
	WHERE C.estado<>0;
end if;


IF p_perfil='2' then
	SELECT 
	C.idCita,
	S.descripcion as descSede, 
	E.descripcion as descEspecialidad,
	CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
	CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
	DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
	concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
	'success'status
	FROM citas C
	INNER JOIN horario H ON H.idHorario=C.idHorario
	INNER JOIN medico M ON M.idMedico=H.idMedico
	INNER JOIN persona PER ON PER.idPersona=M.idPersona
	INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
	INNER JOIN sede S ON S.idSede=E.idSede
	INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
	INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
	WHERE C.estado<>0
    AND M.idPersona=p_id;
end if;


IF p_perfil='3' then
	SELECT 
	C.idCita,
	S.descripcion as descSede, 
	E.descripcion as descEspecialidad,
	CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
	CONCAT(PER2.apePaterno,' ',PER2.ApeMaterno,' ',PER2.nombres)paciente,
	DATE_FORMAT(C.fechaHoraCita,'%d/%m/%Y')fechaHoraCita,
	concat( DATE_FORMAT(C.fechaHoraCita,'%H:%i'),' - ',DATE_FORMAT(C.fechaHoraCita,'%H:%i'))fechaHora,
	'success'status
	FROM citas C
	INNER JOIN horario H ON H.idHorario=C.idHorario
	INNER JOIN medico M ON M.idMedico=H.idMedico
	INNER JOIN persona PER ON PER.idPersona=M.idPersona
	INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
	INNER JOIN sede S ON S.idSede=E.idSede
	INNER JOIN paciente PAC ON PAC.idPaciente=C.idPaciente
	INNER JOIN persona PER2 ON PER2.idPersona=PAC.idPersona
	WHERE C.estado<>0
    AND PAC.idPersona=p_id;
end if;

END;

;;

DROP PROCEDURE IF EXISTS sp_generaUsuario;
DELIMITER ;;
CREATE PROCEDURE sp_generaUsuario(
IN p_documento VARCHAR(11), 
IN p_apePaterno VARCHAR(50), 
IN p_apeMaterno VARCHAR(50), 
IN p_nombres VARCHAR(50), 
IN p_fechaNacimiento VARCHAR(20), 
IN p_sexo VARCHAR(1), 
IN p_correo VARCHAR(60), 
IN p_contrasena VARCHAR(20)
)
BEGIN

BEGIN

      DECLARE l_existe INT;
      DECLARE l_existe_usuario INT;
      DECLARE l_existe_documento INT;
      DECLARE l_idPersona INT;
      DECLARE l_hc int;
     
      SET l_existe = (SELECT count(*) FROM persona P WHERE P.correo=p_correo and P.estado<>0);
      SET l_existe_usuario = (SELECT count(*) FROM citas.usuarios U WHERE U.estado<>0 AND U.usuario=p_correo);
      SET l_existe_documento = (SELECT count(*) FROM persona P WHERE P.documento=p_documento and P.estado<>0);
       
       if l_existe=0 then
       
       if(l_existe_usuario=0) then
          
          if(l_existe_documento=0) then
          
				INSERT INTO persona
				(
				documento,
				apePaterno,
				apeMaterno,
				nombres,
				fechaNacimiento,
				sexo,
				correo,
				estado,
				usuarioReg,
				fechaReg)
				VALUES
				(
				P_documento,
				P_apePaterno,
				P_apeMaterno,
				P_nombres,
				P_fechaNacimiento,
				P_sexo,
				P_correo,
				1,
				null,
				now()
				);

				SET l_idPersona = (SELECT idPersona FROM persona P WHERE P.correo=p_correo and P.estado<>0);

				INSERT INTO usuarios
				(
				idPersona,
				idPerfil,
				usuario,
				contrasena,
				estado)
				VALUES
				(
				l_idPersona,
				3,
				p_correo,
				p_contrasena,
				1);
                set l_hc = (SELECT MAX(HC)+1 FROM paciente PAC);
                INSERT INTO paciente (idPersona, HC, estado) values(l_idPersona,l_hc,1);
				   SELECT 
				   idUsuario,
				   idPersona,
				   idPerfil,
				   usuario,
				   contrasena,
				   'Ud se ha registrado correctamente, le hemos enviado correo con los datos de ingreso.'message, 
				   'success'status  
				   FROM usuarios U WHERE U.usuario=p_correo and U.estado<>0;
				ELSE
                
                  SELECT 
				   null as idUsuario,
				   null as idPersona,
				   null as idPerfil,
				   null as usuario,
				   null as contrasena,
				   'El documento ingresado ya existe en nuestro sistema'message, 
				   'failed'status;
                   
            end if;       
                   
       ELSE
       
				   SELECT 
				   null as idUsuario,
				   null as idPersona,
				   null as idPerfil,
				   null as usuario,
				   null as contrasena,
				   'El correo ingresado ya existe en nuestro sistema'message, 
				   'failed'status;
       
     end if;
     
      else
      
			SELECT 
				   null as idUsuario,
				   null as idPersona,
				   null as idPerfil,
				   null as usuario,
				   null as contrasena,
				   'El correo ingresado ya existe en nuestro sistema'message, 
				   'failed'status;
      
     end if;
     
END;
        

END;


;;


DROP PROCEDURE IF EXISTS sp_generaHorario;
DELIMITER ;;
CREATE PROCEDURE sp_generaHorario(IN L_FECHA VARCHAR(20), IN L_MEDICO INT)
BEGIN

BEGIN
     DECLARE cur_idHorario INT;
     DECLARE cur_fechaHoraInicio datetime;
     DECLARE cur_fechaHoraFin datetime;
     DECLARE cur_minutosAtencion int;
     DECLARE done INT DEFAULT FALSE;
   DECLARE cursor_i CURSOR FOR 
   SELECT
	F.idHorario,
	cast((concat(DATE_FORMAT(L_FECHA,'%Y-%m-%d'),DATE_FORMAT(F.fechaHoraInicio,' %H:%i:%s'))) as datetime)Inicio,
    cast((concat(DATE_FORMAT(L_FECHA,'%Y-%m-%d'),DATE_FORMAT(F.fechaHoraFin,' %H:%i:%s'))) as datetime)Final,
    F.minutosAtencion
   FROM(SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgLunes=1 THEN 'Lunes' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
UNION ALL
SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgMartes=1 THEN 'Martes' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
UNION ALL
SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgMiercoles=1 THEN 'Miercoles' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
UNION ALL
SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgJueves=1 THEN 'Jueves' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
UNION ALL
SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgViernes=1 THEN 'Viernes' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
UNION ALL
SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgSabado=1 THEN 'Sabado' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
UNION ALL
SELECT 
	H.idHorario, 
    H.fechaHoraInicio, 
    H.fechaHoraFin,
    M.minutosAtencion,
    cast(L_FECHA as date)fechaParametro,
    (ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,
    H.flgLunes,
    H.flgMartes,
    H.flgMiercoles,
    H.flgJueves,
    H.flgViernes,
    H.flgSabado,
    H.flgDomingo
FROM citas.horario H
INNER JOIN medico M ON M.idMedico=H.idMedico
WHERE M.idMedico=L_MEDICO
AND cast(H.fechaHoraInicio as date)<=L_FECHA
AND cast(H.fechaHoraFin as date)>=L_FECHA
AND (CASE when H.flgDomingo=1 THEN 'Domingo' ELSE '' END)=(ELT(WEEKDAY(cast(L_FECHA as date)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'))
)F
order by 2;
     DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
     DROP TABLE IF EXISTS tmpHorario;
     CREATE TEMPORARY TABLE tmpHorario(
		   idHorario INT NOT NULL,
		   fechaHoraInicio datetime NOT NULL,
           fechaHoraFin datetime NOT NULL,
           minutosAtencion INT NULL
		);
     OPEN cursor_i;
     read_loop: LOOP
       FETCH cursor_i INTO cur_idHorario, cur_fechaHoraInicio,cur_fechaHoraFin, cur_minutosAtencion ;
	       IF done THEN
			 LEAVE read_loop;
		   END IF;
            WHILE cur_fechaHoraInicio < cur_fechaHoraFin DO
	          INSERT INTO tmpHorario(idHorario, fechaHoraInicio, fechaHoraFin, minutosAtencion)
              VALUES (cur_idHorario,cur_fechaHoraInicio,DATE_ADD(cur_fechaHoraInicio, INTERVAL cur_minutosAtencion minute), cur_minutosAtencion);
    		  SET cur_fechaHoraInicio = DATE_ADD(cur_fechaHoraInicio, INTERVAL cur_minutosAtencion minute);
			END WHILE;
     END LOOP;
     CLOSE cursor_i;
     END;
                  
SELECT 
H.idHorario, 
H.idMedico, 
S.descripcion as descSede, 
E.descripcion as descEspecialidad,
CONCAT(PER.apePaterno,' ',PER.ApeMaterno,' ',PER.nombres)medico,
TEM.fechaHoraInicio, concat( DATE_FORMAT(TEM.fechaHoraInicio,'%H:%i'),' - ',DATE_FORMAT(TEM.fechaHoraFin,'%H:%i'))fechaHora,
'success'status
FROM tmpHorario TEM
INNER JOIN horario H ON H.idHorario=TEM.idHorario
INNER JOIN medico M ON M.idMedico=H.idMedico
INNER JOIN persona PER ON PER.idPersona=M.idPersona
INNER JOIN especialidad E ON E.idEspecialidad=M.idEspecialidad
INNER JOIN sede S ON S.idSede=E.idSede
WHERE NOT EXISTS (SELECT 1 FROM citas C WHERE C.idHorario=TEM.idHorario 
				 AND C.fechaHoraCita=TEM.fechaHoraInicio
                 )
AND TEM.fechaHoraInicio>NOW()
ORDER BY TEM.fechaHoraInicio;

END;



;;


DROP PROCEDURE IF EXISTS sp_generaPaciente;
DELIMITER ;;
CREATE PROCEDURE sp_generaPaciente(
IN p_idPersona int, 
IN p_HC VARCHAR(10), 
IN p_estado VARCHAR(1)
)
BEGIN

BEGIN

      DECLARE l_existe INT;
      DECLARE l_existe_usuario INT;
      DECLARE l_existe_documento INT;
      DECLARE l_idPersona INT;
      DECLARE l_hc int;
      
       SET l_existe = (SELECT count(*) FROM paciente P WHERE P.idPersona=p_idPersona and P.estado<>0);
       
       if l_existe=0 then
		 set l_hc = (SELECT MAX(HC)+1 FROM paciente PAC);
		 
		 INSERT into paciente (idPersona,HC,estado)VALUES(p_idPersona,l_hc,p_estado);
		 
     end if;
     
END;
        

END;



;;


DROP PROCEDURE IF EXISTS sp_generaPersona;
DELIMITER ;;
CREATE PROCEDURE sp_generaPersona(
IN p_tip VARCHAR(20), 
IN p_documento VARCHAR(20), 
IN p_apePaterno VARCHAR(20), 
IN p_apeMaterno VARCHAR(20), 
IN p_nombres VARCHAR(20), 
IN p_fechaNacimiento VARCHAR(20), 
IN p_sexo VARCHAR(20), 
IN p_correo VARCHAR(20),
IN p_idPersona int
)
BEGIN

BEGIN

      DECLARE l_existe INT;
      DECLARE l_existe_usuario INT;
      DECLARE l_existe_documento INT;
      DECLARE l_idPersona INT;
      DECLARE l_hc int;
          
          if (p_tip = "INS") then
       
           SET l_existe = (SELECT count(*) FROM persona P WHERE P.correo=p_correo and P.estado<>0);
           SET l_existe_documento = (SELECT count(*) FROM persona P WHERE P.documento=p_documento and P.estado<>0);
       
          if l_existe=0 then
                 
          if(l_existe_documento=0) then
          
				INSERT INTO persona
				(
				documento,
				apePaterno,
				apeMaterno,
				nombres,
				fechaNacimiento,
				sexo,
				correo,
				estado,
				usuarioReg,
				fechaReg)
				VALUES
				(
				P_documento,
				P_apePaterno,
				P_apeMaterno,
				P_nombres,
				P_fechaNacimiento,
				P_sexo,
				P_correo,
				1,
				null,
				now()
				);
                
                 end if;       
			
            end if;
     
			END IF;
            
             if (p_tip = "MOD") then
             
              SET l_existe = (SELECT count(*) FROM persona P WHERE P.correo=p_correo and P.estado<>0 AND P.idPersona<>p_idPersona);
			  SET l_existe_documento = (SELECT count(*) FROM persona P WHERE P.documento=p_documento and P.estado<>0 AND P.idPersona<>p_idPersona);
       
                 if l_existe=0 then
                 
          if(l_existe_documento=0) then
             UPDATE persona SET 
						documento = P_documento,
						apePaterno = P_apePaterno,
						apeMaterno = P_apeMaterno,
						nombres = P_nombres,
						fechaNacimiento = P_fechaNacimiento,
						sexo = P_sexo,
						correo = P_correo
						WHERE idPersona = p_idPersona;
                        end if;       
			
            end if;
                        
                        
			END IF;
END;

END;




