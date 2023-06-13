<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
         <!--CSS-->
      <link href="../CSS/error.css" rel="stylesheet" type="text/css">
      <!--GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <main>
       
            <section>
                        <?php
                    include '../MODELO/Excepcion.php';
                    session_start();

                    $Verror = $_SESSION['excepcion'];
                    ?>
                
                <div>
                    <h2>
                        <?php 
                        echo "CÓDIGO DEL ERROR: ". $Verror->getCodigo();
                        echo "<br>MENSAJE: ".$Verror->getMensaje();
                        ?>
                    </h2>
                    <h3><a href="<?php echo $Verror->GetUrl() ?>"> > Volver </a></h3>
                </div>
                
                <div id="divSvg">
                    <svg aria-hidden="true" class="valign-middle icon___7kqQL" focusable="false" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" style="width: 24px; height: 24px; overflow: visible; fill: currentcolor;"><path d="M13 7h-2v6h2V7zm-1 15c5.52 0 10-4.48 10-10S17.52 2 12 2 2 6.48 2 12s4.48 10 10 10zm0-18c4.41 0 8 3.59 8 8s-3.59 8-8 8-8-3.59-8-8 3.59-8 8-8zm1 11h-2v2h2v-2z"></path></svg>               
                 </div>   
                 
            </section>
            
            
        </main>
        
        
    </body>
</html>
