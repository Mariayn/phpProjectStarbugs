<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Política De Privacidad</title>
        <!--CSS-->
      <link href="../CSS/privacidad-politica.css" rel="stylesheet" type="text/css">
      <!--GOOGLE FONTS-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include '../MODELO/Excepcion.php';
        session_start();//Reanudo sesión
         ?>
        
        <header>
            <a href="../index.php"> > Volver</a>
        </header>
        
        <main>
            <?php
                $miarchivo = fopen ("../Files/trabaja.txt","r+");
                if ($miarchivo==false){
                    $ex = new Excepcion("2"," No se pudo abrir fichero","../index.php");
                    $_SESSION['excepcion'] = $ex;
                    header("Location:./error.php");
                } else {
                    $contenido=fread($miarchivo, filesize("../Files/trabaja.txt"));
                    //echo "<p> El contenido es: </br>" . $contenido."</p>";
                    echo $contenido;
                }
            ?>
            
        </main>
    </body>
</html>
