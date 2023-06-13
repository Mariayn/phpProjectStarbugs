<?php
include "../DAO/Operaciones.php";
include_once '../MODELO/Sucursal.php';
include_once'../MODELO/Producto.php';
include_once '../MODELO/Usuario.php';
include_once "../MODELO/Excepcion.php";

session_start();
//Traemos las sesiones
$objDatosUsuario = $_SESSION['objDatosUsuario'];
$ArrayCarrito = $_SESSION['ArrayCarrito'];
$ArrayProducts = $_SESSION['ArrayProducts'];

//calculamos el precio total
$total = 0;
for ($i = 0; $i < count($ArrayCarrito); $i++) {
    for ($e = 0; $e < count($ArrayProducts); $e++) {
        if ($ArrayCarrito[$i] == $ArrayProducts[$e]->getId()) {
            $total = $total + $ArrayProducts[$e]->getPrecio();
        }
    }
}


$Vminutos = $_REQUEST['listaMinutos'];
$timeNow = date("H:i");

//variables a insertar en la tabla orden
$idUsuario = $objDatosUsuario->getId();
$importeTotal = $total;
$tranckingNumber = substr(sha1(mt_rand()), 17, 10);
$idSucursal = $_SESSION['idSucursal'];
$VmetodoPago = $_REQUEST['metodo_pago'];
$fechaRecogida = date('Y-m-d');
$horaRecogida = date('H:i', strtotime(+$Vminutos. 'minutes',strtotime($timeNow)));//A la hora real le añadimos los minutos seleccionados
$VnumTarjeta = $_REQUEST['numero_tarjeta'];
$VnomTarjeta = $_REQUEST['nombre_tarjeta'];

$fechaCad = $_REQUEST['caducidad'];
$pos = strpos($fechaCad, "/");
$mes= intval(substr($fechaCad ,0,$pos));//intval convierte a int / obtenemos solo mes
$año=2000+ intval(substr($fechaCad ,$pos+1,strlen($fechaCad))); // obtenemos solo el año y le sumamos 2000

$fechaCad2 = new DateTime($año.'-'.$mes.'-1'); 
$fechaCad2 = $fechaCad2->format('Y-m-t');


 //Encriptación del numero de la tarjeta con md5, esto se hace con la finalidad de desencriptar el numero para hacer pagos futuros
$ciphering = "BF-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = random_bytes($iv_length);
$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
$VnumTarjeta = openssl_encrypt($VnumTarjeta, $ciphering,$encryption_key, $options, $encryption_iv);

  //Desencriptación
/*
$decryption_iv = random_bytes($iv_length);
$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
$decryption = openssl_decrypt ($VnumTarjeta, $ciphering,
$decryption_key, $options, $encryption_iv);
  */
 

if($fechaCad2 >= date ( 'Y-m-d' )){//Ahora comparamos la fecha de caducidad ingresada con la fecha actual
    //Si no es una tarjeta caducada se realizará lo siguiente
    $objOperaciones = new Operaciones();

    $conexion->autocommit(FALSE);//ninguna orden sql se ejecutará hasta que se indique
    try{
    //Insercion de Orden
    $objOperaciones->insertarOrden($idUsuario, $importeTotal, $tranckingNumber, $idSucursal, $VmetodoPago, $fechaRecogida, $horaRecogida, $VnumTarjeta, $VnomTarjeta);

    //mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) from the last query
    $idOrden = mysqli_insert_id($conexion);//Obtenemos el idOrden, que posteriormente se insertará en la tabla orden_producto

    //For para introducir el idOrden y cada idProd a la tabla Orden_Producto
        foreach($ArrayCarrito as $product){
            $objOperaciones->insertarOrdenProducto($idOrden, $product);
        }

        $conexion -> commit();//Se ejecuta
        $conexion->autocommit(TRUE);//Reanudamos

        //Este unset sirve para eliminar la sesionCarrito una vez hecha la compra 
        unset($_SESSION['ArrayCarrito']);
        $mje="Pedido en marcha" . "<br>" . "Gracias por tu compra";//Se crea un mensaje y luego lo pasamos a través de una variable por el enlace
        header("Location:../VISTAS/mensaje.php?mje=$mje");//Una vez hecha la compra,redirigimos a una vista mensaje
    }


    catch(Excepcion $ex){
        $conexion -> rollback();//Hace que las operaciones que se han quedado sin hacer se borren
        $conexion->autocommit(TRUE);//Reanudamos

        //Cuando se crea el error en operaciones, luego el catch recoge el error,crea la sesion y redirige a la vista error
        $_SESSION['excepcion'] = $ex;
        header("Location:../VISTAS/error.php");
    }

}else{//Si la tarjeta es caducada
    $ex = new Excepcion("1","Tarjeta Caducada","./carrito.php");//Creamos un objeto excepcion
     $_SESSION['excepcion'] = $ex;
    header("Location:../VISTAS/error.php");
}
