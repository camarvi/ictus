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
        "TRASLADO"=>"",
        "TOXICOS"=>"",
        "TEXTO_TOXICOS"=>""  
        );
               

  public function nueva_ficha() {

        $conn=parent::connect();
        $sql=SQL_INSERTA_FICHA;
        
             
        try {
            $st=$conn->prepare($sql);
          
            $st->bindValue(":AN",$this->data["AN"], PDO::PARAM_STR);
            $st->bindValue(":CENTRO",$this->data["CENTRO"], PDO::PARAM_STR);
            $st->bindValue(":CNP",$this->data["CNP"], PDO::PARAM_STR);
            $st->bindValue(":SEXO",$this->data["SEXO"], PDO::PARAM_STR);
            $st->bindValue(":FNACIMIENTO",$this->data["FNACIMIENTO"], PDO::PARAM_STR);
            $st->bindValue(":FECHA",$this->data["FECHA"], PDO::PARAM_STR);
            $st->bindValue(":TIEMPO",$this->data["TIEMPO"], PDO::PARAM_STR); 
            $st->bindValue(":DESPERTAR",$this->data["DESPERTAR"], PDO::PARAM_INT); 
            $st->bindValue(":TRA",$this->data["TRA"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_TRA",$this->data["CIFRA_TRA"], PDO::PARAM_STR);
            
            $st->bindValue(":GLUCEMIA",$this->data["GLUCEMIA"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_GLUCEMIA",$this->data["CIFRA_GLUCEMIA"], PDO::PARAM_STR);
            
            $st->bindValue(":TA",$this->data["TA"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_TA",$this->data["CIFRA_TA"], PDO::PARAM_STR); 
            
            $st->bindValue(":OXIGENO",$this->data["OXIGENO"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_OXIGENO",$this->data["CIFRA_OXIGENO"], PDO::PARAM_STR);
            
            $st->bindValue(":CARDIACA",$this->data["CARDIACA"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_CARDIACA",$this->data["CIFRA_CARDIACA"], PDO::PARAM_STR);
            
            $st->bindValue(":ECG",$this->data["ECG"], PDO::PARAM_INT);
            
            $st->bindValue(":TERMOREGULACION",$this->data["TERMOREGULACION"], PDO::PARAM_INT);
            
            $st->bindValue(":ANTIHIPERTENSIVO",$this->data["ANTIHIPERTENSIVO"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_ANTIHIPERTENSIVO",$this->data["CIFRA_ANTIHIPERTENSIVO"], PDO::PARAM_STR);
            
            $st->bindValue(":TRAT_GLUCEMIA",$this->data["TRAT_GLUCEMIA"], PDO::PARAM_INT);
            $st->bindValue(":CIFRA_TRAT_GLUCEMIA",$this->data["CIFRA_TRAT_GLUCEMIA"], PDO::PARAM_STR);
            
            $st->bindValue(":BRAZO",$this->data["BRAZO"], PDO::PARAM_INT);
            
            $st->bindValue(":NIHSS",$this->data["NIHSS"], PDO::PARAM_STR);
            $st->bindValue(":RANKIN",$this->data["RANKIN"], PDO::PARAM_STR);
            
            $st->bindValue(":ACTIV_ICTUS",$this->data["ACTIV_ICTUS"], PDO::PARAM_INT);
            $st->bindValue(":TRASLADO",$this->data["TRASLADO"], PDO::PARAM_INT);
            
            $st->bindValue(":TOXICOS",$this->data["TOXICOS"], PDO::PARAM_INT);
            $st->bindValue(":TEXTO_TOXICOS",$this->data["TEXTO_TOXICOS"], PDO::PARAM_STR);
            
           
            
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
