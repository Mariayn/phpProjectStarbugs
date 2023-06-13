<?php

include "../DAO/Operaciones.php";
include_once "../MODELO/Excepcion.php";
session_start();

$Vnombre=$_REQUEST['nombre'];
$Vapellido=$_REQUEST['apellido'];
$Vtel=$_REQUEST['tel'];
$Vemail=$_REQUEST['email'];
$Vasunto=$_REQUEST['asunto'];
$Vmje=$_REQUEST['mensaje'];
$Vfecha=date('Y-m-d');

$objOperaciones=new Operaciones();//Se crea un obj Operaciones

//Aqui no es necesario un rollback porque solo hay un insert
try{
    $objOperaciones->validarFormContacto($Vnombre, $Vapellido, $Vtel, $Vemail, $Vasunto,$Vmje); //FUNCION  VALIDAR 1
    
    $objOperaciones->enviarForm($Vnombre, $Vapellido, $Vtel, $Vemail, $Vasunto,$Vmje,$Vfecha); //FUNCION 2
    
    $mje="Mensaje enviado" . "<br>" . "Gracias por contactarte con nosotros";
    header("Location:../VISTAS/mensaje.php?mje=$mje");
    
}catch(Excepcion $ex){
    //Cuando se crea el error en operaciones, luego el catch recoge el error,crea la sesion y redirige a la vista error
    $_SESSION['excepcion'] = $ex;
    header("Location:../VISTAS/error.php");
}