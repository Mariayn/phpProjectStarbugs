<?php
//En este controlador  se destruirá la sesión carrito una vez realizada la compra.
session_start();

unset($_SESSION['ArrayCarrito']);

header("Location:../index.php");