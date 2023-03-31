
<?php

function mostrar_subvenciones($miPDO, $filtrado){
    $filtrado;
    // $miConsulta = $miPDO->prepare("SELECT * FROM V_SUBVENCIONES WHERE estado_subvencion = $estado_subvencion;");
    // $miConsulta->execute();
    // $resultado = $miConsulta->fetchAll();
    //   return $resultado;


    switch ($filtrado) {
        case 'Justificada':
            $miConsulta = $miPDO->prepare("SELECT * FROM V_SUBVENCIONES WHERE estado_subvencion = 'Justificada';");
            $miConsulta->execute();
            $resultado = $miConsulta->fetchAll();
            return $resultado;
            break;
        case 'Definitiva':
            $miConsulta = $miPDO->prepare("SELECT * FROM V_SUBVENCIONES WHERE estado_subvencion = 'Definitiva';");
            $miConsulta->execute();
            $resultado = $miConsulta->fetchAll();
            return $resultado;
            break;
        
        default:
         echo "SELECT * FROM V_SUBVENCIONES WHERE estado_subvencion = $estado_subvencion;";
          
    }

}





?>