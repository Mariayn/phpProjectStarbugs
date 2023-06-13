<?php

include "../DAO/Operaciones.php";
include_once "../MODELO/Usuario.php";
include_once "../MODELO/Excepcion.php";
session_start();

$Vnombre=$_REQUEST['nombre'];
$Vapellido=$_REQUEST['apellido'];
$Vtel=$_REQUEST['tel'];
$Vemail=$_REQUEST['email'];
$Vpass=$_REQUEST['pass'];
$Vpass2=$_REQUEST['pass2'];

$objDatosUsuario=$_SESSION['objDatosUsuario'];
$id = $objDatosUsuario->getId();//Obtenemos el idUsuario para poder identificar al usuario 

$objOperaciones=new Operaciones();//Se crea un obj Operaciones

$conexion->autocommit(FALSE);

if(is_null($Vpass) || empty($Vpass)){//Si no se modifica contraseña ,que se realice lo siguiente
    try{
        $objUsuario = $objOperaciones->validarForm2($Vnombre, $Vapellido, $Vtel, $Vemail); //FUNCION 1 VALIDAR
        $objOperaciones->modificarSinPass($objUsuario,$id);//Se crea la función modificar y en el se envía el obj Usuario   //FUNCION 2 MODIFICAR 


        $conexion -> commit();
        $conexion->autocommit(TRUE);


            $_SESSION['objDatosUsuario']=null; //por haberse hecho una modificacion,con null cerramos sesion 
            header("Location:../index.php");


    }catch(Excepcion $ex){
        $conexion -> rollback();
        $conexion->autocommit(TRUE);

        //Cuando se crea el error en operaciones, luego el cattch recoge el error,crea la sesion y redirige a la vista error
        $_SESSION['excepcion'] = $ex;
        header("Location:../VISTAS/error.php");
    }

}else{//Si se modifica contraseña...
    try{
    $objUsuario = $objOperaciones->validarForm($Vnombre, $Vapellido, $Vtel, $Vemail, $Vpass,$Vpass2); //FUNCION 1 VALIDAR
    $objOperaciones->modificarConPass($objUsuario,$id);//Se crea la función modificarConPass y en el se envía el obj Usuario   //FUNCION 2 REGISTRAR

                     
    $conexion -> commit();
    $conexion->autocommit(TRUE);

    $_SESSION['objDatosUsuario']=null;//por haberse hecho una modificacion,con null cerramos sesion
        header("Location:../index.php");

}catch(Excepcion $ex){
    $conexion -> rollback();
    $conexion->autocommit(TRUE);
    
    //Cuando se crea el error en operaciones, luego el catch recoge el error
    $_SESSION['excepcion'] = $ex;//se crea la sesion y redirige a la vista error
    header("Location:../VISTAS/error.php");
}
    
}