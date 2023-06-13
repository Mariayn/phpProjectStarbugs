<?php
//En este controlador se crea la cookie
$cookie_name = "sesion_id";//nombre de la cookie
$cookie_value = substr(sha1(mt_rand()), 15, 10);//valor de la cookie que genera aleatoriamente un string
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
header("Location:../index.php");
?>