<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de Usuario | StarBugs</title>
    <!--CSS-->
        <link href="../../CSS/create.css" rel="stylesheet" type="text/css">
        <!--GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
        <!--JS-->
        <script src="../../JS/password.js" type="text/javascript"></script>
    </head>
    <body>
   
        <header>
        <nav>
            <div class="logo">
                <a href="../../index.php" >
                    <img src="../../images/logo.png" alt="StarBugs">
             </a>
            </div>
                    
                
            <ul class="nav-links" style="visibility:hidden">
              <li><a class="nav-link" href="#" class="text-bold">CARTA</a></li>
              <li><a class="nav-link" href="#" class="text-bold">CAFÉ</a></li>
              <li><a class="nav-link" href="#" class="text-bold">RESPONSABILIDAD</a></li>
              <li><a class="nav-link" href="#" class="text-bold">MERCHADISING</a></li>
            </ul>
        </nav>

        <div class="btns" style="visibility:hidden">
          <a class="btn" id="login" href="#">Iniciar sesión</a> 
          <a class="btn btn--black" href="#">Registrarse</a>
        </div>  
    </header>

<!-- PASS : pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->
        <main>
   
                <h1>Registrarse</h1>
                <form onSubmit = "return verifyPass(this)" id="myForm" action="../../CONTROLADORES/ControladorAltaUsuario.php" method = 'post' name="Formulario altas" >
                    <h3>Información Personal</h3>
                    <label for="fname">Nombre:</label><br>
                    <input type="text" name="nombre" required/>
                    <label for="fname">Apellido:</label><br>
                    <input type="text" name="apellido"  required/>
                    <label for="fname">Teléfono:</label><br>
                    <input type="text" name="tel" required pattern="[0-9]{9}"/>

                    <h3 id="h3-2">Seguridad de la cuenta</h3>
                    <label for="email">Email:</label><br>
                    <input type="email" name="email"  required/>
                    <label for="pass">Contraseña:</label><br>
                    <input id="pass1" type="password" name="pass" maxlength="15" minlength="6" required/>
                    <label for="pass">Repetir Contraseña:</label><br>
                    <input  id="pass2" type="password" name="pass2" maxlength="15" minlength="6" required/>

                    <input  id="submit" name="submit" type="submit" value="REGISTRARSE"/>
                </form>
      
        </main>
 
    </body>
</html>
