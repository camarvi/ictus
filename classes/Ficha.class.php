<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author carlos
 */

include_once 'DataObject.class.php';

class Ficha extends DataObject{
    //put your code here
    
      protected  $data=array(
        "COD"=>"",
        "CENTRO"=>"",
        "AN"=>"",
        "CENTRO"=>"",
        "CNP"=>"",
        "SEXO"=>"",
        "FNACIMIENTO"=>"",
        "FECHA"=>"",
        "TIEMPO"=>"",
        "DESPERTAR"=>"",
        "TRA"=>"",
        "CIFRA_TRA"=>"",
        "GLUCEMIA"=>"",
        "CIFRA_GLUCEMIA"=>"",
        "TA"=>"",
        "CIFRA_TA"=>"",
        "OXIGENO"=>"",
        "CIFRA_OXIGENO"=>"",
        "CARDIACA"=>"",
        "CIFRA_CARDIACA"=>"",
        "ECG"=>"",
        "TERMOREGULACION"=>"",
        "ANTIHIPERTENSIVO"=>"", 
        "CIFRA_ANTIHIPERTENSIVO"=>"",
        "TRAT_GLUCEMIA"=>"",
        "CIFRA_TRAT_GLUCEMIA"=>"",
        "BRAZO"=>"",
        "NIHSS"=>"",
        "RANKIN"=>"",
        "ACTIV_ICTUS"=>"",
        "TRASLADO"=>""  
        );
               

  public function nueva_ficha() {

        $conn=parent::connect();
        $sql=SQL_INSERTA_FICHA2;
        
             
        try {
            $st=$conn->prepare($sql);
          
            $st->bindValue(":CENTRO",$this->data["CENTRO"], PDO::PARAM_STR);
            $st->bindValue(":FECHA_ASISTENCIA",$this->data["FECHA_ASISTENCIA"], PDO::PARAM_STR);
            $st->bindValue(":HORA",$this->data["HORA"], PDO::PARAM_STR);
            $st->bindValue(":TIPO_CONSULTA",$this->data["TIPO_CONSULTA"], PDO::PARAM_INT);
            $st->bindValue(":AN",$this->data["AN"], PDO::PARAM_STR);
            $st->bindValue(":NOMBRE",$this->data["NOMBRE"], PDO::PARAM_STR);
            $st->bindValue(":APELLIDOS",$this->data["APELLIDOS"], PDO::PARAM_STR);
            $st->bindValue(":DNI",$this->data["DNI"], PDO::PARAM_STR);
            $st->bindValue(":FNACIMIENTO",$this->data["FNACIMIENTO"], PDO::PARAM_STR);
            $st->bindValue(":SEG_SOCIAL",$this->data["SEG_SOCIAL"], PDO::PARAM_STR);
            $st->bindValue(":DOMICILIO",$this->data["DOMICILIO"], PDO::PARAM_STR); 
            $st->bindValue(":LOCALIDAD",$this->data["LOCALIDAD"], PDO::PARAM_STR); 
            $st->bindValue(":PROVINCIA",$this->data["PROVINCIA"], PDO::PARAM_STR);  
            $st->bindValue(":CP",$this->data["CP"], PDO::PARAM_STR);
            $st->bindValue(":TELEFONO",$this->data["TELEFONO"], PDO::PARAM_STR); 
            $st->bindValue(":EMAIL",$this->data["EMAIL"], PDO::PARAM_STR);
            $st->bindValue(":COMP_SEGURO",$this->data["COMP_SEGURO"], PDO::PARAM_STR);
            $st->bindValue(":INDICAR_COMP",$this->data["INDICAR_COMP"], PDO::PARAM_STR); 
            $st->bindValue(":TIPO_PARTE",$this->data["TIPO_PARTE"], PDO::PARAM_INT);
            $st->bindValue(":NOMBRE_EMP",$this->data["NOMBRE_EMP"], PDO::PARAM_STR);   
            $st->bindValue(":COMUNITARIOS",$this->data["COMUNITARIOS"], PDO::PARAM_STR);  
            $st->bindValue(":TIPO_ACCIDENTE",$this->data["TIPO_ACCIDENTE"], PDO::PARAM_STR); 
            $st->bindValue(":COLISION",$this->data["COLISION"], PDO::PARAM_STR); 
            $st->bindValue(":TIPO_AUTORIDAD",$this->data["TIPO_AUTORIDAD"], PDO::PARAM_INT);
            $st->bindValue(":FECHA_ACCIDENTE",$this->data["FECHA_ACCIDENTE"], PDO::PARAM_STR); 
            $st->bindValue(":HORA_ACCIDENTE",$this->data["HORA_ACCIDENTE"], PDO::PARAM_STR);
            $st->bindValue(":NUMERO_VEHICULOS",$this->data["NUMERO_VEHICULOS"], PDO::PARAM_INT); 
            $st->bindValue(":LUGAR_ACCIDENTE",$this->data["LUGAR_ACCIDENTE"], PDO::PARAM_STR);
            $st->bindValue(":OTROS_LESIONADOS",$this->data["OTROS_LESIONADOS"], PDO::PARAM_STR);  
          
            $st->bindValue(":MATRICULA_PROP",$this->data["MATRICULA_PROP"], PDO::PARAM_STR);   
            $st->bindValue(":MODELO_PROP",$this->data["MODELO_PROP"], PDO::PARAM_STR); 
            $st->bindValue(":CONDUCTOR_PROP",$this->data["CONDUCTOR_PROP"], PDO::PARAM_STR); 
            $st->bindValue(":PROPIETARIO_PROP",$this->data["PROPIETARIO_PROP"], PDO::PARAM_STR); 
            $st->bindValue(":COMP_SEG_PROP",$this->data["COMP_SEG_PROP"], PDO::PARAM_STR); 
            $st->bindValue(":NUM_SEGURO_PROP",$this->data["NUM_SEGURO_PROP"], PDO::PARAM_STR);
            $st->bindValue(":JUZGADO",$this->data["JUZGADO"], PDO::PARAM_STR);
             
            $st->bindValue(":MATRICULA_CONT",$this->data["MATRICULA_CONT"], PDO::PARAM_STR); 
            $st->bindValue(":MODELO_CONT",$this->data["MODELO_CONT"], PDO::PARAM_STR);  
            $st->bindValue(":CONDUCTOR_CONT",$this->data["CONDUCTOR_CONT"], PDO::PARAM_STR); 
            $st->bindValue(":PROPIETARIO_CONT",$this->data["PROPIETARIO_CONT"], PDO::PARAM_STR); 
            $st->bindValue(":COMP_SEG_CONT",$this->data["COMP_SEG_CONT"], PDO::PARAM_STR); 
            $st->bindValue(":NUM_SEGURO_CONT",$this->data["NUM_SEGURO_CONT"], PDO::PARAM_STR);
        
            $st->bindValue(":FECHA_P_ASIST", $this->data["FECHA_P_ASIST"],  PDO::PARAM_STR); 
            $st->bindValue(":FACULTATIVO", $this->data["FACULTATIVO"], PDO::PARAM_STR);
            $st->bindValue(":ENFERMERO", $this->data["ENFERMERO"], PDO::PARAM_STR);
            $st->bindValue(":USUARIO", $this->data["USUARIO"], PDO::PARAM_STR);
            $st->bindValue(":DNI_ACOMP", $this->data["DNI_ACOMP"], PDO::PARAM_STR);
            $st->bindValue(":PARENTESCO", $this->data["PARENTESCO"], PDO::PARAM_STR);
           
            
            $st->bindValue(":MOTIVO_CONSULTA",$this->data["MOTIVO_CONSULTA"], PDO::PARAM_STR); 
            $st->bindValue(":TRATAMIENTO",$this->data["TRATAMIENTO"], PDO::PARAM_STR); 
            $st->bindValue(":PRUEBAS",$this->data["PRUEBAS"], PDO::PARAM_STR); 
            
            $st->bindValue(":INTERQ_QUIR",$this->data["INTERQ_QUIR"], PDO::PARAM_STR); 
            $st->bindValue(":DERIVACION",$this->data["DERIVACION"], PDO::PARAM_INT); 
            $st->bindValue(":HOSPITAL_DERIVACION",$this->data["HOSPITAL_DERIVACION"], PDO::PARAM_STR); 
            $st->bindValue(":AMBULANCIA",$this->data["AMBULANCIA"], PDO::PARAM_INT); 
          
            $st->bindValue(":REVISION_PRO_ANT",$this->data["REVISION_PRO_ANT"], PDO::PARAM_INT);
            
               
   
     
            
            $st->execute();
            parent::disconnect($conn);

      
          $conn=null;


        } catch (PDOException $e) {
            parent::disconnect($conn);
            die ("Query failed: " . $e->getMessage());

        }

    }
     
      
      
      
}

?>
