<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario de contacto</title>
        <!--CSS-->
      <link href="../CSS/formularioContacto.css" rel="stylesheet" type="text/css">
      <!--GOOGLE FONTS-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&family=Hind+Siliguri:wght@300;400;500&family=Inter:wght@300;400;500&family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <header>
            <a href="../index.php"> > Volver</a>
        </header>
        
        <main>
            <h2>Formulario de contacto</h2>
            <h3>Escríbenos y en breve nos pondremos en contacto contigo</h3>
            <form id="myForm" action="../CONTROLADORES/ControladorFormContacto.php" method = 'post' name="Formulario contacto" >
                    
                    <label for="fname">Nombre:</label>
                    <input type="text" name="nombre" required/>
                    <label for="fname">Apellido:</label>
                    <input type="text" name="apellido"  required/>
                    <label for="fname">Teléfono:</label>
                    <input type="text" name="tel" required pattern="[0-9]{9}"/>
                    <label for="email">Email:</label>
                    <input type="email" name="email"  required/>
                    <label for="email">Asunto:</label>
                    <input type="text" name="asunto"  required/>
                    <label for="fname">Mensaje:</label>
                    <textarea  type="text"name="mensaje"  required></textarea>
                    <input  id="submit" name="submit" type="submit" value="Enviar"/>
                </form>
            
        </main>
        
    </body>
</html>
