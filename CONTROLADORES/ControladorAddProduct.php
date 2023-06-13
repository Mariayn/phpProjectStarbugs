<?php
//En este controlador se crea la SESION ARRAYCARRITO
session_start();

$idProductAñadido=$_GET['varAdd'];//recojo el id del producto seleccionado

 if(!isset($_SESSION['ArrayCarrito'])){//Si ya está definido la sesionCarrito le añadiremos el producto
     $ArrayCarrito=array();//Array del los productos añadidos al carrito
     
 }else{// q sig esta parte ?
     $ArrayCarrito=$_SESSION['ArrayCarrito'];
 }
$ArrayCarrito[]=$idProductAñadido;//Introducimos el producto
$_SESSION['ArrayCarrito']=$ArrayCarrito;//Guardamos el array en sesion
header("Location:../VISTAS/showProduct.php?select2=$idProductAñadido");//Me redirige a la vista con el mismo producto