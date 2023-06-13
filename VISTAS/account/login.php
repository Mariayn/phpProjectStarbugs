<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | StarBugs</title>
    <!--CSS-->
    <link href="../../CSS/login.css" rel="stylesheet" type="text/css">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    <!--FONT-AWESOME-->
    <script src="https://kit.fontawesome.com/68ca212b88.js" crossorigin="anonymous"></script>
    <!--JS-->
    <script src="../../JS/password.js" type="text/javascript"></script>
</head>
<body>
 
    <header class="header">
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
   


        <main>
        
                <form action="../../CONTROLADORES/ControladorLogin.php" method = 'post' name="Form login" >
                    <label for="email">Email:</label><br>
                    <input class="emailInput" type="email" name="email" required/>
                    <label for="pass">Contraseña:</label><br>
                    
                    <div id="passDiv">
                       <input id="passInput" type="password" name="pass" maxlength="15" minlength="6" required/> 
                       <i onclick="showPass()" id="eye" class="fa-solid fa-eye"></i>
                    </div>

                    <input class="emailInput" id="submit" name="submit" type="submit" value="Iniciar sesión"/>
                </form>
                <div id="signup">
                    <p>¿No tienes una cuenta? 
                        <a href="create.php">Regístrate</a>
                    </p>
                </div>
          

        </main>



    

</body>
</html>