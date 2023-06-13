<?php

session_start();

//UNSET
// Destruye una o más variables especificadas
// Si una variable que se pasa POR REFERENCIA es unset() dentro de una función, sólo la variable local es destruida.
unset($_SESSION['objDatosUsuario']);
unset($_SESSION['ArrayProducts']);

session_destroy();

header("Location:../index.php");
