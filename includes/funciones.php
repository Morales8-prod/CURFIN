<?php
     /* *************************************************** */

    //INSERTA UNA NUEVA SUBVENCION
    function insertar_subvencion($miPDO,$descripcion_subvenciones,$entidad_solicitada,$tipo_de_organismo,$importe_publicado,$fecha_creacion){  
      
      //sentencia sql de insertar datos en subvenciones
        $miConsulta = $miPDO->prepare("INSERT INTO subvenciones(id_subvenciones, descripcion_subvenciones, entidad_solicitada, tipo_de_organismo, importe_publicado, fecha_creacion) 
        VALUES (default, '$descripcion_subvenciones', '$entidad_solicitada',  '$tipo_de_organismo', $importe_publicado, '$fecha_creacion');
        ");  
        $miConsulta->execute();
        //if($descripcion_subvenciones || $entidad_solicitada || $entidad_solicitada||$tipo_de_organismo|| $importe_publicado == NULL){return 0;}
        
        return 1;
        
    }
    //MUESTRA UNA SOLA SUBVENCION
    function mostrar_subvencion($miPDO,$id_subvenciones){
      $miConsulta = $miPDO->prepare("SELECT * FROM subvenciones WHERE id_subvenciones = $id_subvenciones;");
      $miConsulta->execute();
      $resultado = $miConsulta->fetch();
      return $resultado;
    }

    //MUESTRA TODAS LAS SUBVENCIONES EN UNA ARRAY DE ARRAY
    function mostrar_subvenciones($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM V_SUBVENCIONES");
      $miConsulta->execute();
      $resultado = $miConsulta->fetchAll();
      return $resultado;
    }

    //MODIFCA UNA SUBVENCION
    function modificar_subvenciones($miPDO,$id_subvenciones, $descripcion_subvenciones, $entidad_solicitada, $tipo_de_organismo, $importe_publicado, $tipo_entidad,$id_proyectos, $fecha_creacion,$fecha_planteada, $fecha_presentada, $fecha_provisional, $fecha_definitiva, $fecha_justificada, $fecha_ingreso, $importe_solicitado, $importe_proyecto, $importe_concedido, $importe_ingresado, $importe_pagado){

      if ($id_subvenciones == NULL || $descripcion_subvenciones== NULL || $entidad_solicitada== NULL || $importe_publicado== NULL || $tipo_entidad == NULL ) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE subvenciones SET descripcion_subvenciones = '$descripcion_subvenciones', entidad_solicitada = $entidad_solicitada, importe_publicado = $importe_publicado WHERE id_subvenciones = $id_subvenciones;");
  
      // Ejecuta consulta
      $miConsulta->execute();
      return 1;    
      }
    }

    /* *************************************************** */

    //UPDATE SUBVENCIONES: ESTADO DEFINITIVO
    function update_subvenciones_definitivo($miPDO,$fecha_definitiva,$importe_concedido,$fecha_justificacion,$id_subvenciones){
      $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_definitiva = '$fecha_definitiva', importe_concedido = $importe_concedido, fecha_justificacion = '$fecha_justificacion', 
      estado_subvencion = 'Definitivo'WHERE id_subvenciones = $id_subvenciones;");
      $miConsulta->execute();
    }
    //UPDATE SUBVENCIONES: ESTADO JUSTIFICADO
    function update_subvenciones_justificado($miPDO,$fecha_justificada,$id_subvenciones){
        $miConsulta = $miPDO->prepare(" UPDATE subvenciones SET fecha_justificada = '$fecha_justificada', estado_subvencion = 'Justificado'
        WHERE id_subvenciones = $id_subvenciones;");
        $miConsulta->execute();
    }
    //UPDATE SUBVENCIONES: ESTADO PROVISIONAL
    function update_subvenciones_provisional($miPDO,$fecha_provisional,$importe_concedido,$id_subvenciones){
        $miConsulta = $miPDO->prepare(" UPDATE subvenciones SET fecha_provisional = '$fecha_provisional', importe_concedido = $importe_concedido, estado_subvencion = 'Provisional'
        WHERE id_subvenciones = $id_subvenciones;");
        $miConsulta->execute();
    }
    //UPDATE SUBVENCIONES: ESTADO PRESENTADO
    function update_subvenciones_presentado($miPDO,$fecha_presentada,$importe_solicitado,$expediente_gestiona,$id_subvenciones){
        $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_presentada = '$fecha_presentada', importe_solicitado = $importe_solicitado, estado_subvencion = 'Presentado', expediente_gestiona = '$expediente_gestiona' WHERE id_subvenciones = $id_subvenciones;");
        $miConsulta->execute();
    }

    /* *************************************************** */

    //CREAR LINEA PROYECTOS 
    function insertar_lineaProyectos($miPDO,$linea_proyecto,$descripcion_proyectos,$importe_proyectos, $fecha_provisional){  
          
      //sentencia sql de insertar datos en subvenciones
        $miConsulta = $miPDO->prepare("INSERT INTO linea_proyectos (idproyectos, linea_proyecto, descripcion_proyectos, importe_proyectos, fecha_provisional ) 
        VALUES (default, '$linea_proyecto', '$descripcion_proyectos',  '$importe_proyectos', '$fecha_provisional');
        ");  
        $miConsulta->execute();
        //if($descripcion_subvenciones || $entidad_solicitada || $entidad_solicitada||$tipo_de_organismo|| $importe_publicado == NULL){return 0;}
        
        return 1;
        header("Location: ../../index.php");

        
    }
    //MOSTRAR LINEA PROYECTOS
    function mostrar_lineaProyectos($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM linea_proyectos;");
      $miConsulta->execute();
    }
    //MODIFICAR LINEA PROYECTOS
    function modificar_linea_proyectos($miPDO, $idproyectos, $linea_proyecto, $descripcion_proyectos, $importe_proyectos, $fecha_provisional){

      if ($idproyectos == NULL || $linea_proyecto== NULL || $descripcion_proyectos== NULL || $importe_proyectos== NULL || $fecha_provisional == NULL) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE linea_proyectos SET linea_proyecto = '$linea_proyecto', descripcion_proyectos = $descripcion_proyectos, importe_proyectos = $importe_proyectos, fecha_provisional = $fecha_provisional WHERE idproyectos = $idproyectos;");

      // Ejecuta consulta
      $miConsulta->execute();

      return 1;    
      }
    };

    /* *************************************************** */

    //INSERTA UNA NUEVA CONFIGURACION
    function insertar_configuracion( $miPDO,$parametro,$descripcion,$valor, $usuario){  
          
          //sentencia sql de insertar datos en CONFIGURACION
            $miConsulta = $miPDO->prepare("INSERT INTO configuracion (id, parametro, descripcion, valor, usuario ) 
            VALUES (default, '$parametro', '$descripcion',  '$valor', '$usuario');
            ");  
            $miConsulta->execute();

            
            return 1;
            header("Location: ../../index.php");

            
    }
    //MUESTRA TODOS LOS DATOA DE LA TABLA CONFIGURACION
    function mostrar_configuracion($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM configuracion;");
      $miConsulta->execute();
    }
    //MODIFICA LOS DATOS DE LA TABLA CONFIGURACION
    function modificar_configuracion($miPDO, $id, $parametro, $descripcion, $valor, $usuario){

      if ($id == NULL || $parametro== NULL || $descripcion== NULL || $valor== NULL || $usuario == NULL) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE configuracion SET parametro = '$parametro', descripcion = $descripcion, valor = $valor, usuario = $usuario WHERE id = $id;");
  
      // Ejecuta consulta
      $miConsulta->execute();
  
      return 1;    
      }
    };

    /* *************************************************** */




    //UPDATE SUBVENCIONES FECHA PLANEADA A FECHA DE HOY 
    function cambiar_fase_planteada($miPDO,$id_subvenciones){
      $hoy = getdate();

      $mes = $hoy['mon'];
      $dia = $hoy['mday'];
      $anio = $hoy['year'];

      $fecha_planteada = $anio ."-". $mes."-". $dia;
      
      $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_planteada = '$fecha_planteada', estado_subvencion = 'Planteada' WHERE id_subvenciones = $id_subvenciones;");
      $miConsulta->execute();
    }




    /* *************************************************** */

    // DATOS DEL FORMULARIO DE PRESENTADA
    function cambio_fase_presentada($miPDO,$fecha_presentada,$importe_solicitado,$expediente_gestora,$id_subvenciones){
        $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_presentada = '$fecha_presentada',estado_subvencion = 'Presentada', importe_solicitado = '$importe_solicitado', expediente_gestora = '$expediente_gestora' WHERE id_subvenciones = $id_subvenciones; ");
        $miConsulta->execute();

    }
    // DATOS DEL FORMULARIO DE DEFINITIVA
    function cambio_fase_definitiva($miPDO,$importe_concedido , $fecha_provisional,$id_subvenciones){
      
        $miConsulta = $miPDO->prepare("UPDATE subvenciones SET importe_concedido = $importe_concedido, fecha_provisional = '$fecha_provisional', estado_subvencion = 'Definitiva' WHERE id_subvenciones = $id_subvenciones;");+
        $miConsulta->execute();
        
    }
    // FASE PROVISIONAL
    function cambiar_fase_provisional($miPDO, $id_subvenciones, $importe_concedido, $fecha_provisional){

      if ($id_subvenciones == NULL || $importe_concedido== NULL || $fecha_provisional== NULL) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE subvenciones SET importe_concedido = $importe_concedido, fecha_provisional = '$fecha_provisional', estado_subvencion = 'Provisional' WHERE id_subvenciones = $id_subvenciones;");
  
      // Ejecuta consulta
      try {
          $miConsulta->execute();
      } catch (PDOException $e) {
          echo "Error: $e";
      }
      
  
      return 1;    
      }
    }
  //FASE JUSTIFICADA
    function cambiar_fase_justificada($miPDO, $id_subvenciones, $fecha_justificada){

      if ($id_subvenciones == NULL ||  $fecha_justificada== NULL) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_justificada = '$fecha_justificada', estado_subvencion = 'Justificada' WHERE id_subvenciones = $id_subvenciones;");

      // Ejecuta consulta
      try {
          $miConsulta->execute();
      } catch (PDOException $e) {
          echo "Error: $e";
      }
      

      return 1;    
      }
    }

    /* *************************************************** */
 
    //CAMBIA EL COLOR DE FONDO SEGUN EL ESTADO DE LA SUBVENCION
    function color_estado($miPDO,$id_subvenciones){
        $miConsulta = $miPDO->prepare("SELECT estado_subvencion FROM subvenciones WHERE id_subvenciones = $id_subvenciones");
        $miConsulta->execute();
        $resultado = $miConsulta->fetchColumn();

        switch ($resultado) {
        
            case 'Justificada':
                return "bg-primary text-white";
            
            case 'Definitivo':
                return "bg-success text-white";             
        }
    }

    /* *************************************************** */
 
    //FUNCIONES GASTOS

    function insertar_gastos($descripcion_gastos,$gasto_previsto,$gasto_realizado_anio, $gasto_realizado_CF, $aplicacion_presupuestada, $miPDO){  
      
      //sentencia sql de insertar datos en GASTOS
        $miConsulta = $miPDO->prepare("INSERT INTO gastos (idgastos, descripcion_gastos, gasto_previsto, gasto_realizado_anio, gasto_realizado_CF, aplicacion_presupuestada ) 
        VALUES (default, '$descripcion_gastos', $gasto_previsto,  $gasto_realizado_anio, $gasto_realizado_CF, '$aplicacion_presupuestada');
        ");  
        $miConsulta->execute();

        
        return 1;
        header("Location: ../../index.php");

        
    }

    function mostrar_gastos($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM gastos;");
      $miConsulta->execute();
    }

    function modificar_gastos($miPDO, $idgastos, $descripcion_gastos, $gasto_previsto, $gasto_realizado_anio, $gasto_realizado_CF, $aplicacion_presupuestada){

      if ($idgastos == NULL || $descripcion_gastos== NULL || $gasto_previsto== NULL || $gasto_realizado_anio== NULL || $gasto_realizado_CF == NULL || $aplicacion_presupuestada == NULL) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE gastos SET descripcion_gastos = '$descripcion_gastos', gasto_previsto = $gasto_previsto, gasto_realizado_anio = $gasto_realizado_anio, gasto_realizado_CF = $gasto_realizado_CF, aplicacion_presupuestada = '$aplicacion_presupuestada' WHERE idgastos = $idgastos;");
  
      // Ejecuta consulta
      $miConsulta->execute();
  
      return 1;    
      }
    };

    /* *************************************************** */
 
    //FUNCIONES GASTOS
    function insertar_proyectos($nombre_proyectos,$concejal,$fecha_proyectos, $miPDO){  
      
      //sentencia sql de insertar datos en subvenciones
        $miConsulta = $miPDO->prepare("INSERT INTO proyectos (id_proyectos, nombre_proyectos, concejal, fecha_proyectos ) 
        VALUES (default, '$nombre_proyectos', '$concejal',  '$fecha_proyectos');
        ");  
        $miConsulta->execute();
        //if($descripcion_subvenciones || $entidad_solicitada || $entidad_solicitada||$tipo_de_organismo|| $importe_publicado == NULL){return 0;}
        
        return 1;
        header("Location: ../../index.php");

        
    }

    function mostrar_proyectos($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM proyectos;");
      $miConsulta->execute();
    }

    function modificar_proyectos($miPDO, $id_proyectos, $nombre_proyectos, $concejal, $fecha_proyectos){

      if ($id_proyectos == NULL || $nombre_proyectos== NULL || $concejal== NULL || $fecha_proyectos== NULL) {
          return 0;
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE proyectos SET nombre_proyectos = '$nombre_proyectos', concejal = $concejal, fecha_proyectos = $fecha_proyectos WHERE id_proyectos = $id_proyectos;");
  
      // Ejecuta consulta
      $miConsulta->execute();
  
      return 1;    
      }
    }

    /* *************************************************** */
  

/*
COSAS QUE NO FUNCIONAN : 
  -



*/




?>