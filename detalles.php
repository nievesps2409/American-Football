<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/inicio.css" />
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
<?php
include_once 'bbdd.php';
$not = get_noticia_id($_GET['id_noticia']);
echo "<h3>".$not['titulo']."</h3>";
?>
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