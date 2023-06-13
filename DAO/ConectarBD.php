<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    // La @ delante de la instrucción impide que se genere un error de PHP y solo salga nuestro mensaje
    # Establecer la conexión con el servidor
@$conexion = new mysqli("localhost","root","");

$conexion->set_charset("utf8");  // para evitar que se interpreten mal las tildes y ñ.
if(!$conexion->connect_errno){
    echo "<h2>CONEXIÓN ESTABLECIDA CON EL SERVIDOR</h2><br>";
    
    # Seleccionar la base de datos
    $conexion->select_db("db_starbugs") or die("BASE DE DATOS NO ENCONTRADA");
    echo "<h2> Conexión establecida con la base de datos bd</h2><br>"; 
}else{
    echo "<h2> No ha sido posible crear la conexión con el servidor</h2><br>"; 
}

?>

