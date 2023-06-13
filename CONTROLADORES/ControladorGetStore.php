<?php
include "../DAO/Operaciones.php";
include_once "../MODELO/Surcursal.php";

$idSucursal=$_REQUEST['sucursal'];//Recogemos el idSucursal para lueg mostrarlo en la vista checkout

header("Location:../VISTAS/checkout.php?varSurcusal=$idSucursal");//Me carga la vista con el mismo producto
