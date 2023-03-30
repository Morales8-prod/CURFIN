<?php
     /* *************************************************** */

    //INSERTA UNA NUEVA SUBVENCION
    /* 
      @miPDO  Conexión base de datos
      @descripcion_subvenciones (VARCHAR)
      @entidad_solicitada (VARCHAR)
      @tipo_de_organismo (VARCHAR)
      @importe_publicado (FLOAT)
      @fecha_creacion (DATE)
    */
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
    /* 
      @miPDO  conexión base de datos
      @id_subvenciones (INT)
    */
    function mostrar_subvencion($miPDO,$id_subvenciones){
      $miConsulta = $miPDO->prepare("SELECT * FROM subvenciones WHERE id_subvenciones = $id_subvenciones;");
      $miConsulta->execute();
      $resultado = $miConsulta->fetch();
      return $resultado;
    }

    //MUESTRA TODAS LAS SUBVENCIONES EN UNA ARRAY DE ARRAY
     /* 
      @miPDO  conexión base de datos
    */
    function mostrar_subvenciones($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM V_SUBVENCIONES ORDER BY id_subvenciones DESC;");
      $miConsulta->execute();
      $resultado = $miConsulta->fetchAll();
      return $resultado;
    }

    //MODIFCA UNA SUBVENCION
    /* 
      @miPDO Conexión a la base de datos
      @id_subvenciones (INT)
      @descripcion_subvenciones (VARCHAR)
      @entidad_solicitada (VARCHAR)
      @tipo_de_organismo (VARCHAR)
      @importe_publicado (FLOAT)
      @id_proyectos (INT)
      @fecha_creacion (DATE)
      @fecha_planteada (DATE)
      @fecha_presentada (DATE)
      @fecha_provisional (DATE)
      @fecha_definitiva (DATE)
      @fecha_justificada (DATE)
      @importe_solicitado (FLOAT)
      @importe_proyecto (FLOAT)
      @importe_concedido (FLOAT)
    */
    function modificar_subvenciones($miPDO,$id_subvenciones, $descripcion_subvenciones, $entidad_solicitada, $tipo_de_organismo, $importe_publicado,$id_proyectos, $fecha_creacion,$fecha_planteada, $fecha_presentada, $fecha_provisional, $fecha_definitiva, $fecha_justificada, $importe_solicitado, $importe_proyecto, $importe_concedido){

      if ($id_subvenciones == NULL || $descripcion_subvenciones== NULL || $entidad_solicitada== NULL || $importe_publicado== NULL ) {
          return 'Faltan parametros';
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
    /* 
      @miPDO Conexión a la base de datos
      @fecha_definitiva (DATE)
      @importe_concedido (FLOAT)
      @fecha_justificacion (DATE)
      @id_subvenciones (INT)
    */
    function update_subvenciones_definitivo($miPDO,$fecha_definitiva,$importe_concedido,$fecha_justificacion,$id_subvenciones){
      $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_definitiva = '$fecha_definitiva', importe_concedido = $importe_concedido, fecha_justificacion = '$fecha_justificacion', 
      estado_subvencion = 'Definitivo'WHERE id_subvenciones = $id_subvenciones;");
      $miConsulta->execute();
    }
    //UPDATE SUBVENCIONES: ESTADO JUSTIFICADO
    /* 
      @miPDO Conexión a la base de datos
      @fecha_justificada (DATE)
      @id_subvenciones (INT)
    */
    function update_subvenciones_justificado($miPDO,$fecha_justificada,$id_subvenciones){
        $miConsulta = $miPDO->prepare(" UPDATE subvenciones SET fecha_justificada = '$fecha_justificada', estado_subvencion = 'Justificado'
        WHERE id_subvenciones = $id_subvenciones;");
        $miConsulta->execute();
    }
    //UPDATE SUBVENCIONES: ESTADO PROVISIONAL
     /* 
      @miPDO Conexión a la base de datos
      @fecha_provisional (DATE)
      @importe_concedido (FLOAT)
      @id_subvenciones (INT)
    */
    function update_subvenciones_provisional($miPDO,$fecha_provisional,$importe_concedido,$id_subvenciones){
        $miConsulta = $miPDO->prepare(" UPDATE subvenciones SET fecha_provisional = '$fecha_provisional', importe_concedido = $importe_concedido, estado_subvencion = 'Provisional'
        WHERE id_subvenciones = $id_subvenciones;");
        $miConsulta->execute();
    }
    //UPDATE SUBVENCIONES: ESTADO PRESENTADO
     /* 
      @miPDO Conexión a la base de datos
      @fecha_presentada (DATE)
      @importe_solicitado(FLOAT)
      @expediente_gestiona (VARCHAR)
      @id_subvenciones (INT)
    */
    function update_subvenciones_presentado($miPDO,$fecha_presentada,$importe_solicitado,$expediente_gestiona,$id_subvenciones){
        $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_presentada = '$fecha_presentada', importe_solicitado = $importe_solicitado, estado_subvencion = 'Presentado', expediente_gestiona = '$expediente_gestiona' WHERE id_subvenciones = $id_subvenciones;");
        $miConsulta->execute();
    }

    /* *************************************************** */

    //CREAR LINEA PROYECTOS 
     /* 
      @miPDO Conexión a la base de datos
      @linea_proyecto (INT)
      @descripcion_proyectos (VARCHAR)
      @importe_proyectos (FLOAT)
      @fecha_provisional (DATE)
      @id_proyectos (INT)
    */
    function insertar_lineaProyectos($miPDO,$linea_proyecto,$descripcion_proyectos,$importe_proyectos, $fecha_provisional){  
          
      //sentencia sql de insertar datos en subvenciones
        $miConsulta = $miPDO->prepare("INSERT INTO linea_proyectos (id_proyectos, linea_proyecto, descripcion_proyectos, importe_proyectos, fecha_provisional ) 
        VALUES (default, '$linea_proyecto', '$descripcion_proyectos',  '$importe_proyectos', '$fecha_provisional');
        ");  
        $miConsulta->execute();
        //if($descripcion_subvenciones || $entidad_solicitada || $entidad_solicitada||$tipo_de_organismo|| $importe_publicado == NULL){return 0;}
        
        return 1;
        header("Location: ../../index.php");

        
    }
    //MOSTRAR LINEA PROYECTOS
     /* 
      @miPDO  conexión base de datos
    */
    function mostrar_lineaProyectos($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM linea_proyectos;");
      $miConsulta->execute();
    }
    //MODIFICAR LINEA PROYECTOS
     /* 
      @miPDO  conexión base de datos
      @id_proyectos (INT)
      @linea_proyecto (INT)
      @descripcion_proyectos (VARCHAR)
      @importe_proyectos (FLOAT)
      @fecha_provisional (DATE)
    */
  
    function modificar_linea_proyectos($miPDO, $id_proyectos, $linea_proyecto, $descripcion_proyectos, $importe_proyectos, $fecha_provisional){

      if ($id_proyectos == NULL || $linea_proyecto== NULL || $descripcion_proyectos== NULL || $importe_proyectos== NULL || $fecha_provisional == NULL) {
          return 'Faltan parametros';
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE linea_proyectos SET linea_proyecto = '$linea_proyecto', descripcion_proyectos = $descripcion_proyectos, importe_proyectos = $importe_proyectos, fecha_provisional = $fecha_provisional WHERE id_proyectos = $id_proyectos;");

      // Ejecuta consulta
      $miConsulta->execute();

      return 1;    
      }
    };

    /* *************************************************** */

    //INSERTA UNA NUEVA CONFIGURACION
      /* 
      @miPDO  conexión base de datos
      @parametro (VARCHAR)
      @descripcion (VARCHAR)
      @valor(VARCHAR)
      @usuario (VARCHAR)
    */
    
    function insertar_configuracion( $miPDO, $parametro, $descripcion, $valor, $usuario){  
          
          //sentencia sql de insertar datos en CONFIGURACION
            $miConsulta = $miPDO->prepare("INSERT INTO configuracion (id, parametro, descripcion, valor, usuario ) 
            VALUES (default, '$parametro', '$descripcion',  '$valor', '$usuario');
            ");  
            $miConsulta->execute();

            
            return 1;
            header("Location: ../../index.php");

            
    }
    //MUESTRA TODOS LOS DATOA DE LA TABLA CONFIGURACION
    /* 
      @miPDO  conexión base de datos
    */
    function mostrar_configuracion($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM configuracion ORDER BY id ASC;");
      $miConsulta->execute();
      $resultado=$miConsulta->fetchAll();
      return $resultado;
    }
    //MODIFICA LOS DATOS DE LA TABLA CONFIGURACION
    /* 
      @miPDO  conexión base de datos
      @id (INT)
      @parametro (VARCHAR)
      @descripcion (VARCHAR)
      @valor(VARCHAR)
      @usuario (VARCHAR)
    */
    function modificar_configuracion($miPDO, $id, $valor){

      if ($valor== NULL || $id== NULL ) {
          return 'Faltan parametros';
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE configuracion SET valor = $valor WHERE id = $id;");
  
      // Ejecuta consulta
      $miConsulta->execute();
  
      return 1;    
      }
    };

    /* *************************************************** */




    //UPDATE SUBVENCIONES FECHA PLANEADA A FECHA DE HOY 
    /* 
      @miPDO  conexión base de datos
      @id_subvenciones (INT)
    */
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

    // DATOS DEL FORMULARIO DE PRESENTADA  NO VUELVE
    /* 
      @miPDO  conexión base de datos
      @fecha_presentada (VARCHAR)
      @importe_solicitado (FLOAT)
      @expediente_gestiona(VARCHAR)
      @id_subvenciones(INT)
    */
    function cambio_fase_presentada($miPDO,$fecha_presentada,$importe_solicitado,$expediente_gestiona,$id_subvenciones){
        $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_presentada = '$fecha_presentada', estado_subvencion = 'Presentada', importe_solicitado = $importe_solicitado, expediente_gestiona = '$expediente_gestiona' WHERE id_subvenciones = $id_subvenciones; ");
        $miConsulta->execute();

    }


    // DATOS DEL FORMULARIO DE DEFINITIVA
    /* 
      @miPDO  conexión base de datos
      @importe_concedido (FLOAT)
      @fecha_justificacion (DATE)
      @id_subvenciones (INT)
    */
    function cambio_fase_definitiva($miPDO, $importe_concedido, $fecha_justificacion, $id_subvenciones, $fecha_definitiva){
      
          if ($id_subvenciones == NULL ||   $fecha_definitiva== NULL || $importe_concedido == NULL || $fecha_justificacion == NULL) {
           
            return 'Faltan parametros';
        }else{
            // Prepara UPDATE
             
            $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_definitiva = '$fecha_definitiva', fecha_justificacion = '$fecha_justificacion', importe_concedido = $importe_concedido, estado_subvencion = 'Definitiva' WHERE id_subvenciones = $id_subvenciones;");

            // Ejecuta consulta
            $miConsulta->execute();
            return 1;
        }
        
    }

    // FASE PROVISIONAL
    /* 
      @miPDO  conexión base de datos
      @id_subvenciones (INT)
      @importe_concedido (FLOAT)
      @fecha_provisional (DATE)
    */
    function cambiar_fase_provisional($miPDO, $id_subvenciones, $importe_concedido, $fecha_provisional){

      if ($id_subvenciones == NULL || $importe_concedido== NULL || $fecha_provisional== NULL) {
          return 'Faltan parametros';
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
  /* 
      @miPDO  conexión base de datos
      @id_subvenciones (INT)
      @fecha_justificada (DATE)
    */
    function cambiar_fase_justificada($miPDO, $id_subvenciones, $fecha_justificada){

      if ($id_subvenciones == NULL ||  $fecha_justificada== NULL) {
          return 'Faltan parametros';
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
    /* 
      @miPDO  conexión base de datos
      @id-subvenciones (INT)
    */
    function color_estado($miPDO,$id_subvenciones){
        $miConsulta = $miPDO->prepare("SELECT estado_subvencion FROM subvenciones WHERE id_subvenciones = $id_subvenciones");
        $miConsulta->execute();
        $resultado = $miConsulta->fetchColumn();

        switch ($resultado) {
        
            case 'Justificada':
                return "background-color:#AAECFF; color:black";
            
            case 'Definitiva':
                return "background-color:#AAFFBE; color:black";
              
            default:
                return "text-dark";
        }
    }
  
     /* *************************************************** */


    function color_boton($miPDO,$id_subvenciones){

      $miConsulta = $miPDO->prepare("SELECT estado_subvencion FROM subvenciones WHERE id_subvenciones = $id_subvenciones");
      
      $miConsulta->execute();
      $resultado = $miConsulta->fetchColumn();
          
      switch ($resultado) {
      
        case 'Justificada':
          return "text-white";
      
        case 'Definitiva':
          return "text-white";
      
      }
      
      }

    /* *************************************************** */
 
    //FUNCIONES GASTOS
    /* 
      @miPDO  conexión base de datos
      @descripcion_gastos (VARCHAR)
      @gasto_previsto (FLOAT)
      @gasto_realizado_anio (FLOAT)
      @gasto_realizado_CF (FLOAT)
      @aplicacion_presupuestada (VARCHAR)
    */

    //INSERTAR GASTOS
    function insertar_gastos($miPDO, $descripcion_gastos,$gasto_previsto,$gasto_realizado_anio, $gasto_realizado_CF, $aplicacion_presupuestada){  
      
      //sentencia sql de insertar datos en GASTOS
        $miConsulta = $miPDO->prepare("INSERT INTO gastos (idgastos, descripcion_gastos, gasto_previsto, gasto_realizado_anio, gasto_realizado_CF, aplicacion_presupuestada ) 
        VALUES (default, '$descripcion_gastos', $gasto_previsto,  $gasto_realizado_anio, $gasto_realizado_CF, '$aplicacion_presupuestada');
        ");  
        $miConsulta->execute();

        
        return 1;
        header("Location: ../../index.php");

        
    }
    //MOSTRAR GASTOS

    /* @miPDO Conexion con la base de datos*/

    function mostrar_gastos($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM gastos;");
      $miConsulta->execute();
    }

    //MODIFICAR GASTOS
    
    /* 
      @miPDO Conexion con la base de datos
      @idgastos (INT)
      @descripcion_gastos (VARCHAR)
      @gasto_previsto (FLOAT)
      @gasto_realizado_anio (FLOAT)
      @gasto_realizado_CF (FLOAT)
      @aplicacion_presupuestada (VARCHAR)

    */
    function modificar_gastos($miPDO, $idgastos, $descripcion_gastos, $gasto_previsto, $gasto_realizado_anio, $gasto_realizado_CF, $aplicacion_presupuestada){

      if ($idgastos == NULL || $descripcion_gastos== NULL || $gasto_previsto== NULL || $gasto_realizado_anio== NULL || $gasto_realizado_CF == NULL || $aplicacion_presupuestada == NULL) {
          return 'Faltan parametros';
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE gastos SET descripcion_gastos = '$descripcion_gastos', gasto_previsto = $gasto_previsto, gasto_realizado_anio = $gasto_realizado_anio, gasto_realizado_CF = $gasto_realizado_CF, aplicacion_presupuestada = '$aplicacion_presupuestada' WHERE idgastos = $idgastos;");
  
      // Ejecuta consulta
      $miConsulta->execute();
  
      return 1;    
      }
    };

    /* *************************************************** */
 
    //FUNCIONES PROYECTOS
    /* 
      @miPDO Conexion con la base de datos
      @nombre_proyectos (VARCHAR)
      @concejal (VARCHAR)
      @fecha_proyectos (DATE)

    */

    //INSERTAR PROYECTOS
    function insertar_proyectos($miPDO, $nombre_proyectos,$concejal,$fecha_proyectos){  
      
      //sentencia sql de insertar datos en subvenciones
        $miConsulta = $miPDO->prepare("INSERT INTO proyectos (id_proyectos, nombre_proyectos, concejal, fecha_proyectos ) 
        VALUES (default, '$nombre_proyectos', '$concejal',  '$fecha_proyectos');
        ");  
        $miConsulta->execute();
        //if($descripcion_subvenciones || $entidad_solicitada || $entidad_solicitada||$tipo_de_organismo|| $importe_publicado == NULL){return 0;}
        
        return 1;
        header("Location: ../../index.php");

        
    }
    //MOSTRAR PROYECTOS 
    /* 
      @miPDO conexion de la base de datos 
    */
    function mostrar_proyectos($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM proyectos;");
      $miConsulta->execute();
    }
  //MODIFICAR PROYECTOS 
    
    function modificar_proyectos($miPDO, $id_proyectos, $nombre_proyectos, $concejal, $fecha_proyectos){

      if ($id_proyectos == NULL || $nombre_proyectos== NULL || $concejal== NULL || $fecha_proyectos== NULL) {
          return 'Faltan parametros';
      }else{
          // Prepara UPDATE
      $miConsulta = $miPDO->prepare("UPDATE proyectos SET nombre_proyectos = '$nombre_proyectos', concejal = $concejal, fecha_proyectos = $fecha_proyectos WHERE id_proyectos = $id_proyectos;");
  
      // Ejecuta consulta
      $miConsulta->execute();
  
      return 1;    
      }
    }

    /* *************************************************** */
  

    function array_fases($miPDO,$id_subvenciones){

      $miConsulta = $miPDO->prepare("SELECT estado_subvencion FROM subvenciones WHERE id_subvenciones = $id_subvenciones;");
      $miConsulta->execute();
      $resultado = $miConsulta->fetchColumn();

          switch ($resultado) {
              case 'Planteada':
                      $array = ["Presentada","Provisional", "Definitiva","Justificada"];
                      return $array;
                  break;

              case 'Presentada':
                   $array = ["Provisional", "Definitiva","Justificada"];
                   return $array;
              break;

              case 'Provisional':
                  $array = ["Definitiva","Justificada"];
                  return $array;
              break;

              case 'Definitiva':
                  $array = ["Justificada"];
                  return $array;
              break;

              case 'Justificada':
                $array = [];
                return null;
            break;
                  
              default:
              $array = ["Planteada" , "Presentada", "Provisional", "Definitiva"];
              return $array;
                  break;
           }
    }




?>