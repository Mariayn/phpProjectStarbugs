<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CARTA</title>
        <!--CSS-->
      <link href="../CSS/subCarta.css" rel="stylesheet" type="text/css">
      <!--GOOGLE FONTS-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <header class="header">
            <nav><!--LOGO Y ENLACES-->
                <div class="logo">
                    <a href="../index.php" >
                   <img id="logo" src="../images/logo.png" alt="StarBugs">
                 </a>
                </div>
                        
                <?php 
                    include '../MODELO/Usuario.php';
                    include '../MODELO/Producto.php';
                    session_start();
                    
                    if(isset($_SESSION['objDatosUsuario'])){
                        $objDatosUsuario=$_SESSION['objDatosUsuario'];
                    
                ?>   
                
                <h1>Hola <?php echo $objDatosUsuario->getNombre() ?></h1>
                  <?php 
                    }
                  ?>
            </nav>
    
            <div class="btns"><!--BOTONES-->
                <?php 
                if(!isset($_SESSION['objDatosUsuario'])){
                ?>
              <a class="btn" id="login" href="account/login.php">Iniciar sesión</a> 
              <a class="btn btn--black" id="create" href="account/create.php">Registrarse</a>
              <?php 
                }else{
                ?>
                <a class="btn btn--black" id="create" href="../CONTROLADORES/ControladorCerrarSesiones.php">Cerrar sesión</a>
                <?php 
                }
                ?>
            </div>  
        </header>

        <main>

            <section id="section">
                <p>Buenos días</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 24px; height: 24px"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32V416c0 53 43 96 96 96H288c53 0 96-43 96-96h16c61.9 0 112-50.1 112-112s-50.1-112-112-112H352 32zm352 64h16c26.5 0 48 21.5 48 48s-21.5 48-48 48H384V256zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z"/></svg>
            </section>

            <?php 
            $tipo=$_GET['select'];
            ?>
            
            <section id="section-menu">
                <div id="menu-text">
                    <p><strong>Menu </strong><a href="carta.php">  > Bebidas </a> > <?php  echo $tipo ?></p>
                </div>

                <hr>
                
                <div  class="productCont">
                  <?php
                    //include '../MODELO/Producto.php';
                    //session_start();
                    $ArrayProducts=$_SESSION['ArrayProducts'];

                    foreach($ArrayProducts as $Object){ 
                        if( $Object->getSubcategoria() == $tipo ){
                            
                        
                    ?>
                    
                    
                    <div id="produc">
                        <a href="showProduct.php?select2=<?php echo $Object->getId() ?>" class="productDiv">
                           <img class="caffeeImg" src="<?php echo $Object->getRuta_imagen() ?>" alt="img-hot-coffee">
                           <p> <?php echo $Object->getNombre() ?></p>
                        </a>
                    </div>
                    
                    <?php
                      }  } 
                        ?>
                    
                </div>

            </section>
            

        </main>
        

        <div class="copyright">
            &copy; StarBugs. Todos los derechos reservados.
        </div>


    </body>
</html>

