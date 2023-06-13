<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mensaje</title>
        <!--CSS-->
      <link href="../CSS/mensaje.css" rel="stylesheet" type="text/css">
      <!--GOOGLE FONTS-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        
        
        <main>
            <a href="../CONTROLADORES/ControladorCerrarSesionCompra.php"> > Regresar al menú</a>
            
            <section>
                <h1>  
                  <?php

                 $mje=$_REQUEST['mje'];
                echo $mje;
                ?>
                </h1>
           </section>
            
         </main>
  
    </body>
</html>
