<?php
/* 
 * DEFINO LAS CONSTANTES QUE UTILIZO EN EL PROGRAMA
 */

// DATOS CONEXON POR MYSQL
//define("DB_DSN","mysql:host=10.8.65.9;dbname=SUCESOS");
//define("DB_DSN","mysql:dbname=web");
   


// CONEXION AL SERVIDOR SQL SERVER


define("DB_DSN","dblib:host=10.8.65.17;dbname=VISADO");



define("DB_USERNAME", "sa");
define("DB_PASSWORD", "servidor");
define("PAGE_SIZE", 5);
    

//Definicion Tablas BD
define("TBL_FICHA","FORMULARIO_ICTUS");


define("TBL_BDU","FICHERO_BDU");


define( "ROOT", $_SERVER['HTTP_HOST']);
define("RAIZ", "http://" . $_SERVER['HTTP_HOST'] );

  
//consultas sql

//RELLENAR LOS COMBOS


//define("SQL_LISTACENTROS", "SELECT COD_CEN,CENTRO FROM " . TBL_CENTROS . " WHERE TALON=1 ORDER BY CENTRO" );


//CONSULTAS SQL CREAR UNA FICHA COBRO A TERCEROS

define("SQL_INSERTA_FICHA","INSERT INTO " . TBL_FICHA . " (AN,CENTRO,CNP,SEXO,FNACIMIENTO,
    FECHA,TIEMPO,DESPERTAR,TRA,CIFRA_TRA,GLUCEMIA,CIFRA_GLUCEMIA,TA,CIFRA_TA,OXIGENO,
    CIFRA_OXIGENO,CARDIACA,CIFRA_CARDIACA,ECG,TERMOREGULACION,ANTIHIPERTENSIVO,
    CIFRA_ANTIHIPERTENSIVO,TRAT_GLUCEMIA,CIFRA_TRAT_GLUCEMIA,BRAZO,NIHSS,RANKIN,
    ACTIV_ICTUS,TRASLADO) VALUES (:AN,:CENTRO,:CNP,:SEXO,:FNACIMIENTO,:FECHA,
    :TIEMPO,:DESPERTAR,:TRA,:CIFRA_TRA,:GLUCEMIA,:CIFRA_GLUCEMIA,:TA,:CIFRA_TA,:OXIGENO,
    :CIFRA_OXIGENO,:CARDIACA,:CIFRA_CARDIACA,:ECG,:TERMOREGULACION,:ANTIHIPERTENSIVO,
    :CIFRA_ANTIHIPERTENSIVO,:TRAT_GLUCEMIA,:CIFRA_TRAT_GLUCEMIA,:BRAZO,:NIHSS,:RANKIN,
    :ACTIV_ICTUS,:TRASLADO)"); 


define("SQL_BUSCA_USUARIO","SELECT NUHSA,CLAMED,ANIO,MES,DIA,APE1,APE2,NOMBRE,"
        . "IDENTIFICADOR,TELEFONO,MOVIL FROM " . TBL_BDU . " WHERE NUHSA=:NUHSA");



?>
     