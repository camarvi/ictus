<?php

require_once ('config.php');
require_once ('classes/Ficha.class.php');
require_once ('classes/Comp_Seguro.class.php');
require_once ('classes/Tipo_Acc_Circulacion.class.php');
require_once ('classes/Tipo_Autoridad.class.php');
require_once ('classes/Tipo_Parte_acc.class.php');
require_once ('classes/Tipo_consulta_c3.class.php');
require_once ('classes/Centros.class.php');
require_once ('classes/Usuarios.class.php');



    function displayPageHeader($pageTitle,$membersArea=false){
?>

        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
         <html xmlns="http://www.w3.org/1999/xhtml">

             <head>
                 <title><?php echo $pageTitle?></title>
                 <link rel="stylesheet" type="text/css" href="<?php if ($membersArea)
                     echo "../" ?>../common.css" />
                 <style type="text/css">
                     th {text-align: left;background-color: #bbb;}
                     th,td {padding: 0.4em;}
                     tr.alt td {background: #ddd;}
                        .error {background: #d33; color: white;padding: 0.2em;}
                 </style>

             </head>   

             <body>

                 <h1><?php echo $pageTitle?></h1>
 <?php
    }

   

 ?>

 <?php
    function validateField($fieldName,$missingFields) {
        if (in_array($fieldName, $missingFields)) {
            echo ' class="error"';
        }
    }

    function setChecked(DataObject $obj,$fieldName,$fieldValue) {
        if ($obj->getValue($fieldName)==$fieldValue) {
            echo ' checked="checked"';
        }
    }

    function setSelected(DataObject $obj,$fieldName,$fieldValue) {
        if ($obj->getValue($fieldName)==$fieldValue){
            echo ' selected="selected"';
        }

    }

    function compruebaUsuario(){
        session_start();
        fixObject($_SESSION['usuario']);
         if (!$_SESSION["usuario"]){
            // $_SERVER["usuario"]="";
             echo '<script>document.location = "login.php"</script>';

         }

    }

 
   

 function fixObject (&$object)
{
  if (!is_object ($object) && gettype ($object) == 'object')
    return ($object = unserialize (serialize ($object)));
  return $object;
}


 

?>