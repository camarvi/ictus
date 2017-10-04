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
 
   
    
}



 if (isset ($_POST['registrar'])) {

   
     
    $centro=$_POST['centro'];
    
     $separar =explode('/',$_POST["fecha"]);
        $dia=trim($separar[0]);
        $mes=trim($separar[1]);
        $anio=trim($separar[2]);
     $fecha_ok=$anio . "-" . $mes . "-" . $dia;
     
    
     $an=$_POST['an'];
     
    
    if (strlen($_POST["fnacimiento"])){
        $separar1=explode('/',$_POST["fnacimiento"]);
        $dia1=trim($separar1[0]);
        $mes1=trim($separar1[1]);
        $anio1=trim($separar1[2]);
        $fnacimientook=$anio1 . "-" . $mes1 . "-" . $dia1;
      } else {
      $fnacimientook=""; }
    
     
       
    $comp_seguro=$_POST['comp_seguro'];
    
    if (isset($_POST['indicar_comp'])){
        $indicar_comp=trim(html_entity_decode($_POST['indicar_comp']));
    } else { $indicar_comp="";}
    
     
    $tipo_parte=$_POST['tipo_parte'];
     
    if (isset ($_POST['nombre_emp'])) { 
        $nombre_emp=  trim(html_entity_decode($_POST['nombre_emp'])) ;
    }  else {$nombre_emp=""; }   
     
     
     
     if (isset($_POST['comunitarios'])){
        $comunitarios=1; 
     } else { $comunitarios=0; }
     
   
    
    if (isset ($_POST['otros_lesionados'])) { 
        $otros_lesionados=  trim(html_entity_decode($_POST['otros_lesionados'])) ;
        
    }  else {$otros_lesionados=""; }    
    
    if (isset ($_POST['matricula_prop'])) { 
        $matricula_prop=  trim(html_entity_decode($_POST['matricula_prop'])) ;
        
    }  else {$matricula_prop=""; }    
    
    if (isset ($_POST['modelo_prop'])) { 
        $modelo_prop=  trim(html_entity_decode($_POST['modelo_prop'])) ;
        
    }  else {$modelo_prop=""; }    
    
    if (isset ($_POST['conductor_prop'])) { 
        $conductor_prop=  trim(html_entity_decode($_POST['conductor_prop'])) ;
        
    }  else {$conductor_prop=""; }    
    
    if (isset ($_POST['propietario_prop'])) { 
        $propietario_prop=  trim(html_entity_decode($_POST['propietario_prop'])) ;
        
    }  else {$propietario_prop=""; }    
    
    if (isset ($_POST['comp_seg_prop'])) { 
        $comp_seg_prop=  trim(html_entity_decode($_POST['comp_seg_prop'])) ;
        
    }  else {$comp_seg_prop=""; }    
    
   
    
    $derivacion=$_POST['derivacion'];
    
    if (isset ($_POST['hospital_derivacion'])) { 
        $hospital_derivacion=  trim(html_entity_decode($_POST['hospital_derivacion'])) ;
        
    }  else {$hospital_derivacion=""; }   
    
    
    $ambulancia= (int) $_POST['ambulancia'];
    
    $revision_pro_ant= (int) $_POST['revision_pro_ant'];
    
    
    
    if (isset ($_POST['parentesco'])) { 
        $parentesco=  trim(html_entity_decode($_POST['parentesco'])) ;
        
    }  else {$parentesco=""; }  
   
    
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
        "TRASLADO"=>$traslado));  
    
    $nuevaficha->nueva_ficha();
    
    list($listaconsulta_c3)= Tipo_consulta_c3::getTipoConsulta();
    list($comp_seguro)= Comp_Seguro::getListaComp();
    list($tipo_parte)=  Tipo_Parte_acc::getTipoParte();
    list($acc_circul)=  Tipo_Acc_Circulacion::getTipoAcc();
    list($lista_autoridad)=  Tipo_Autoridad::getListaAutoridad();
    list($listacentro)=  Centros::listaCentros();
  
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
         
           
          <fieldset>  
          <legend>Datos Usuario</legend>
            <table class="tablaentrada">
                <tr>
                    <td>
                      <label>Nuhsa:</label>
                      <input type="text" id="an" name="an" size="10" value="<?php echo $an;?>"/> 
                    </td>
                    <td>
                      <label>Sexo:</label>
                      <input type="text" id="nombre" name="sexo" size="10" value="<?php echo $sexo; ?>" />  
                    </td>
                    <td>
                     <label>F. Nacimiento:</label>
                     <input type="text" id="fnacimiento" name="fnacimiento" size="10" value="<?php echo $fnacimientook; ?>"/> 
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
                
           </table>
           </fieldset>  
 
         
           <button type="submit" id="registar" name="registrar" class="botoncentrado" onclick="cerrar()">
                 Registrar
            </button>
           
       </form>    
    
    
    </body>
</html>
