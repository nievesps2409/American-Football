<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/registro.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Figtree&family=M+PLUS+1p:wght@500&family=Quicksand:wght@500&family=Roboto&family=Sarabun:wght@100;200;300&display=swap" rel="stylesheet">
    
    <title>American Football</title>
</head>
<body>

    <div id="encabezado">
        <h1 id="tituloWeb">a m e r i c</h1>
        <h2>a n f o o t b a l l</h2>
        <a href="index.html">
        </a>
    </div>
    <?php
    include_once "menu.php";    
    ?>
  
  <div id="cuerpo">
        <div id="error">
            <p></p>
            <br />
        </div>
        <form id="formulario" action="register.php" method="post">
        <h3>Registrate!</h3>
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="user" placeholder="Usuario: "/>
                <br />
                <label for="password">Contraseña:</label>
                <input type="text" id="password" name="password" placeholder="Contraseña: "/>
                <br />
                <label for="repassword">Repita Contraseña:</label>
                <input type="text" id="repassword" name="repassword" placeholder="Repita Contraseña: "/>
                <br />
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name"  placeholder="Nombre" />
                <br />
                <label for="apellido1">Apellido 1:</label>
                <input type="text" id="apellido1" name="apellido1"  placeholder="Primer apellido"  />
                <br />
                <label for="apellido2">Apellido 2:</label>
                <input type="text" id="apellido2" name="apellido1"  placeholder="Segundo apellido" />
                <br />
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion"  placeholder="Dirección" />
                <br />
                <label for="genero">Género:</label>
                <select id="genero" name="genero">
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                    <option value="otro">Otro</option>
                    <option value="nsnc">NS/NC</option>
                </select>
                <br />
                <input type="submit" id="enviar" value="Enviar" />
            </div>           
        </form>
        <div id="error">

            <br />
        </div>
    </div>
    

    <div id="pieregistro">
        <div id="rrss">
            <a href="https://www.facebook.com/americanfootballmusic"><img class="iconosSociales" src="imagenes/facebook_3670032.png" alt="Logo de la f de facebook" /></a>
            <a href="https://twitter.com/americfootball"><img class="iconosSociales" src="imagenes/twitter_3670151.png" alt="Logo de pájaro de twitter" /></a>
            <a href="https://www.instagram.com/americfootball/"><img class="iconosSociales" src="imagenes/instagram_4494488.png" alt="Logo de cámara de instagram" /></a>
            <a href="https://open.spotify.com/intl-es/artist/5FwydyGVcsQllnM4xM6jw4?si=kFVdvQkSRi-fp2nAjM6Phw&nd=1"><img class="iconosSociales" src="imagenes/spotify.png" alt="Logo de spotify" /></a>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/registro.js"></script>
</body>
</html>