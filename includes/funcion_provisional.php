<?php
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
?>