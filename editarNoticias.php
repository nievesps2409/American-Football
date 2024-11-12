<?php
session_start();
if(!isset($_SESSION["Nombre"])) {
    header("Location: iniciosesion.php");
    exit;
} 

include_once 'bbdd.php';

$mysqli = connect_database();

if (!isset($_GET['id_noticia'])) {
    echo "No news ID provided.";
    exit;
}

$id_noticia = $_GET['id_noticia'];

$sql = "SELECT * FROM noticia WHERE id_noticia = ?";
$sentencia = $mysqli->prepare($sql);
$sentencia->bind_param("i", $id_noticia);
$sentencia->execute();
$resultado = $sentencia->get_result();
$noticia = $resultado->fetch_assoc();

if ($noticia) {
    $titulo = $noticia["titulo"];
    $descripcion = $noticia["descripcion"];
    $imagen = $noticia["imagen"];
    $fecha = $noticia["fecha"];
    $resumen = $noticia["resumen"];
} else {
    $titulo = $descripcion = $imagen = $fecha = $resumen = "";
}

$mysqli->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/editar.css" />
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
<?php include_once "menu.php"; ?>
   <div id="cuerpo">

    <h3>Editar noticia</h3>
    <form method="post" action="updateNoticia.php" enctype="multipart/form-data">
        <input type="hidden" id="id_noticia" name="id_noticia" value="<?php echo $_GET["id_noticia"]; ?>" />
        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" placeholder="Escriba el titulo de la noticia" value="<?php echo $noticia['titulo']; ?>"/>
        <label for="descripcion">Texto</label>
        <textarea id="descripcion" name="descripcion" rows="5" cols="50" maxlength="250"><?php echo $noticia['descripcion']; ?></textarea>
        <br />
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
        <br />
        <label for="fecha">Fecha: </label>
        <input type="date" id="fecha" name="fecha" placeholder="YYYY\MM\DD" value="<?php echo $noticia['fecha']; ?>" />
        <br />
        <label for="resumen">Resumen: </label>
        <input type="text" id="resumen" name="resumen" placeholder="Escriba el resumen de la noticia" value="<?php echo $noticia['resumen']; ?>" />
        <br />
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