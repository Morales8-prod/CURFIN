<select name="select">
    <?php 

include ("config/database.php");

    $id_subvenciones = 30;
    $resultado=array_fases($miPDO,$id_subvenciones);
    $value = 1;


        foreach($resultado as $a){
            /* <option value="Planteada">Planteada</option> */
            echo '<option value="'.$a.'" >'.$a.' </option>';
            $value++;
        }
  
    ?>
  
</select>


<?php

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
                    
                default:
                $array = ["","Planteada" , "Presentada", "Provisional", "Definitiva"];
                return $array;
                    break;
    }



/*
        $arrayEstados = ["","Planteada" , "Presentada", "Provisional", "Definitiva"];
        $arraCortado = ( array_slice($arrayEstados, $id_subvenciones));
        return $arraCortado;*/

    }
    
?>
