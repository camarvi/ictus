<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author carlos
 */
include_once 'DataObject.class.php';

class Usuarios  extends DataObject {
    //put your code here
    protected  $data=array(
        
        "NUHSA"=>"",
        "CLAMED"=>"",
        "ANIO"=>"",
        "MES"=>"",
        "DIA"=>"",
        "APE1"=>"",
        "APE2"=>"",
        "NOMBRE"=>"",
        "IDENTIFICADOR"=>"",
        "TELEFONO"=>"",
        "MOVIL"=>""
     );    

    //lista de categorias por orden alfabetico

   public static function getUsuario($nuhsa) {

        $conn=parent::connect();
        $sql=SQL_BUSCA_USUARIO;

        try {
            $st=$conn->prepare($sql);
            $st->bindValue(":NUHSA",$nuhsa,PDO::PARAM_STR);
            $st->execute();
            $row=$st->fetch();
            parent::disconnect($conn);
            if ($row) return new Usuarios($row);

        } catch (PDOException $e) {
            parent::disconnect($conn);
            die("Query Failed :" . $e->getMessage());
        }

    }   

}
?>
