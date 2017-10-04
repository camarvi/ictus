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

class Comp_Seguro extends DataObject{
    //put your code here
    
      protected  $data=array(
        "COD"=>"",
        "NOMBRE_COMP"=>""
        );
               

   public static function getListaComp() {

        $conn=parent::connect();
        $sql=SQL_LISTA_COMPANIA;
             
        try {
            $st=$conn->prepare($sql);
         
            $st->execute();
             $Comp_Seguro=array();
               foreach ($st->fetchAll() as $row) {
                   $Comp_Seguro[]=new Comp_Seguro($row);
               }
         
               parent::disconnect($conn);
               return array($Comp_Seguro);
            } catch (PDOException $e) {
                parent::disconnect($conn);
                die("Query failed: " . $e->getMessage());
            }     
     
    }   
         
      
          
      
      
}

?>
