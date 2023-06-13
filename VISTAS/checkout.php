<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CHECKOUT</title>
        <!--CSS-->
        <link href="../CSS/checkout.css" rel="stylesheet" type="text/css">
        <!--GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
        <!--FONT-AWESOME-->
        <script src="https://kit.fontawesome.com/68ca212b88.js" crossorigin="anonymous"></script>
        <!--JS-->
        <script src="../JS/password.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include '../MODELO/Sucursal.php';
        include '../MODELO/Producto.php';
        include '../MODELO/Usuario.php';
         include '../MODELO/Excepcion.php';
        // put your code here
        session_start();//Reanudo sesión
        $idSuc = $_GET['varSurcusal'];
        $_SESSION['idSucursal']=$idSuc;//Guardo el id de la sucursal en una sesión
        
         $ArrayStores = $_SESSION['ArrayStores'];//Traigo la sesion y la recorro con foreach para mostrar las sucursales 
         foreach($ArrayStores as $Object){
             if($Object->getId() == $idSuc){
                 $sucursal = $Object;
             }
         }
         
         
         if(isset($_SESSION['objDatosUsuario'])){
             $objDatosUsuario=$_SESSION['objDatosUsuario'];
         }else{
                $ex = new Excepcion("1"," No se permite acceso sin Usuario","../index.php");
                $_SESSION['excepcion'] = $ex;
                header("Location:./error.php");
         }
        ?>
        
        <main>
            
            <section id="formDatosPedido">
                <a href="carta.php"> < Volver a la carta </a>
                
                <form method="POST" name = "myForm" action="../CONTROLADORES/ControladorCheckout.php">
                    <label for="fname">FECHA DE RECOGIDA:</label><br>
                    <input class="input" value="<?php echo date("Y-m-d");?>" disabled type="text" name="fecha" /><br>
                    <label for="fname">RECOGERLO EN:</label><br>
                    <div id="divTime">
         
                        <select name="listaMinutos" id="minutos">
                            <option value="15">15 minutos </option>
                            <option value="30">30 minutos</option>
                            <option value="45">45 minutos</option>
                            <option value="55">55 minutos</option>
                        </select>
                    </div>
                    <label for="fname">RECÓGELO EN:</label><br>
                    <input class="input" value="<?php echo $sucursal->getSucursal() ?> | <?php echo $sucursal->getDireccion() ?> " disabled type="text" name="dir" /><br><br>
                    
                    <h3>DETALLES DEL PEDIDO</h3>
                    <label for="fname">Nombre:</label><br>
                    <input class="input" value="<?php echo $objDatosUsuario->getNombre() ?>" disabled type="text" name="nom" /><br>
                    <label for="fname">Apellidos:</label><br>
                    <input class="input" value="<?php echo $objDatosUsuario->getApellido() ?>" disabled type="text" name="ap" /><br>
                    <label for="fname">Teléfono:</label><br>
                    <input class="input" value="<?php echo $objDatosUsuario->getTelefono() ?>" disabled type="text" name="tel" /><br>
                    <label for="fname">Email:</label><br>
                    <input class="input" value="<?php echo $objDatosUsuario->getEmail() ?>" disabled type="text" name="email" /><br><br>
                    
                    <h3>MÉTODO DE PAGO</h3>
                    <div id="divSelectTarjeta">
                        <input required value="tarjeta" type="radio" name="metodo_pago" />
                        <label for="fname">Debit/Credit Card</label><br>
                        <i class="fa-regular fa-credit-card"></i>
                    </div>
                    
                    
                    <div id="divTarjeta">
                        <input class="input" required pattern="[0-9]{16}" placeholder="Número de la tarjeta"  type="text" name="numero_tarjeta" /><br>
                   
                        <input class="input" required placeholder="Nombre titular de la tarjeta "  type="text" name="nombre_tarjeta" /><br>
                     
                        <input class="input" required pattern="(?:0[1-9]|1[0-2])/[0-9]{2}"placeholder="Caducidad"  type="text" name="caducidad" /><br>
       
                        <input class="input" required pattern="[0-9]{3}"  placeholder="CVV"  type="text" name="cvv" />
                    </div>
                    <br>
                    
                    <input type="submit" id = "btnSubmit" value="CONFIRMAR PEDIDO PARA RECOGER" />
                    
                </form>
                
            </section>
            
            
            <section id="resumenPedido">
                  <h2>RESUMEN DEL PEDIDO</h2>
                <?php 
                  
         
                    $ArrayCarrito=$_SESSION['ArrayCarrito'];
                    $ArrayProducts=$_SESSION['ArrayProducts'];
                    $total=0;
                    for($i = 0; $i < count($ArrayCarrito); $i++){
                        for ($e = 0; $e < count($ArrayProducts); $e++) {
                                if($ArrayCarrito[$i] == $ArrayProducts[$e]->getId()){
                                    $total=$total + $ArrayProducts[$e]->getPrecio();
            ?>
                
              
                <div class="divProducto">
                    <p>1x <?php echo $ArrayProducts[$e]->getNombre() ?></p>
                    <p><?php echo $ArrayProducts[$e]->getPrecio() ?>€</p>
                </div>
                            <?php 
                        }
                    }
                }
                ?>
                <hr>
                <div class="divProducto">
                    <p>Total</p>
                    <p><?php echo $total ?> €</p>
                </div>
                
      
            </section>
            
        </main>
    </body>
</html>
