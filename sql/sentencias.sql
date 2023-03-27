
--TABLA SUBVENCIONES
--SELECT

SELECT * FROM subvenciones;

-- INSERT INTO


INSERT INTO subvenciones(id_subvenciones, descripcion_subvenciones, entidad_solicitada, tipo_de_organismo, importe_publicado, fecha_creacion) 
VALUES (default, '$descripcion_subvenciones', '$entidad_solicitada',  '$tipo_de_organismo', $importe_publicado, '$fecha_creacion');

--UPDATE
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
fecha_justificada = '$fecha_justificada',
fecha_ingreso = '$fecha_ingreso',
importe_solicitado = $importe_solicitado,
importe_proyecto = $importe_proyecto,
importe_concedido = $importe_concedido,
importe_ingresado = $importe_ingresado,
importe_pagado = $importe_pagado,
id_proyectos = $id_proyectos

WHERE 
id_subvenciones = $id_subvenciones;

--