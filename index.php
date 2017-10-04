<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
CAMBIAR DATOS 
-->

<?php


require_once ("common.inc.php");

list($listaconsulta_c3)= Tipo_consulta_c3::getTipoConsulta();
list($comp_seguro)= Comp_Seguro::getListaComp();
list($tipo_parte)=  Tipo_Parte_acc::getTipoParte();
list($acc_circul)=  Tipo_Acc_Circulacion::getTipoAcc();
list($lista_autoridad)=  Tipo_Autoridad::getListaAutoridad();
list($listacentro)=  Centros::listaCentros();
   
//LEO LAS VARIABLES QUE ME PASAN POR GET PARA 
//OBTENER LOS DATOS DEL PACIENTE

if (isset ($_GET['nuhsa'])){
   
    $an= $_GET['nuhsa'];   
    $centro=$_GET['centro'];
    $cnp=$_GET['cnpprofesional'];
 
    $usuario=Usuarios::getUsuario($_GET['nuhsa']);
    if (isset($usuario)) {
    $nombre_usuario=trim($usuario->getValueEncoded('NOMBRE'));
    $apellidos=trim($usuario->getValueEncoded('APE1')) . " " . trim($usuario->getValueEncoded('APE2'));
    $telefono=$usuario->getValueEncoded('TELEFONO');
    $dni=trim($usuario->getValueEncoded('IDENTIFICADOR'));
    $movil=$usuario->getValueEncoded('MOVIL');        
    }
    else {
      $nombre_usuario=""; 
      $apellidos="";
      $telefono="";
      $dni="";
      $movil="";
    }
   
    
    
}



 if (isset ($_POST['registrar'])) {

   
     
     $centro=$_POST['centro'];
    
     $separar =explode('/',$_POST["fecha_asistencia"]);
        $dia=trim($separar[0]);
        $mes=trim($separar[1]);
        $anio=trim($separar[2]);
     $fecha_asistenciaok=$anio . "-" . $mes . "-" . $dia;
     
     $hora=$_POST['hora'];
     $tipo_consulta=$_POST['tipo_consulta'];    
     $an=$_POST['an'];
     
    if (isset ($_POST['nombre'])) { 
        $nombre=  trim(html_entity_decode($_POST['nombre'])) ;
    }  else {$nombre=""; }    
     
    if (isset ($_POST['apellidos'])) { 
        $apellidos=  trim(html_entity_decode($_POST['apellidos'])) ;
    }  else {$apellidos=""; }  
    
         
    $dni=$_POST['dni'];
     
    
    if (strlen($_POST["fnacimiento"])){
        $separar1=explode('/',$_POST["fnacimiento"]);
        $dia1=trim($separar1[0]);
        $mes1=trim($separar1[1]);
        $anio1=trim($separar1[2]);
        $fnacimientook=$anio1 . "-" . $mes1 . "-" . $dia1;
      } else {
      $fnacimientook=""; }
    
     
     $seg_social=trim($_POST['seg_social']);
    
    if (isset ($_POST['domicilio'])) { 
        $domicilio=  trim(html_entity_decode($_POST['domicilio'])) ;
    }  else {$domicilio=""; }  
        
    if (isset ($_POST['localidad'])) { 
        $localidad=  trim(html_entity_decode($_POST['localidad'])) ;
    }  else {$localidad=""; }  
    
    if (isset ($_POST['provincia'])) { 
        $provincia=  trim(html_entity_decode($_POST['provincia'])) ;
    }  else {$provincia=""; }  
    
    if (isset ($_POST['cp'])) { 
        $cp=  trim(html_entity_decode($_POST['cp'])) ;
    }  else {$cp=""; }  
    
    if (isset($_POST['telefono'])){
        $telefono=$_POST['telefono'];
    } else { $telefono="";}
    
    if (isset($_POST['email'])){
        $email=trim($_POST['email']);
    } else { $email="";}
 
    
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
     
     $tipo_accidente=trim($_POST['tipo_accidente']); 
     $colision=trim($_POST['colision']); 
     $tipo_autoridad=$_POST['tipo_autoridad'];
     
     
    if (strlen($_POST["fecha_accidente"])){
        $separar_accidente =explode('/',$_POST["fecha_accidente"]);
        $dia_acc=trim($separar_accidente[0]);
        $mes_acc=trim($separar_accidente[1]);
        $anio_acc=trim($separar_accidente[2]);
        $fecha_accidente_ok=$anio_acc . "-" . $mes_acc . "-" . $dia_acc;
      } else {
      $fecha_accidente_ok=""; }
     
     
    
    $hora_accidente=$_POST['hora_accidente'];
    $numero_vehiculos=trim($_POST['numero_vehiculos']);
     
    if (isset ($_POST['lugar_accidente'])) { 
        $lugar_accidente=  trim(html_entity_decode($_POST['lugar_accidente'])) ;
        
    }  else {$lugar_accidente=""; }    
    
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
    
    if (isset ($_POST['num_seguro_prop'])) { 
        $num_seguro_prop=  trim(html_entity_decode($_POST['num_seguro_prop'])) ;
        
    }  else {$num_seguro_prop=""; }    
   
    if (isset ($_POST['juzgado'])) { 
        $juzgado=  trim(html_entity_decode($_POST['juzgado'])) ;
        
    }  else {$juzgado=""; }    
    
    
     if (isset ($_POST['matricula_cont'])) { 
        $matricula_cont=  trim(html_entity_decode($_POST['matricula_cont'])) ;
        
    }  else {$matricula_cont=""; }    
    
    if (isset ($_POST['modelo_cont'])) { 
        $modelo_cont=  trim(html_entity_decode($_POST['modelo_cont'])) ;
        
    }  else {$modelo_cont=""; }    
    
    if (isset ($_POST['conductor_cont'])) { 
        $conductor_cont=  trim(html_entity_decode($_POST['conductor_cont'])) ;
        
    }  else {$conductor_cont=""; }    
    
    if (isset ($_POST['propietario_cont'])) { 
        $propietario_cont=  trim(html_entity_decode($_POST['propietario_cont'])) ;
        
    }  else {$propietario_cont=""; }    
    
    if (isset ($_POST['comp_seg_cont'])) { 
        $comp_seg_cont=  trim(html_entity_decode($_POST['comp_seg_cont'])) ;
        
    }  else {$comp_seg_cont=""; }    
    
    if (isset ($_POST['num_seguro_cont'])) { 
        $num_seguro_cont=  trim(html_entity_decode($_POST['num_seguro_cont'])) ;
        
    }  else {$num_seguro_cont=""; }    
    
    if (isset ($_POST['motivo_consulta'])) { 
        $motivo_consulta=  trim(html_entity_decode($_POST['motivo_consulta'])) ;
        
    }  else {$motivo_consulta=""; }   
    
    if (isset ($_POST['tratamiento'])) { 
        $tratamiento=  trim(html_entity_decode($_POST['tratamiento'])) ;
        
    }  else {$tratamiento=""; }   
    
    if (isset ($_POST['pruebas'])) { 
        $pruebas=  trim(html_entity_decode($_POST['pruebas'])) ;
        
    }  else {$pruebas=""; }  
    
    if (isset ($_POST['interq_quir'])) { 
        $interq_quir=  trim(html_entity_decode($_POST['interq_quir'])) ;
        
    }  else {$interq_quir=""; }   
    
    $derivacion=$_POST['derivacion'];
    
    if (isset ($_POST['hospital_derivacion'])) { 
        $hospital_derivacion=  trim(html_entity_decode($_POST['hospital_derivacion'])) ;
        
    }  else {$hospital_derivacion=""; }   
    
    
    $ambulancia= (int) $_POST['ambulancia'];
    
    $revision_pro_ant= (int) $_POST['revision_pro_ant'];
    
    
    if (strlen($_POST["fecha_1_asist"])){
        $separar_fecha1 =explode('/',$_POST["fecha_1_asist"]);
        $dia_fecha1=trim($separar_fecha1[0]);
        $mes_fecha1=trim($separar_fecha1[1]);
        $anio_fecha1=trim($separar_fecha1[2]);
        $fecha_p_asist_ok=$anio_fecha1 . "-" . $mes_fecha1 . "-" . $dia_fecha1;
      } else {
      $fecha_p_asist_ok=""; }
    
     
    
    if (isset ($_POST['facultativo'])) { 
        $facultativo=  trim(html_entity_decode($_POST['facultativo'])) ;
        
    }  else {$facultativo=""; }   
    
    if (isset ($_POST['enfermero'])) { 
        $enfermero=  trim(html_entity_decode($_POST['enfermero'])) ;
        
    }  else {$enfermero=""; }  
    
    if (isset ($_POST['usuario'])) { 
        $usuario=  trim(html_entity_decode($_POST['usuario'])) ;
        
    }  else {$usuario=""; }   
    
    if (isset ($_POST['dni_acomp'])) { 
        $dni_acomp=  trim(html_entity_decode($_POST['dni_acomp'])) ;
        
    }  else {$dni_acomp=""; }  
    
    if (isset ($_POST['parentesco'])) { 
        $parentesco=  trim(html_entity_decode($_POST['parentesco'])) ;
        
    }  else {$parentesco=""; }  
   
    
    $nuevaficha=new Ficha(array(
        "CENTRO"=>$centro,
        "FECHA_ASISTENCIA"=>$fecha_asistenciaok,
        "HORA"=>$hora,
        "TIPO_CONSULTA"=>$tipo_consulta,
        "AN"=>$an,
        "NOMBRE"=>$nombre,
        "APELLIDOS"=>$apellidos,
        "DNI"=>$dni,
        "FNACIMIENTO"=>$fnacimientook,
        "SEG_SOCIAL"=>$seg_social,
        "DOMICILIO"=>$domicilio,
        "LOCALIDAD"=>$localidad,
        "PROVINCIA"=>$provincia,
        "CP"=>$cp,
        "TELEFONO"=>$telefono,
        "EMAIL"=>$email,
        "COMP_SEGURO"=>$comp_seguro,
        "INDICAR_COMP"=>$indicar_comp,
        "TIPO_PARTE"=>$tipo_parte,
        "NOMBRE_EMP"=>$nombre_emp,
        "COMUNITARIOS"=>$comunitarios,
        "TIPO_ACCIDENTE"=>$tipo_accidente,
        "FECHA_ACCIDENTE"=>$fecha_accidente_ok,
        "HORA_ACCIDENTE"=>$hora_accidente,
        "NUMERO_VEHICULOS"=>$numero_vehiculos,
        "COLISION"=>$colision,
        "TIPO_AUTORIDAD"=>$tipo_autoridad,
        "LUGAR_ACCIDENTE"=>$lugar_accidente,
        "OTROS_LESIONADOS"=>$otros_lesionados,
        "MATRICULA_PROP"=>$matricula_prop,
        "MODELO_PROP"=>$modelo_prop,
        "CONDUCTOR_PROP"=>$conductor_prop,
        "PROPIETARIO_PROP"=>$propietario_prop,
        "COMP_SEG_PROP"=>$comp_seg_prop,
        "NUM_SEGURO_PROP"=>$num_seguro_prop,
        "JUZGADO"=>$juzgado,
        
        "MATRICULA_CONT"=>$matricula_cont,
        "MODELO_CONT"=>$modelo_cont,
        "CONDUCTOR_CONT"=>$conductor_cont,
        "PROPIETARIO_CONT"=>$propietario_cont,
        "COMP_SEG_CONT"=>$comp_seg_cont,
        "NUM_SEGURO_CONT"=>$num_seguro_cont,
       
        "MOTIVO_CONSULTA"=>$motivo_consulta,
        "TRATAMIENTO"=>$tratamiento,
        "PRUEBAS"=>$pruebas,
        
        "INTERQ_QUIR"=>$interq_quir,
        "DERIVACION"=>$derivacion,
        "HOSPITAL_DERIVACION"=>$hospital_derivacion,
        "AMBULANCIA"=>$ambulancia,
        
        "REVISION_PRO_ANT"=>$revision_pro_ant,
        "FECHA_P_ASIST"=>$fecha_p_asist_ok,
        "FACULTATIVO"=>$facultativo,
        "ENFERMERO"=>$enfermero,
        "USUARIO"=>$usuario,
        "DNI_ACOMP"=>$dni_acomp,
        "PARENTESCO"=>$parentesco));  
    
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
