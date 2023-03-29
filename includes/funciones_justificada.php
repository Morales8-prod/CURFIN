<?php
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
?>