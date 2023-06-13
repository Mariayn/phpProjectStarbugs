<?php
//Este controlador lo que hace es recoger el array productos
include "../DAO/Operaciones.php";
include_once "../MODELO/Excepcion.php";
session_start();

$objOperaciones=new Operaciones();

try {
    $ArrayProducts=$objOperaciones->getProducts();
    if(!empty($ArrayProducts)){
        $_SESSION['ArrayProducts']=$ArrayProducts;
        header("Location:../VISTAS/carta.php");
    }
} catch (Excepcion $ex) {
    $_SESSION['excepcion'] = $ex;
    header("Location:../VISTAS/error.php");
}


