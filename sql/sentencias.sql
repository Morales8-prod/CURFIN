
--TABLA SUBVENCIONES
--SELECT

SELECT * FROM V_SUBVENCIONES;

-- INSERT INTO


INSERT INTO subvenciones(id_subvenciones, descripcion_subvenciones, entidad_solicitada, tipo_de_organismo, importe_publicado, fecha_creacion) 
VALUES (default, '$descripcion_subvenciones', '$entidad_solicitada',  '$tipo_de_organismo', $importe_publicado, '$fecha_creacion');

--UPDATE MODIFICAR
UPDATE 
subvenciones

SET 
descripcion_subvenciones = '$descripcion_subvenciones',
entidad_solicitada = '$entidad_solicitada',
tipo de organismo = '$tipo de organismo',
importe_publicado = $importe_publicado,
fecha_creacion = '$fecha_creacion',
fecha_planteada = '$fecha_planteada',
fecha_presentada = '$fecha_presentada',
fecha_provisional = '$fecha_provisional',
fecha_definitiva = '$fecha_definitiva',
fecha_justificacion = '$fecha_justificacion',
fecha_justificada = '$fecha_justificada',
importe_solicitado = $importe_solicitado,
importe_proyecto = $importe_proyecto,
importe_concedido = $importe_concedido,
estado_subvencion = '$estado_subvencion',
expediente_gestiona = '$expediente_gestiona'
id_proyectos = $id_proyectos

WHERE 
id_subvenciones = $id_subvenciones;

--UPDATE SUBVENCIONES: ESTADO PRESENTADO
UPDATE subvenciones SET fecha_presentada = '$fecha_presentada', importe_solicitado = $importe_solicitado, estado_subvencion = 'Presentado', expediente_gestiona = '$expediente_gestiona'
WHERE id_subvenciones = $id_subvenciones;


--UPDATE SUBVENCIONES: ESTADO PROVISIONAL
UPDATE subvenciones SET fecha_provisional = '$fecha_provisional', importe_concedido = $importe_concedido, estado_subvencion = 'Provisional'
WHERE id_subvenciones = $id_subvenciones;


--UPDATE SUBVENCIONES: ESTADO DEFINITIVO
UPDATE subvenciones SET fecha_definitiva = '$fecha_definitiva', importe_concedido = $importe_concedido, fecha_justificacion = '$fecha_justificacion', 
estado_subvencion = 'Definitivo'
WHERE id_subvenciones = $id_subvenciones;

--UPDATE SUBVENCIONES: ESTADO JUSTIFICADO
UPDATE subvenciones SET fecha_justificada = '$fecha_justificada', estado_subvencion = 'Justificado'
WHERE id_subvenciones = $id_subvenciones;
--
--
--
--SUBVENCIONES PLAZO JUSTIFICACION DEVUELVE 0-1
-- 1 SI EL PLAZO ESTA EN VIGOR
-- 0  SI EL PLAZO DE JUSTIFICACION HA CUMPLIDO
SELECT *,if(ISNULL (FECHA_JUSTIFICACION),0,(DATEDIFF(fecha_justificacion, CURDATE())<(SELECT VALOR FROM configuracion WHERE PARAMETRO='aviso_fin_justificacion'))) alerta_justificacion FROM subvenciones;


--SUBVENCIONES AVISO_PRESENTAR DEVUELVE 0-1
-- 1 SI EL PLAZO ESTA EN VIGOR
-- 0  SI EL PLAZO DE JUSTIFICACION HA CUMPLIDO
SELECT *, if(ISNULL(fecha_presentada),(if(ISNULL(fecha_planteada),0,if((fecha_planteada=0000-00-00),0,((DATEDIFF(CURDATE(), fecha_planteada))>(SELECT VALOR FROM configuracion WHERE PARAMETRO='aviso_sinpresentar_subvencion'))))), 0) aviso_presentar FROM subvenciones;


--SUBVENCIONES AVISO_ESPERA DEVUELVE 0-1
-- 1 SI EL PLAZO ESTA EN VIGOR
-- 0  SI EL PLAZO DE JUSTIFICACION HA CUMPLIDO
SELECT *, if(ISNULL(fecha_planteada),(if((fecha_creacion=0000-00-00),0,((DATEDIFF(CURDATE(), fecha_creacion))>(SELECT VALOR FROM configuracion WHERE PARAMETRO='aviso_espera_subvencion')))), 0) aviso_espera FROM subvenciones 

--FORMATEO COLUMNA IMPORTE CONCEDIDO
SELECT FORMAT(importe_concedido, 2, 'es_ES') AS ImporteConcedido_formt

--PROYECTOOOOOOOS

--SELECT
SELECT * FROM proyectos;

--INSERT INTO proyectos
INSERT INTO proyectos(id_proyectos, nombre_proyectos, concejal, fecha_proyectos) VALUES (default, '$nombre_proyectos', '$concejal', '$fecha_proyectos');

--LINEA PROYECTO
SELECT * FROM linea_proyecto;

--INSERT INTO linea proyectos
INSERT INTO linea_proyectos(id_proyectos, linea_proyecto, descripcion_proyectos, importe_proyectos, fecha_provisional) VALUES ($id_proyectos, $linea_proyecto, '$descripcion_proyectos', $importe_proyectos, '$fecha_provisional');

UPDATE linea_proyectos SET linea_proyecto = $linea_proyecto, descripcion_proyectos = '$descripcion_proyectos', importe_proyectos = $importe_proyectos, fecha_provisional = '$fecha_provisional' WHERE (idproyectos = $idproyectos) AND (linea_proyectos = $linea_proyectos);



--ATENCION PARA EQUIPO DE PHP, 
--LINEA DE PROYECTOS NO ES AUTOINCREMENTAL EN LA BASE DE DATOS, 
--NO PUEDE SERLO, SIN EMBARGO DEBE ENTRAR AUTOINCREMENTADO 
--CADA VEZ QUE SE REGISTRE UNA LINEA NUEVA EN CADA PROYECTO
--REALIZAR UNA FUNCION DONDE SE AUTOINCREMENTE EL VALOR DE LINEA PROYECYO.