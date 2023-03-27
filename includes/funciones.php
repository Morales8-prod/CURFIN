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

    /*function borrar_subvenciones($id_subvenciones,$miPDO){

     
      //sentencia sql para mover la subvencion que queremos borrar
      $miConsulta = $miPDO->prepare("");
      $miConsulta->execute();

      //sentencia sql para borrar una subenvion
      $miConsulta = $miPDO->prepare("");
      $miConsulta->execute();

      if($id_subvenciones == NULL){return 0;}
  
      return 1;
      
    }*/
