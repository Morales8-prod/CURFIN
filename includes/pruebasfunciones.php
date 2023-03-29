<?php
include ("funciones.php");
include "config/database.php";
// prueba funcion insertar 

// insertar_subvencion("pruebas descripcion","junta andalucia","otro",340,'2023-01-01',$miPDO);
//cambiar_fase_provisional($miPDO,29, 30000 , '2023-03-28', 'Provisional');
//cambiar_fase_justificada($miPDO,30, '2023-03-28');
$color_estado = color_estado($miPDO,17);

echo "$color_estado";


?>