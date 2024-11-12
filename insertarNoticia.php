<?php
session_start();
if(!isset($_SESSION["Nombre"])) {
    header("Location: iniciosesion.php");
    exit;
} 
include_once 'bbdd.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/InsertNot.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Figtree&family=M+PLUS+1p:wght@500&family=Quicksand:wght@500&family=Roboto&family=Sarabun:wght@100;200;300&display=swap" rel="stylesheet">
    
    <title>American Football</title>
</head>
<body>
<div id="encabezado">
        <h1 id="tituloWeb">a m e r i c</h1>
        <h2 id="tituloWeb">a n f o o t b a l l</h2>
        <a href="index.php">
        </a>
        </div>
        <?php
            include_once "menu.php";    
        ?>

   <div id="cuerpo">
        <h3>Insertar Noticia</h3>
        <form id="formulario" method="post" action="insertNew.php" enctype="multipart/form-data">
            <label class = "titulito" for="titulo">Título: </label>
            <input type="text" id="titulo" name="titulo" placeholder="Escriba el titulo del juego" />
            <br />
            <label class = "titulito" for="descripcion">Descripcion: </label>
            <textarea id="descripcion" name="descripcion" rows="5" cols="50" maxlength="250">
            </textarea>
            <br />
            <label class = "titulito" for="imagen">Imagen: </label>
            <input type="file" id="imagen" name="imagen" placeholder="Escriba ruta de la imagen" accept="image/*" />
            <br />
            <label class = "titulito for="fecha">Fecha: </label>
            <input type="date" id="fecha" name="fecha" placeholder="Escribe una fecha" />
            <br />
            <label class = "titulito  for="resumen">Resumen: </label>
            <textarea id="resumen" name="resumen" rows="5" cols="50" maxlength="250">
            </textarea>
            <br />
            <select id="id_categoria" name="id_categoria[]" multiple>
            <option value="3">Concierto</option>
            <option value="4">Gira</option>
            <option value="5">Información Adicional</option>
            </select>
            <input type="submit" id="enviar" value="Enviar" />
        </form>
    </div>

    <div id="pie1">
        <div id="rrss">
            <a href="https://www.facebook.com/americanfootballmusic"><img class="iconosSociales" src="imagenes/facebook_3670032.png" alt="Logo de la f de facebook" /></a>
            <a href="https://twitter.com/americfootball"><img class="iconosSociales" src="imagenes/twitter_3670151.png" alt="Logo de pájaro de twitter" /></a>
            <a href="https://www.instagram.com/americfootball/"><img class="iconosSociales" src="imagenes/instagram_4494488.png" alt="Logo de cámara de instagram" /></a>
            <a href="https://open.spotify.com/intl-es/artist/5FwydyGVcsQllnM4xM6jw4?si=kFVdvQkSRi-fp2nAjM6Phw&nd=1"><img class="iconosSociales" src="imagenes/spotify.png" alt="Logo de spotify" /></a>
        </div>
    </div>
    
</body>
</html>