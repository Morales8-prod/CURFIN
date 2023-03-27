<?php

  //crear, modificar,borrar, insertar subvenciones 

   function insertar_subvencion($descripcion_subvenciones,$entidad_solicitada,$tipo_de_organismo,$importe_publicado,$fecha_creacion, $miPDO){  
      
      //sentencia sql de insertar datos en subvenciones
        $miConsulta = $miPDO->prepare("INSERT INTO subvenciones(id_subvenciones, descripcion_subvenciones, entidad_solicitada, tipo_de_organismo, importe_publicado, fecha_creacion) 
        VALUES (default, '$descripcion_subvenciones', '$entidad_solicitada',  '$tipo_de_organismo', $importe_publicado, '$fecha_creacion');
        ");  
        $miConsulta->execute();
        //if($descripcion_subvenciones || $entidad_solicitada || $entidad_solicitada||$tipo_de_organismo|| $importe_publicado == NULL){return 0;}
        
        return 1;
        header("Location: ../../index.php");

        
    }
    function mostrar_subvencion($miPDO){
      $miConsulta = $miPDO->prepare("SELECT * FROM subvenciones;");
      $miConsulta->execute();
    }
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
