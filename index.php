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
   
      <title>Cobro a Terceros</title>
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
  <h1><u>Cobros a Terceros</u></h1>
  <h3>Distrito Sanitario Almer&iacute;a</h3>
 
</header>       

    <body>
    
       <form action="index.php" method="post">
           <input type="hidden" name="cnp" id="cnp" value="<?php echo $cnp?>"/>
      
         
          <fieldset>  
          <legend>Datos Asistencia</legend>
            <div class="datos_personales">
              <label>Centro Salud:</label>
               <select name="centro" id="centro"> 
                    <?php
                        foreach ($listacentro as $lcentro) {
                            
                           if ($lcentro->getValueEncoded('COD_CEN')==$centro) {    
                    ?>
                        <option value="<?php echo $lcentro->getValueEncoded('COD_CEN')?>" selected="selected">
                    <?php echo (($lcentro->getValueEncoded('CENTRO')))?></option>
                    <?php
                         } else {
                    ?>
                        <option value="<?php echo $lcentro->getValueEncoded('COD_CEN')?>">
                        <?php echo ($lcentro->getValueEncoded('CENTRO'))?></option>
                   <?php 
                         }
                     }     
                   ?>
               </select>    
              
              <label>Fecha Asist:</label>
              <input type="text" id="fecha_asistencia" name="fecha_asistencia" size="8" onblur="valida_fecha(this.value)" value="<?php echo date('d/m/Y'); ?>" readonly="readonly"/> 
        
               <label>Hora:</label>
               <input type="text" id="hora" name="hora" size="5" value="<?php echo date('G:i'); ?>"  readonly="readonly"/> 
              
               <label>Asistencia:</label>
               <select name="tipo_consulta" id="tipo_consulta"> 
                    <?php
                        foreach ($listaconsulta_c3 as $lconsulta) {
                            
                    ?>
                        <option value="<?php echo $lconsulta->getValueEncoded('COD')?>">
                    <?php echo (($lconsulta->getValueEncoded('CONSULTA')))?></option>
                    <?php
                         } 
                    ?>     
               </select>    
               
            </div> 
           
           </fieldset>         
           
          <fieldset>  
          <legend>Datos Usuario</legend>
            <table class="tablaentrada">
                <tr>
                    <td>
                      <label>Nuhsa:</label>
                      <input type="text" id="an" name="an" size="10" value="<?php echo $an;?>"/> 
                    </td>
                    <td>
                      <label>Nombre:</label>
                      <input type="text" id="nombre" name="nombre" size="20" value="<?php echo $nombre_usuario; ?>" />  
                    </td>
                    <td>
                     <label>Apellidos:</label>
                     <input type="text" id="apellidos" name="apellidos" size="20" value="<?php echo $apellidos; ?>"/> 
                    </td>
                </tr>  
                <tr>
                   <td>
                    <label>Dni:</label>
                    <input type="text" id="dni" name="dni" size="10" value="<?php echo $dni; ?>"/>     
                   </td> 
                   <td>
                     <label>Fecha Nacimiento:</label>
                     <input type="text" id="fnacimiento" name="fnacimiento" size="8" onblur="valida_fecha(this.value)" />
                   </td>
                   <td>
                     <label>N&ordm;Seg Social:</label>
                     <input type="text" id="seg_social" name="seg_social" size="10" /> 
                   </td>
                </tr>
                <tr>
                  <td>
                    <label>Domicilio:</label>
                    <input type="text" id="domicilio" name="domicilio" size="20"/>    
                  </td> 
                  <td>
                    <label>Localidad:</label>
                    <input type="text" id="localidad" name="localidad" size="20"/>  
                  </td>
                  <td>
                    <label>Provincia:</label>
                    <input type="text" id="provincia" name="provincia" size="20" />  
                  </td>
                </tr>
                 <tr>
                  <td>
                    <label>C.P:</label>
                    <input type="text" id="cp" name="cp" size="20"/>    
                  </td> 
                  <td>
                    <label>Telefono:</label>
                    <input type="text" id="telefono" name="telefono" size="20" value="<?php echo $telefono; ?>"/>  
                  </td>
                  <td>
                    <label>Email:</label>
                    <input type="text" id="email" name="email" size="20" />  
                  </td>
                </tr>
            </table>      
           
          </fieldset>       
          <fieldset>  
          <legend>Datos Asistencia</legend>
            <div class="datos_personales">
                
              <label>Mutua:</label>
               <select name="comp_seguro" id="comp_seguro"> 
                    <?php
                        foreach ($comp_seguro as $lcomp) {
                            
                    ?>
                        <option value="<?php echo $lcomp->getValueEncoded('COD')?>">
                    <?php echo (($lcomp->getValueEncoded('NOMBRE_COMP')))?></option>
                    <?php
                         } 
                    ?>     
               </select>  
               <label>Indicar Compa&ntilde;ia:</label>
               <input type="text" id="indicar_comp" name="indicar_comp" size="30"/> 
         
            </div> 
          </fieldset> 
           
           <fieldset>  
               <legend>Deber&aacute; presentar Parte de Accidente en caso de:</legend>
            <div class="datos_personales">
            
               <select name="tipo_parte" id="tipo_parte"> 
                    <?php
                        foreach ($tipo_parte as $lparte) {
                            
                    ?>
                        <option value="<?php echo $lparte->getValueEncoded('COD')?>">
                    <?php echo (($lparte->getValueEncoded('PARTE')))?></option>
                    <?php
                         } 
                    ?>     
               </select>  
               <label>Indicar Nombre Empresa o Centro:</label>
               <input type="text" id="nombre_emp" name="nombre_emp" size="50"/> 
         
            </div> 
          </fieldset>  
           
           <fieldset>  
            <legend>Paises Comunitarios o Extra Comunitarios</legend>
             <div class="datos_personales"> 
                 <input type="checkbox" name="comunitarios" id="comunitarios" value="1"/>
                 <label>Deber&aacute;n presentar Formulario/modelo o el correspondiente al CONVENIO con su Pais.</label>   
             </div>   
           </fieldset>  
           
           <fieldset>  
             <legend>Accidente de Circulaci&oacute;n</legend>
             <div class="datos_personales"> 
               <select name="tipo_accidente" id="tipo_accidente"> 
                    <?php
                        foreach ($acc_circul as $acc) {
                            
                    ?>
                        <option value="<?php echo $acc->getValueEncoded('COD')?>">
                    <?php echo (($acc->getValueEncoded('ACCIDENTE')))?></option>
                    <?php
                         } 
                    ?>     
               </select>  
               
               <label>Colision:</label>  
               <select name="colision" id="colision"> 
                   <option value="0">No</option>
                   <option value="1">Si</option>
               </select>  
               <label>Autoridad: </label>
                <select name="tipo_autoridad" id="tipo_autoridad"> 
                    <?php
                        foreach ($lista_autoridad as $autoridad) {
                            
                    ?>
                        <option value="<?php echo $autoridad->getValueEncoded('COD')?>">
                    <?php echo (($autoridad->getValueEncoded('AUTORIDAD')))?></option>
                    <?php
                         } 
                    ?>     
               </select>  
            
              <label>Fecha:</label>
              <input type="text" id="fecha_accidente" name="fecha_accidente" size="8" onblur="valida_fecha(this.value)" value="<?php echo date('d/m/Y'); ?>"/> 
        
               <label>Hora:</label>
               <input type="text" id="hora_accidente" name="hora_accidente" size="5" value="<?php echo date('G:i'); ?>"/> 
            </div>  
            <div class="datos_personales">  
               <label>N&ordm; Vehiculos intervienen:</label>
               <input type="text" id="numero_vehiculos" name="numero_vehiculos" size="3"/> 
             
             </div> 
             <div class="datos_personales">
               <label>Lugar accidente:</label>
               <input type="text" id="lugar_accidente" name="lugar_accidente" size="20"/> 
          
               <label>Otros Lesionados:</label>
               <input type="text" id="otros_lesionados" name="otros_lesionados" size="20"/> 
                 
             </div>    
           </fieldset>
           
           <fieldset>  
            <legend>VEHICULO PROPIO:</legend>
            <div class="datos_personales">
               <label>Matricula:</label>
               <input type="text" id="matricula_prop" name="matricula_prop" size="8"/> 
               <label>Modelo:</label>
               <input type="text" id="modelo_prop" name="modelo_prop" size="25"/> 
               <label>Conductor:</label>
               <input type="text" id="conductor_prop" name="conductor_prop" size="25"/> 
            </div>
            <div class="datos_personales">
               <label>Propietario:</label>
               <input type="text" id="propietario_prop" name="propietario_prop" size="20"/>    
               <label>Compa&ntilde;ia Seguros:</label>
               <input type="text" id="comp_seguro_prop" name="comp_seg_prop" size="20"/>   
               <label>N&ordm; Poliza:</label>
               <input type="text" id="mum_seguro_prop" name="num_seguro_prop" size="15"/>  
               
            </div>   
            <div class="datos_personales">
                <label>Juzgado y N&ordm; Dilegencia</label>
                <input type="text" id="juzgado" name="juzgado" size="35"/>
            </div>
           </fieldset>  
           
           <fieldset>  
            <legend>VEHICULO CONTRARIO:</legend>
            <div class="datos_personales">
               <label>Matricula:</label>
               <input type="text" id="matricula_cont" name="matricula_cont" size="8"/> 
               <label>Modelo:</label>
               <input type="text" id="modelo_cont" name="modelo_cont" size="25"/> 
               <label>Conductor:</label>
               <input type="text" id="conductor_cont" name="conductor_cont" size="25"/> 
            </div>
            <div class="datos_personales">
               <label>Propietario:</label>
               <input type="text" id="propietario_cont" name="propietario_cont" size="20"/>    
               <label>Compa&ntilde;ia Seguros:</label>
               <input type="text" id="comp_seg_cont" name="comp_seg_cont" size="20"/>   
               <label>N&ordm; Poliza:</label>
               <input type="text" id="num_seguro_cont" name="num_seguro_cont" size="15"/>  
               
            </div>   
           </fieldset>  
           
           <fieldset>  
            <legend>ASISTENCIA PRESTADA:</legend>
            <div class="datos_personales">
                <label>Motivo de la Consulta Diagn&oacute;stico:</label>
                <input type="text" id="motivo_consulta" name="motivo_consulta" size="50"/>    
            </div>
            <div class="datos_personales">
                <label>Tratamiento administrado en el Centro:</label>
                <input type="text" id="tratamiento" name="tratamiento" size="50"/>    
            </div>
            <div class="datos_personales">
                <label>Pruebas Complementarias (RX,An&aacute;lisis, etc..):</label>
                <input type="text" id="pruebas" name="pruebas" size="50"/>    
            </div>
            <div class="datos_personales">
                <label>intervenciones quir&uacute;rgicas :</label>
                <input type="text" id="interq_quir" name="interq_quir" size="50"/>    
            </div>
            <div class="datos_personales">
              <label>DERIVACION:</label>  
               <select name="derivacion" id="derivacion"> 
                   <option value="0">No</option>
                   <option value="1">Si</option>
               </select>   
                <label>HOSPITAL :</label>
                <input type="text" id="hospital_derivacion" name="hospital_derivacion" size="30"/>  
               <label>PRECISA AMBULANCIA:</label>  
               <select name="ambulancia" id="ambulancia"> 
                   <option value="0">No</option>
                   <option value="1">Si</option>
               </select>   
            </div>
            <div class="datos_personales">
               <label>REVISION DE PROCESO ANTERIOR:</label>  
               <select name="revision_pro_ant" id="revision_pro_ant"> 
                   <option value="0">No</option>
                   <option value="1">Si</option>
               </select> 
               <label>FECHA DE PRIMERA ASISTENCIA :</label>
                <input type="text" id="fecha_1_asist" name="fecha_1_asist" size="10"/>  
            </div>
            
            <div class="datos_personales">
               <label>EL/LA FACULTATIVO/A:</label>  
               <input type="text" id="facultativo" name="facultativo" size="25"/>  
               <label>EL/LA ENFERMERO/A:</label>  
               <input type="text" id="enfermero" name="enfermero" size="25"/>  
            </div>  
            <div class="datos_personales">
               <label>EL USUARIO:</label>  
               <input type="text" id="usuario" name="usuario" size="25"/>  
               <label>DNI ACOMPA&Ntilde;ANTE:</label>  
               <input type="text" id="dni_acomp" name="dni_acomp" size="8"/>  
               <label>PARENTESCO:</label>  
               <input type="text" id="parentesco" name="parentesco" size="15"/> 
            </div>   
           </fieldset>
           
           <button type="submit" id="registar" name="registrar" class="botoncentrado" onclick="cerrar()">
                 Registrar
            </button>
           
       </form>    
    
    
    </body>
</html>
