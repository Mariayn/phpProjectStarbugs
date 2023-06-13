<?php
session_start();

$idIndice=$_GET['varIndice'];//recojo id del producto  a borrar

$ArrayCarrito=$_SESSION['ArrayCarrito'];//traigo la sesion


//De esta forma el indice se mantiene y salta error al recorrer con for
//unset($ArrayCarrito[$idIndice]);
//array_values($ArrayCarrito);
//$ArrayCarrito= array_filter($ArrayCarrito); 


//elimina los indices desde el inicial hasta las posiciones que le pidas (array, indice, nº de elementos a borrar desde indice)
array_splice($ArrayCarrito, $idIndice, 1); 

$_SESSION['ArrayCarrito']=$ArrayCarrito;//Guardamos el array en sesion

if(count($ArrayCarrito)>0){//Si sigue habiendo algún producto en la cesta, me redirige al la vista carrito
    header("Location:../VISTAS/carrito.php");
}else{//Y si no hay ningún producto
    $mje="No tienes ningún producto en la cesta :(";
    header("Location:../VISTAS/mensajeCompraTerminada.php?mje=$mje");
}
