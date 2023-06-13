<?php

include 'ConectarBD.php';
include_once '../MODELO/Usuario.php';
include_once '../MODELO/Producto.php';
include_once '../MODELO/Sucursal.php';

class Operaciones {
    public function validarForm($Vnombre, $Vapellido, $Vtel, $Vemail, $Vpass,$Vpass2){
        
        //$Err=array();
            
        //input fields are Validated with regular expression
        $validName="/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/";
        $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $uppercasePassword = "/(?=.*?[A-Z])/";
        $lowercasePassword = "/(?=.*?[a-z])/";
        $minSixPassword = "/.{6,}/";
        
        //  First Name Validation
        if(empty($Vnombre)){ 
            throw new Excepcion("100","Nombre es requerido","./account/create.php");
            //$Err[]="Nombre es requerido "; 
        }elseif(!preg_match($validName,$Vnombre)){
            throw new Excepcion("110","Digitos en el campo nombre no están permitidos","./account/create.php");
            //$Err[]="Digitos Nombre no están permitidos";
        }
        
        
        //  Last Name Validation
        if(empty($Vapellido)){
            //throw ERROR 
            throw new Excepcion("120","Apellido es requerido","./account/create.php");
            //$Err[]="Apellido es requerido";
        }elseif(!preg_match($validName,$Vapellido)){
            throw new Excepcion("130","Digitos en el campo Apellido no están permitidos","./account/create.php");
            //$Err[]="Digitos Apellido no están permitidos";
        }
        
        
        // Tel Validation
        if(empty($Vtel)){
            throw new Excepcion("140","Teléfono es requerido","./account/create.php");
      
        }elseif(!is_numeric($Vtel)){
            throw new Excepcion("150","Carácter no válido en campo teléfono","./account/create.php");
   
        }elseif(!preg_match($minSixPassword,$Vtel)){
            throw new Excepcion("160","Teléfono debe tener un mínimo de 9 digítos","./account/create.php");
           
        }
        
        
        //Email Address Validation
        if(empty($Vemail)){
            throw new Excepcion("170","Email es requerido","./account/create.php");
        }else{
            if(!filter_var($Vemail, FILTER_VALIDATE_EMAIL)){
                throw new Excepcion("180","Email no válido","./account/create.php");
            }
        }
        
        
        // password validation
        if(empty($Vpass)){
            throw new Excepcion("190","Contraseña es requerida","./account/create.php");
          } 
          elseif (!preg_match($uppercasePassword,$Vpass) || !preg_match($lowercasePassword,$Vpass) || !preg_match($minSixPassword,$Vpass)) {
              throw new Excepcion("191","Contraseña debe tener al menos una letra mayúscula, una letra minúscula y un dígito","./account/create.php");
          }
          
          if(empty($Vpass2)){
              throw new Excepcion("192","Contraseña es requerida","./account/create.php");
          } 
          elseif (!preg_match($uppercasePassword,$Vpass) || !preg_match($lowercasePassword,$Vpass) || !preg_match($minSixPassword,$Vpass)) {
              throw new Excepcion("193","Contraseña debe tener al menos una letra mayúscula, una letra minúscula y un dígito","./account/create.php");
          }
          
          if($Vpass != $Vpass2) {
              throw new Excepcion("194","Contraseñas no coincide","./account/create.php");
          }
          
/*          
          if(!empty($Err)){
              foreach($Err as $e){
                  echo '<p>' . $e . '</p>';
              }
          }else{//Se crea un obj Usuario 
              $Usuario = new Usuario(null, $Vnombre, $Vapellido, $Vtel, $Vemail, $Vpass,$Vpass2);
              return $Usuario;//con return vuelve al controlador
        
}*/
          //Se crea un obj Usuario 
          $Usuario = new Usuario(null, $Vnombre, $Vapellido, $Vtel, $Vemail, $Vpass,$Vpass2);
          return $Usuario;//con return vuelve al controlador
    }
    
    public function validarForm2($Vnombre, $Vapellido, $Vtel, $Vemail){

        //input fields are Validated with regular expression
        $validName="/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/";
        $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $uppercasePassword = "/(?=.*?[A-Z])/";
        $lowercasePassword = "/(?=.*?[a-z])/";
        $minSixPassword = "/.{6,}/";
        
        //  First Name Validation
        if(empty($Vnombre)){ 
            throw new Excepcion("100","Nombre es requerido","./account/create.php");
            //$Err[]="Nombre es requerido "; 
        }elseif(!preg_match($validName,$Vnombre)){
            throw new Excepcion("110","Digitos en el campo nombre no están permitidos","./account/create.php");
            //$Err[]="Digitos Nombre no están permitidos";
        }
        
        
        //  Last Name Validation
        if(empty($Vapellido)){
            //throw ERROR 
            throw new Excepcion("120","Apellido es requerido","./account/create.php");
            //$Err[]="Apellido es requerido";
        }elseif(!preg_match($validName,$Vapellido)){
            throw new Excepcion("130","Digitos en el campo Apellido no están permitidos","./account/create.php");
            //$Err[]="Digitos Apellido no están permitidos";
        }
        
        
        // Tel Validation
        if(empty($Vtel)){
            throw new Excepcion("140","Teléfono es requerido","./account/create.php");
      
        }elseif(!is_numeric($Vtel)){
            throw new Excepcion("150","Carácter no válido en campo teléfono","./account/create.php");
   
        }elseif(!preg_match($minSixPassword,$Vtel)){
            throw new Excepcion("160","Teléfono debe tener un mínimo de 9 digítos","./account/create.php");
           
        }
        
        
        //Email Address Validation
        if(empty($Vemail)){
            throw new Excepcion("170","Email es requerido","./account/create.php");
        }else{
            if(!filter_var($Vemail, FILTER_VALIDATE_EMAIL)){
                throw new Excepcion("180","Email no válido","./account/create.php");
            }
        }

          //Se crea un obj Usuario 
          $Usuario = new Usuario(null, $Vnombre, $Vapellido, $Vtel, $Vemail, null,null);
          return $Usuario;//con return vuelve al controlador
    }
    
    public function registrar($Usuario){
        global $conexion;
        
        $nom = $Usuario->getNombre();
        $apell = $Usuario->getApellido();
        $tel = $Usuario->getTelefono();
        $email = $Usuario->getEmail();
        $clave = $Usuario->getClave();
        
        //Encriptar con BlowFish
        $BlowFishClave=password_hash($clave,PASSWORD_BCRYPT);
        
        //Se utiliza signos de interrogacion para evitar la sql injection 
        $ordenSQL = "INSERT INTO usuario VALUES(null,?,?,?,?,?)";
        
        //Se prepara la sentencia con la conexion
        $sentencia = $conexion->prepare($ordenSQL);
        $sentencia->bind_param("sssss", $nom,$apell,$tel,$email,$BlowFishClave); //Una var para cada ?, y s para string, i para int, b boolean
        $resultado = $sentencia->execute(); //Se ejecuta la sentencia
        
        if ($conexion->affected_rows == 1) { //Comprobacion : si afecta una fila la operacion se hizo correctamente
        return; 
        }else{
        throw new Excepcion("650","No se ha podido realizar el registro","./account/create.php");
        }
    }
    
    public function login($Vemail, $Vpass){
        global $conexion;
        
        $sql = "SELECT * FROM usuario WHERE email=? ";//orden sql buscando usuario con el email registrado, si lo hay lo traemos
        $sentencia = $conexion->prepare($sql);//Preparamos sentencia
        $sentencia->bind_param("s", $Vemail);
        $sentencia->execute();// y la ejecutamos
        $resultado = $sentencia->get_result();//se obtiene el result
         if ($resultado->num_rows === 1) {//Si hay una fila se hace un fetch_Ass
             $fila = $resultado->fetch_assoc();//Es decir me crea un array asociativo
             $Vid = $fila['id'];
             $Vnom = $fila['nombre'];
             $Vap = $fila['apellido'];
             $Vtel = $fila['telefono'];
             $Vemail = $fila['email'];
             $Vpass_db= $fila['clave'];
             
             if (password_verify($Vpass, $Vpass_db)) {
                 //Se crea un obj Usuario 
                $objUsuario = new Usuario($Vid, $Vnom, $Vap, $Vtel, $Vemail, $Vpass_db);
                return $objUsuario;//con return vuelve al controlador
                
             }else{
                  throw new Excepcion("700","Contraseña incorrecta","./account/login.php");

             }
             
         }else{//SI NO HAY NINGUNA FILA QUE COINCIDA
             throw new Excepcion("750","Email incorrecto o no existe email registrado","./account/login.php");

             
         }
                           
        
    }
    
    public function getProducts(){
        global $conexion;
        
        $ArrayProd=array();
        
        $sql="SELECT * FROM producto WHERE activo = 'Y'";
        
        $stm=$conexion->prepare($sql);
        $status=$stm->execute();
        $result=$stm->get_result();
        
       if($result->num_rows>0){
           $row=$result->fetch_assoc();
           
           while($row){
               $Vid = $row['id'];
               $Vcategoria = $row['categoria'];
               $Vnombre = $row['nombre'];
               $Vprecio = $row['precio'];
               $Vdescripcion = $row['descripcion'];
               $Vruta = $row['ruta_imagen'];
               $Vsubc = $row['subcategoria'];
               
               $productList=new Producto($Vid,$Vcategoria,$Vnombre,$Vprecio,$Vdescripcion,$Vruta,null,$Vsubc);
               
               $ArrayProd[]=$productList;
               
               $row=$result->fetch_assoc();
           }return $ArrayProd;
           
       }else{
           throw new Excepcion("800","No se ha podido obtener el listado de  productos disponibles","../index.php");
       }
    }
    
    function getStores(){
        global $conexion;
        
       $ArraySt=array();
       
       $sql="SELECT * FROM sucursal";
       
       $stm=$conexion->prepare($sql);
       $status=$stm->execute();
       $result=$stm->get_result();
       
       if($result->num_rows>0){
           $row=$result->fetch_assoc();
           
           while($row){
               $Vid = $row['id'];
               $Vsucursal = $row['sucursal'];
               $Vdireccion = $row['direccion'];
               $VcodigoSucursal = $row['codigo_sucursal'];
               
               $storesList = new Sucursal($Vid, $Vsucursal, $Vdireccion, $VcodigoSucursal);
               
               $ArraySt[] = $storesList;
               
               $row = $result->fetch_assoc();
           }return $ArraySt;
       }else{
           throw new Excepcion("850","No se ha podido obtener sucursales","./carrito.php");
       }

    }
    
    function insertarOrden($idUsuario,$importeTotal,$tranckingNumber,$idSucursal,$VmetodoPago,$fechaRecogida,$horaRecogida,$VnumTarjeta,$VnomTarjeta){
        global $conexion;
 
        //Se utiliza signos de interrogacion para evitar la sql injection 
        $ordenSQL = "INSERT INTO orden VALUES(null,?,?,?,?,?,?,?,?,?)";
        
        //Se prepara la sentencia con la conexion
        $sentencia = $conexion->prepare($ordenSQL);
        $sentencia->bind_param("idsisssss", $idUsuario,$importeTotal,$tranckingNumber,$idSucursal,$VmetodoPago,$fechaRecogida,$horaRecogida,$VnumTarjeta,$VnomTarjeta); //Una var para cada ?, y s para string, i para int, b boolean
        $resultado = $sentencia->execute(); //Se ejecuta la sentencia
        
        if ($conexion->affected_rows == 1) { //Comprobacion : si afecta una fila la operacion se hizo correctamente
        return; 
        }else{
        throw new Excepcion("900","No se ha podido insertar la orden","./carrito.php");
        }
    }
    
    
    function insertarOrdenProducto($idOrden, $idProd){
        global $conexion;
        
        $ordenSQL = "INSERT INTO orden_producto VALUES(null,?,?)";
        $sentencia = $conexion->prepare($ordenSQL);
        $sentencia->bind_param("ii",$idOrden,$idProd);
        $resultado = $sentencia->execute();
        
        if($conexion->affected_rows == 1){
            return;
        }else{
             throw new Excepcion("950","No se ha podido realizar la orden","./carrito.php");
        }
    }
    
    
    function validarFormContacto($Vnombre, $Vapellido, $Vtel, $Vemail, $Vasunto,$Vmje){
        $validName="/[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/";
        $minSixPassword = "/.{6,}/";
        
        //  First Name Validation
        if(empty($Vnombre)){ 
            throw new Excepcion("100","Nombre de contacto es requerido","./formularioContacto.php");
        }elseif(!preg_match($validName,$Vnombre)){
            throw new Excepcion("110","Digitos en el campo nombre de contacto no están permitidos","./formularioContacto.php");
        }
        
        //  Last Name Validation
        if(empty($Vapellido)){
            throw new Excepcion("120","Apellido de contacto es requerido","./formularioContacto.php");
        }elseif(!preg_match($validName,$Vapellido)){
            throw new Excepcion("130","Digitos en el campo Apellido de contacto no están permitidos","./formularioContacto.php");
        }
        
        // Tel Validation
        if(empty($Vtel)){
            throw new Excepcion("140","Teléfono de contacto es requerido","./formularioContacto.php");
      
        }elseif(!is_numeric($Vtel)){
            throw new Excepcion("150","Carácter no válido en campo teléfono de contacto","./formularioContacto.php");
   
        }elseif(!preg_match($minSixPassword,$Vtel)){
            throw new Excepcion("160","Teléfono debe tener un mínimo de 9 digítos","./formularioContacto.php");
           
        }
        
        //Email Address Validation
        if(empty($Vemail)){
            throw new Excepcion("170","Email de contacto es requerido","./formularioContacto.php");
        }else{
            if(!filter_var($Vemail, FILTER_VALIDATE_EMAIL)){
                throw new Excepcion("180","Email de contacto no válido","./formularioContacto.php");
            }
        }
        
         //  Asunto Validation
        if(empty($Vasunto)){ 
            throw new Excepcion("100","Asunto es requerido","./formularioContacto.php");
        }elseif(!preg_match($validName,$Vasunto)){
            throw new Excepcion("110","Digitos en el campo Asunto no están permitidos","./formularioContacto.php");
        }
        
         //  Mensaje Validation
        if(empty($Vmje)){ 
            throw new Excepcion("100","Mensaje es requerido","./account/create.php");
        }elseif(!preg_match($validName,$Vmje)){
            throw new Excepcion("110","Digitos en el campo Mensaje no están permitidos","./formularioContacto.php");
        }
        
        return;
        
        
    }
    
    
    function enviarForm($Vnombre, $Vapellido, $Vtel, $Vemail, $Vasunto,$Vmje,$Vfecha){
        global $conexion;
        
        //Se utiliza signos de interrogacion para evitar la sql injection 
        $ordenSQL = "INSERT INTO mensajes_contacto VALUES(null,?,?,?,?,?,?,?)";
        
        //Se prepara la sentencia con la conexion
        $sentencia = $conexion->prepare($ordenSQL);
        $sentencia->bind_param("sssssss", $Vnombre,$Vapellido,$Vtel,$Vemail,$Vasunto,$Vmje,$Vfecha); //Una var para cada ?, y s para string, i para int, b boolean
        $resultado = $sentencia->execute(); //Se ejecuta la sentencia
        
        if ($conexion->affected_rows == 1) { //Comprobacion : si afecta una fila la operacion se hizo correctamente
        return; 
        }else{
        throw new Excepcion("190","No se ha podido enviar el formulario","./account/create.php");
        }
        
    }
    
    
    public function modificarConPass($Usuario,$id){
        global $conexion;
        
        $nom = $Usuario->getNombre();
        $apell = $Usuario->getApellido();
        $tel = $Usuario->getTelefono();
        $email = $Usuario->getEmail();
        $clave = $Usuario->getClave();
        
        //Encriptar con BlowFish
        $BlowFishClave=password_hash($clave,PASSWORD_BCRYPT);
        
        //Se utiliza signos de interrogacion para evitar la sql injection 
        $ordenSQL = "UPDATE usuario SET nombre=?, apellido=?, telefono=?, email=?, clave=?  WHERE id = '$id'";
        
        //Se prepara la sentencia con la conexion
        $sentencia = $conexion->prepare($ordenSQL);
        $sentencia->bind_param("sssss", $nom,$apell,$tel,$email,$BlowFishClave); //Una var para cada ?, y s para string, i para int, b boolean
        $resultado = $sentencia->execute(); //Se ejecuta la sentencia
        
        if ($conexion->affected_rows == 1) { //Comprobacion : si afecta una fila la operacion se hizo correctamente
        return; 
        }else{
        throw new Excepcion("651","No se ha podido modificar los datos","./account/perfilUsuario.php");
        }
    }
    
    
     public function modificarSinPass($Usuario,$id){
        global $conexion;
        
        $nom = $Usuario->getNombre();
        $apell = $Usuario->getApellido();
        $tel = $Usuario->getTelefono();
        $email = $Usuario->getEmail();
     
        //Se utiliza signos de interrogacion para evitar la sql injection 
        $ordenSQL = "UPDATE usuario SET nombre=?, apellido=?, telefono=?, email=? WHERE id = '$id'";
        
        //Se prepara la sentencia con la conexion
        $sentencia = $conexion->prepare($ordenSQL);
        $sentencia->bind_param("ssss", $nom,$apell,$tel,$email); //Una var para cada ?, y s para string, i para int, b boolean
        $resultado = $sentencia->execute(); //Se ejecuta la sentencia
        
        if ($conexion->affected_rows == 1) { //Comprobacion : si afecta una fila la operacion se hizo correctamente
        return; 
        }else{
        throw new Excepcion("652","No se ha podido modificar los datos.","./account/perfilUsuario.php");
        }
    }
    
    
    
    
}