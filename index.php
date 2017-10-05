<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
CAMBIAR DATOS 
-->

<?php


require_once ("common.inc.php");

//list($listaconsulta_c3)= Tipo_consulta_c3::getTipoConsulta();

   
//LEO LAS VARIABLES QUE ME PASAN POR GET PARA 
//OBTENER LOS DATOS DEL PACIENTE

if (isset ($_GET['nuhsa'])){
   
    $an= $_GET['nuhsa'];   
    $centro=$_GET['centro'];
    $cnp=$_GET['cnpprofesional'];
    $sexo=$_GET['sexo'];
   
    
}



 if (isset ($_POST['registrar'])) {

   
    $an=$_POST['an'];
     
    $centro=$_POST['centro'];
    
    $cnp=$_POST['cnp'];
    
    $sexo=$_POST['sexo'];
    
    if (strlen($_POST["fnacimiento"])){
        $separar1=explode('/',$_POST["fnacimiento"]);
        $dia1=trim($separar1[0]);
        $mes1=trim($separar1[1]);
        $anio1=trim($separar1[2]);
        $fnacimientook=$anio1 . "-" . $mes1 . "-" . $dia1;
      } else {
      $fnacimientook=""; }
    
     $hoy=date("d/m/Y"); 
     $separar =explode('/',$hoy);
        $dia=trim($separar[0]);
        $mes=trim($separar[1]);
        $anio=trim($separar[2]);
     $fecha_ok=$anio . "-" . $mes . "-" . $dia;
     
      
      
    if (isset ($_POST['tiempo'])) { 
        $tiempo=  trim(html_entity_decode($_POST['tiempo'])) ;
        
    }  else {$tiempo=""; }   
    
    
    $despertar= (int) $_POST['despertar']; 
    
    $tra=(int) $_POST['tra'];
    if (isset ($_POST['cifra_tra'])) { 
        $cifra_tra=  trim(html_entity_decode($_POST['cifra_tra'])) ;
        
    }  else {$cifra_tra=""; }   
      
    $glucemia=(int) $_POST['glucemia'];
    if (isset ($_POST['cifra_glucemia'])) { 
        $cifra_glucemia=  trim(html_entity_decode($_POST['cifra_glucemia'])) ;
        
    }  else {$cifra_glucemia=""; }     
      
    $ta=(int) $_POST['ta'];
    if (isset ($_POST['cifra_ta'])) { 
        $cifra_ta=  trim(html_entity_decode($_POST['cifra_ta'])) ;
    }  else {$cifra_ta=""; }       
      
    $oxigeno=(int) $_POST['oxigeno'];
    if (isset ($_POST['cifra_oxigeno'])) { 
        $cifra_oxigeno=  trim(html_entity_decode($_POST['cifra_oxigeno'])) ;
    }  else {$cifra_oxigeno=""; }       
      
    $cardiaca=(int) $_POST['cardiaca'];
    if (isset ($_POST['cifra_cardiaca'])) { 
        $cifra_cardiaca=  trim(html_entity_decode($_POST['cifra_cardiaca'])) ;
    }  else {$cifra_cardiaca=""; }         
    
    $ecg=(int) $_POST['ecg'];
    
    $termoregulacion=(int) $_POST['termoregulacion'];
    
    $antihipertensivo=(int) $_POST['antihipertensivo'];
    if (isset ($_POST['cifra_antihipertensivo'])) { 
        $cifra_antihipertensivo=  trim(html_entity_decode($_POST['cifra_antihipertensivo'])) ;
    }  else {$cifra_antihipertensivo=""; }       
    
    $trat_glucemia=(int) $_POST['trat_glucemia'];
    if (isset ($_POST['cifra_trat_glucemia'])) { 
        $cifra_trat_glucemia=  trim(html_entity_decode($_POST['cifra_trat_glucemia'])) ;
    }  else {$cifra_trat_glucemia=""; }     
    
    $brazo=(int) $_POST['brazo'];
    
    if (isset ($_POST['nihss'])) { 
        $nihss=  trim(html_entity_decode($_POST['nihss'])) ;
    }  else {$nihss=""; }     
    
    if (isset ($_POST['rankin'])) { 
        $rankin=  trim(html_entity_decode($_POST['rankin'])) ;
    }  else {$rankin=""; }  
    
    $activ_ictus=(int) $_POST['activ_ictus'];
    
    $traslado=(int) $_POST['traslado'];
    
    $toxicos=(int) $_POST['toxicos'];
    if (isset ($_POST['texto_toxicos'])) { 
        $texto_toxicos=  trim(html_entity_decode($_POST['texto_toxicos'])) ;
    }  else {$texto_toxicos=""; }    
    
    
    
   
    
    $nuevaficha=new Ficha(array(
        "AN"=>$an,
        "CENTRO"=>$centro,
        "CNP"=>$cnp,
        "SEXO"=>~sexo,
        "FNACIMIENTO"=>$fnacimientook,
        "FECHA"=>$fecha_ok,
        "TIEMPO"=>$tiempo,
        "DESPERTAR"=>$despertar,
        "TRA"=>$tra,
        "CIFRA_TRA"=>$cifra_tra,
        "GLUCEMIA"=>$glucemia,
        "CIFRA_CLUCEMIA"=>$cifra_glucemia,
        "TA"=>$ta,
        "CIFRA_TA"=>$cifra_ta,
        "OXIGENO"=>$oxigeno,
        "CIFRA_OXIGENO"=>$cifra_oxigeno,
        "CARDIACA"=>$cardiaca,
        "CIFRA_CARDIACA"=>$cifra_cardiaca,
        "ECG"=>$ecg,
        "TERMOREGULACION"=>$termoregulacion,
        "ANTIHIPERTENSIVO"=>$antihipertensivo,
        "CIFRA_ANTIHIPERTENSIVO"=>$cifra_antihipertensivo,
        "TRAT_GLUCEMIA"=>$trat_glucemia,
        "CIFRA_TRAT_GLUCEMIA"=>$cifra_trat_glucemia,
        "BRAZO"=>$brazo,
        "NIHSS"=>$nihss,
        "RANKIN"=>$rankin,
        "ACTIV_ICTUS"=>$activ_ictus,
        "TRASLADO"=>$traslado,
        "TOXICOS"=>$toxicos,
        "TEXTO_TOXICOS"=>$texto_toxicos));  
    
    $nuevaficha->nueva_ficha();
    
   
  
    ?>
<script lang="javascript">
    alert("PETICION REGISTRADA CORRECTAMENTE")
</script>
 <?php 
 }
 ?>
 
<html>
    <head>
        <meta charset="UTF-8">
   
      <title>FORMULARIO CODIGO ICTUS</title>
<meta name="author" content="carlos" />


 <link href="estilos.css" rel="stylesheet" type="text/css"/>

 
 <script type="text/javascript" >
 
 
 function cerrar(){
     
     windows.close();
 }
 
 function valida_fecha(fecha) {
 
    //var expresion_fecha=/^\d{2}-\d{2}-\d{4}$/;
    var expresion_fecha2=/^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$/;
     var vfecha=fecha;
    //var vemail=document.getElementById("email").value;
    
    var longitud=vfecha.length;
     
    if (longitud>0) { 
     if (expresion_fecha2.test(vfecha)==false){
        alert("FECHA NO VALIDA");  
        return false;
     
      } 
  }
 
 }
 
</script>


</head>
    
<header>    
  <h1><u>FORMULARIO CODIGO ICTUS</u></h1>
  <h3>Distrito Sanitario Almer&iacute;a</h3>
 
</header>       

    <body>
    
       <form action="index.php" method="post">
           <input type="hidden" name="cnp" id="cnp" value="<?php echo $cnp?>"/>
           <input type="hidden" name="centro" id="centro" value="<?php echo $centro?>"/>
           <input type="hidden" name="sexo" id="centro" value="<?php echo $sexo?>"/>
           
          <fieldset>  
          <legend>Datos Usuario</legend>
            <table class="tablaentrada">
                <tr>
                    <td>
                      <label>Nuhsa:</label>
                      <input type="text" id="an" name="an" size="15" value="<?php echo $an;?>"/> 
                    </td>
                    <td>
                      <label>Sexo:</label>
                      <input type="text" id="nombre" name="sexo" size="10" value="<?php echo $sexo; ?>" />  
                    </td>
                    <td>
                     <label>F. Nacimiento:</label>
                     <input type="text" id="fnacimiento" name="fnacimiento" size="10" readonly="readonly" value="<?php echo $fnacimientook; ?>"/> 
                    </td>
                </tr>  
              
            </table>      
           
          </fieldset>       
         
           
          <fieldset>  
           <legend>Datos Episodio</legend>
           <table class="tablaentrada">
                <tr>
                    <td>
                      <label>Tiempo desde inicio del Episodio en :</label>  
                      <input type="text" id="tiempo" name="tiempo" size="10"/>  
                    </td>
                    <td>
                      <label>Ictus del despertar :</label>      
                      <select name="despertar" id="despertar"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>    
                    </td>
                </tr>
               
                
                <tr>
                   
                    <td>
                      <label>CONTROL DE TRA:</label> 
                      <select name="tra" id="tra"> 
                       <option value="0">No</option>
                       <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_tra" name="cifra_tra" size="3"/>  
                    </td>
                    
                    <td>
                      <label>CONTROL DE GLUCEMIA:</label> 
                      <select name="glucemia" id="glucemia"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_glucemia" name="cifra_glucemia" size="3"/>  
                   </td>
                </tr>
                
                 
                <tr>
                   
                    <td>
                      <label>CONTROL DE TA:</label> 
                      <select name="ta" id="ta"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_ta" name="cifra_ta" size="3"/>  
                   </td>
                    <td>
                      <label>CONTROL SATURACION OXIGENO:</label> 
                      <select name="oxigeno" id="oxigeno"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_oxigeno" name="cifra_oxigeno" size="3"/>  
                   </td>
                    
                </tr>
                
                <tr>
                   <td>
                      <label>CONTROL FRECUENCIA CARDIACA:</label> 
                      <select name="cardiaca" id="cardiaca"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_cardiaca" name="cifra_cardiaca" size="3"/>  
                   </td>
                    <td>
                      <label>REALIZACION ECG:</label> 
                      <select name="ecg" id="ecg"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      </td>
                </tr>
                
                <tr>
                   <td>
                      <label>MEDIDAS DE TERMOREGULACION:</label> 
                      <select name="termoregulacion" id="termoregulacion"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                   </td> 
                   <td>
                      <label>TRATAMIENTO ANTIHIPERTENSIVO:</label> 
                      <select name="antihipertensivo" id="antihipertensivo"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_antihipertensivo" name="cifra_antihipertensivo" size="3"/>  
                   </td> 
                   
                </tr>
                
                <tr>
                    <td>
                      <label>TRATAMIENTO GLUCEMIA:</label> 
                      <select name="trat_glucemia" id="trat_glucemia"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                      <label>Valor:</label>  
                      <input type="text" id="cifra_trat_glucemia" name="cifra_trat_glucemia" size="3"/>  
                   </td> 
                   <td>
                      <label>TRATAMIENTO INTRAVENOSO EN BRAZO NO PARETICO:</label> 
                      <select name="brazo" id="brazo"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>   
                   </td> 
                    
                </tr>
                
                <tr>
                    <td>
                      <label>ESCALA NIHSS:</label> 
                      <input type="text" id="nihss" name="nihss" size="15"/>  
                   </td> 
                   <td>
                      <label>ESCALA RANKIN:</label> 
                      <input type="text" id="rankin" name="rankin" size="15"/>  
                   </td>  
                </tr>
                         
                 <tr>
                    <td>
                      <label>ACTIVACION CODIGO ICTUS:</label> 
                       <select name="activ_ictus" id="activ_ictus"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>    
                   </td> 
                   <td>
                      <label>TRASLADO SEGUN RECOMENDACIONES:</label> 
                      <select name="traslado" id="traslado"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>    
                   </td>  
                </tr>
                
                 <tr>
                    <td>
                      <label>HABITOS TOXICOS:</label> 
                       <select name="toxicos" id="toxicos"> 
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select> 
                    </td>
                </tr>
                <tr> 
                    <td colspan="2">
                      <input type="text" id="texto_toxicos" name="texto_toxicos" size="30"/>  
                    </td>  
                </tr>
                
           </table>
           </fieldset>  
 
         
           <button type="submit" id="registar" name="registrar" class="botoncentrado" onclick="cerrar()">
                 Registrar
            </button>
           
       </form>    
    
    
    </body>
</html>
