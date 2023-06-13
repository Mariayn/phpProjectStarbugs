<?php
include "../DAO/Operaciones.php";
include_once "../MODELO/Usuario.php";
include_once "../MODELO/Excepcion.php";
session_start();
//Primero Recojemos los datos del form,luego hacemos la validación de cada campo enviando c/u a Operaciones
//Luego con la función validarForm de Operaciones retornamos las variables ya validadas a través de un objeto Usuario

$Vnombre=$_REQUEST['nombre'];
$Vapellido=$_REQUEST['apellido'];
$Vtel=$_REQUEST['tel'];
$Vemail=$_REQUEST['email'];
$Vpass=$_REQUEST['pass'];
$Vpass2=$_REQUEST['pass2'];

$objOperaciones=new Operaciones();//Se crea un obj Operaciones

//auto-commit significa que toda consulta que se ejecute tiene su propia transacción implícita, si la base de datos lo admite, o ninguna transacción si la base de datos no las admite.

$conexion->autocommit(FALSE);//ninguna orden sql se ejecutará hasta que se indique
try{
    $objUsuario = $objOperaciones->validarForm($Vnombre, $Vapellido, $Vtel, $Vemail, $Vpass,$Vpass2); //FUNCION VALIDAR 1

    $objOperaciones->registrar($objUsuario);//Se crea la función registrar y en el se envía el obj Usuario   //FUNCION  REGISTRAR 2

    $objDatosUsuario=$objOperaciones->login($Vemail,$Vpass);                                                                           //FUNCION  LOGIN 3 para que cuando alguien se registre tenga la sesion iniciada

    $conexion -> commit(); //Se ejecuta las ordenes pendientes 
    $conexion->autocommit(TRUE); //Se vuelve  a reanudar en automatico
    
    $date = date('m/d/Y h:i:s a', time());//muestra fecha
    $logfile = fopen("../Files/log.txt", "a");  //a:apertura,solo para escritura
    $content = "StarBugs v1.0.0 REGIS-LOG: ". $date . " -- USER REGIS-LOG WITH ID: ->*". $objDatosUsuario->getId() . " * --EMAIL: ->*" . $objDatosUsuario->getEmail() ."*\n";
    fwrite($logfile, $content);
    fclose($logfile);

    if(!empty($objDatosUsuario)){//Si se han logeado, me redirigirá directamente al controladorGetCoffee con la finalidad de recoger los productos en una sesion y luego para que el usuario pueda verlos
        $_SESSION['objDatosUsuario']=$objDatosUsuario;//sesión creada con los datos ya almacenados 
        header("Location:ControladorGetCoffeeObj.php");
    }


}catch(Excepcion $ex){
    $conexion -> rollback();//Hace que las operaciones que se han quedado sin hacer se borren
    $conexion->autocommit(TRUE);
    
    //Cuando se crea el error en operaciones, luego el catch recoge el error,crea la sesion y redirige a la vista error
    $_SESSION['excepcion'] = $ex;
    header("Location:../VISTAS/error.php");
}