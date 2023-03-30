<?php

function cambio_fase_presentada($miPDO,$fecha_presentada,$importe_solicitado,$expediente_gestiona,$id_subvenciones){
        $miConsulta = $miPDO->prepare("UPDATE subvenciones SET fecha_presentada = '$fecha_presentada',estado_subvencion = 'Presentada', importe_solicitado = $importe_solicitado, expediente_gestiona = '$expediente_gestiona' WHERE id_subvenciones = $id_subvenciones; ");
        $miConsulta->execute();

    }

 ?>   