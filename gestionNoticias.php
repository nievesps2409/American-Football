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
    <link rel="stylesheet" type="text/css" href="css/gestion.css" />
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
        <a href="index.html">
        </a>
</div>
        <?php
            include_once "menu.php";    
        ?>
   <div id="cuerpo">
   <div id="controlesFiltro">         
            <input type="text" id="filtro" name="filtro" placeholder="Introduce tu busqueda"/>
        </div>
    <table id="Busqueda">
            <tr>
                <th>Titulo</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            <?php
    include_once("bbdd.php");
    // Connect to the database
    $mysqli = connect_database();

    if ($mysqli) {
        $sql = "SELECT id_noticia, titulo, descripcion FROM noticia";
        $sentencia = $mysqli->prepare($sql);

        if ($sentencia) {
            // Execute the query
            $sentencia->execute();

            // Get the results
            $resultado = $sentencia->get_result();

            // Loop through the results
            while ($noticia = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$noticia["titulo"]."</td>";
                echo "<td><a href='editarNoticias.php?id_noticia=".$noticia["id_noticia"]."' class='boton'><img src='imagenes/editar-archivo.png' alt='Editar'></a></td>";
                echo "<td><a href='#' data-id_noticia='".$noticia["id_noticia"]."' class='botton'><img src='imagenes/borrar.png' alt='Borrar'></a></td>";
                echo "</tr>";
            }

            // Close the statement
            $sentencia->close();
        } else {
            echo "Error preparing the SQL statement.";
        }
    } else {
        echo "Error connecting to the database.";
    }
    ?>
</table>
</div>    
    <div id="pie1">
        <div id="rrss">
            <a href="https://www.facebook.com/americanfootballmusic"><img class="iconosSociales" src="imagenes/facebook_3670032.png" alt="Logo de la f de facebook" /></a>
            <a href="https://twitter.com/americfootball"><img class="iconosSociales" src="imagenes/twitter_3670151.png" alt="Logo de pájaro de twitter" /></a>
            <a href="https://www.instagram.com/americfootball/"><img class="iconosSociales" src="imagenes/instagram_4494488.png" alt="Logo de cámara de instagram" /></a>
            <a href="https://open.spotify.com/intl-es/artist/5FwydyGVcsQllnM4xM6jw4?si=kFVdvQkSRi-fp2nAjM6Phw&nd=1"><img class="iconosSociales" src="imagenes/spotify.png" alt="Logo de spotify" /></a>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/Confirmar.js"></script>
    <script src="js/busqueda.js"></script>
</body>
</html>
