<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$direccion="http://10.8.65.5/prueba_talon/registro_rojo.php?nuhsa=" . $nuhsa . "&sexo=" . $sexo_d . "&fnacimiento_rojo=" . $fnacimiento_rojo . "&cnp=" . $cnpprofesional . "&centro=" . $centro;
   
            
    
    
$direccion2="http://10.8.65.5/botonrojo/pluripatologicos.php?nuhsa=" . $nuhsa 
        . "&clavemedica=" . $clavemedica . "&centro=" 
        . $centro . "&perfilProfesional=" . $perfilProfesional 
        . "&codigooperador=" . $codigooperador . "&cnpprofesional=" . $cnpprofesional;

 

$direccion3="http://10.8.65.5/botonrojo/hasistenciales.php?nuhsa=" . $nuhsa 
        . "&centro=" . $centro . "&perfilProfesional=" 
        . $perfilProfesional . "&codigooperador=" . $codigooperador 
        . "&cnpprofesional=" . $cnpprofesional;

  
$direccionOK="index.php?nuhsa=AN0000002425"
        . "&centro=21027&perfilProfesional=01" 
        .  "&codigooperador=1258&sexo=1"
        . "&cnpprofesional=00015161718&fnacimiento=10/05/1975" ;


?>

<html>
    <body>
        <a href="<?php echo $direccionOK; ?>"/>
         INICIAR PASO DE PARAMETROS
       </a>
    </body>    
    
</html>    