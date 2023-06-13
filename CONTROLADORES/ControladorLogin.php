<?php

include "../DAO/Operaciones.php";
include_once "../MODELO/Usuario.php";
include_once "../MODELO/Excepcion.php";
session_start();

//Recogemos los datos del usuario
$Vemail = $_REQUEST['email'];
$Vpass = $_REQUEST['pass'];

$objOperaciones = new Operaciones(); //Se crea un obj Operaciones


try {
    $objDatosUsuario = $objOperaciones->login($Vemail, $Vpass); //Se llama a la funcion login dentro de operaciones, al cual se le manda 2 variables
    
    $date = date('m/d/Y h:i:s a', time());
    $logfile = fopen("../Files/log.txt", "a");
    $content = "StarBugs v1.0.0 LOG: ". $date . " -- USER LOG WITH ID: ->*". $objDatosUsuario->getId() . " * --EMAIL: ->*" . $objDatosUsuario->getEmail() ."*\n";
    fwrite($logfile, $content);
    fclose($logfile);
    if (!empty($objDatosUsuario)) {
        $_SESSION['objDatosUsuario'] = $objDatosUsuario; //sesión creada con los datos ya almacenados 
        header("Location:ControladorGetCoffeeObj.php");

    }
} catch (Excepcion $ex) {
    $_SESSION['excepcion'] = $ex;
    header("Location:../VISTAS/error.php");
}





