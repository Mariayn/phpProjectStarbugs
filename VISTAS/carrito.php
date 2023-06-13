<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CARRITO</title>
        <!--CSS-->
        <link href="../CSS/carrito.css" rel="stylesheet" type="text/css">
        <!--GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    </head>
    <body>

        <main>

            <div id="content">
                <a href="carta.php"> < Volver a la carta </a>
                <h1> TU PEDIDO </h1>

                <form action='../CONTROLADORES/ControladorGetStore.php' name="myForm_Store" method="POST">

                    <label for="tienda">Elegir tienda:</label><br>
                    <select required name="sucursal" id="listaTiendas">

                        <option value=""></option>
                        <?php
                        include '../MODELO/Sucursal.php';
                        include '../MODELO/Producto.php';
                         include '../MODELO/Excepcion.php';
                        session_start(); //Reanudo sesión
                        $ArrayStores = $_SESSION['ArrayStores']; //Traigo la sesion y la recorro con foreach para mostrar las sucursales 
                        foreach ($ArrayStores as $store) {
                            ?>
                            <option value="<?php echo $store->getId() ?>"><?php echo $store->getSucursal() ?> | <?php echo $store->getDireccion() ?></option>
                            <?php
                        }
                        ?>
                    </select>


                    <?php
                    if (!isset($_SESSION['objDatosUsuario'])) {//Si la variable objUsuario NO esta definida, me muestra el botón de TRAMITAR DESHABILITADO
                        ?>
                        <input disabled style="background-color:#E7E9EB" id="btn" name="submit" type="submit" value="Tramitar pedido"/>
                        <span>Para realizar tu pedido necesitarás <strong><a href="account/create.php">registrarte</a> </strong>o <strong><a href="account/login.php">iniciar sesión</a></strong></span>
                        <?php
                    } else {//Si está definida me lo muestra
                        ?>
                        <input id="btn" name="submit" type="submit" value="Tramitar pedido"/>
                        <?php
                    }
                    ?>
                </form>
            </div>


            <section>
                <?php
                if (!isset($_SESSION['ArrayCarrito'])) {
                    $ex = new Excepcion("1", " No se permite acceso sin carrito", "../index.php");
                    $_SESSION['excepcion'] = $ex;
                    header("Location:./error.php");
                }

                $ArrayCarrito = $_SESSION['ArrayCarrito'];
                $ArrayProducts = $_SESSION['ArrayProducts'];
                // if(count($ArrayCarrito) >0){

                for ($i = 0; $i < count($ArrayCarrito); $i++) {
                    for ($e = 0; $e < count($ArrayProducts); $e++) {
                        if ($ArrayCarrito[$i] == $ArrayProducts[$e]->getId()) {//Deben coincidir en contenido
                            ?>
                            <div class="producto">
                                <div>
                                    <img class="caffeeImg" src="<?php echo $ArrayProducts[$e]->getRuta_imagen() ?>" alt="img del producto">
                                </div>
                                <div class="texts">
                                    <h1  id="productName"><?php echo $ArrayProducts[$e]->getNombre() ?></h1>
                                    <a href="../CONTROLADORES/ControladorDelete.php?varIndice=<?php echo $i ?>">Quitar</a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>

            </section>

                <?php
                //print_r($ArrayCarrito);
                //print_r($ArrayProducts);
                ?>

        </main>

    </body>
</html>
