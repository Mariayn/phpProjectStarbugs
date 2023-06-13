<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>INFORMACIÓN DEL PRODUCTO</title>
        <!--CSS-->
        <link href="../CSS/showProduct.css" rel="stylesheet" type="text/css">
        <!--GOOGLE FONTS-->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
         <!--JS-->
         <script src="../JS/password.js" type="text/javascript"></script>
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
            <?php
                $idProduct=$_GET['select2'];

                        $ArrayProducts=$_SESSION['ArrayProducts'];

                        foreach($ArrayProducts as $Object){ 
                            if( $Object->getId() == $idProduct ){
                                $product = $Object;
                            }
                        }
                ?>
        
            <div id="menu-text">
                <p><strong>Menu </strong><a href="carta.php">  > Bebidas </a> > <a href="subCarta.php?select=<?php echo $product->getSubcategoria() ?>">  <?php echo $product->getSubcategoria() ?></a> ><strong> <?php echo $product->getNombre() ?> </strong></p>
             </div>

 
             
            <section>
                
                <div>
                    <img class="caffeeImg" src="<?php echo $product->getRuta_imagen() ?>" alt="img del producto">
                </div>
                <div id="info">
                    <h1  id="productName"><?php echo $product->getNombre() ?></h1>
                    <h3><?php echo $product->getDescripcion() ?></h3>
                    <h3><?php echo $product->getPrecio() ?> €</h3>
                    <!--
                    Aqui le paso el IDPRODUCTO como variable para luego recogerlo en el controladorAddProd
                    La función addProduct solo me muestra q el producto fue añadido 
                    -->
                    <a onclick="addProduct()"  class="btn btn--add" href="../CONTROLADORES/ControladorAddProduct.php?varAdd=<?php echo $idProduct?>">Añadir</a>
                </div>
            </section>
        
        </main>
        
        
        <?php
        if(isset($_SESSION['ArrayCarrito'])){
            $ArrayCarrito=$_SESSION['ArrayCarrito'];
            if(count($ArrayCarrito)>0){
            ?>
        <div id="divCart">
            <a id="cart"  href="../CONTROLADORES/ControladorStoreLocator.php">
                <img src="../images/img_cart.svg" alt="imagen del carrito" id="imgCart">
                <span id="quantitySpan"> <?php echo count($ArrayCarrito) ?> </span>
            </a>
        </div>
        <?php
            }
       }
        ?>
    </body>
</html>
