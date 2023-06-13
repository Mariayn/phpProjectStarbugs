<?php

include "../DAO/Operaciones.php";
include_once "../MODELO/Excepcion.php";
session_start();

$objOperaciones=new Operaciones();


try {
    $ArrayStores=$objOperaciones->getStores();//Obtenemos un array con las sucursales 
    if(!empty($ArrayStores)){
        $_SESSION['ArrayStores']=$ArrayStores;
        header("Location:../VISTAS/carrito.php");
    }
    
} catch (Excepcion $ex) {
        $_SESSION['excepcion'] = $ex;
        header("Location:../VISTAS/error.php");
}
