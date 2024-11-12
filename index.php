<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/comun.css">
    <link rel="stylesheet" type="text/css" href="css/noticia.css">
    <link rel="stylesheet" type="text/css" href="css/inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Figtree&family=M+PLUS+1p:wght@500&family=Quicksand:wght@500&family=Roboto&family=Sarabun:wght@100;200;300&display=swap" rel="stylesheet">
    <title>American Football</title>
</head>
<body>
    <div id="encabezado">
        <h1 class="tituloWeb">a m e r i c</h1>
        <h2 class="tituloWeb">a n f o o t b a l l</h2>
    </div>
    
    <?php include_once "menu.php"; ?>

    <div id="cuerpo">
        <h5>Buscador</h5>
        <label for="categoria"></label>
        <select id="categoria">
            <option value="-1">SELECCIONA UNA CATEGORIA</option>
            <?php
            include_once 'bbdd.php';
            $cat = get_categoria();
            for($i = 0; $i < sizeof($cat); $i++) {
                echo "<option value='".$cat[$i]['id_categoria']."'>".$cat[$i]['nombre']."</option>";
            }
            ?>
        </select>

        <label for="selectFecha"></label>
        <select id="selectFecha">
            <option value="-1">SELECCIONA UNA FECHA</option>
        </select>

        <label for="selectNoticia"></label>
        <select id="selectNoticia">
            <option value="-1">SELECCIONA UNA NOTICIA</option>
        </select>

        <div id="cargaNoticia"></div>

    <h3>Últimas noticias</h3>
    <?php
    include_once 'bbdd.php';
    $not = get_noticia();
    for ($i = 0; $i < 5; $i++) {
        if (isset($not[$i])) {
            echo "<h4>".$not[$i]['titulo']."</h4>"; 
            echo "<p>".$not[$i]['descripcion']."</p>";
            echo "<img class='noticia' src='".$not[$i]['imagen']."' alt='Descripción de la imagen'>";
            echo "<p>".$not[$i]['fecha']."</p>";
            echo "<p>".$not[$i]['resumen']."</p>";
        }
    }
    ?>

    <div id="proximasfechas" class="inicio">
        <h3>Próximas fechas de gira</h3>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023/11/19</td> 
                    <td>São Paulo, Brazil</td>
                    <td>$20</td>
                </tr>
                <tr>
                    <td>2023/11/21</td>
                    <td>Comuna 15, Argentina</td>
                    <td>$25</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3>Resumen de merchandising</h3>
    <div class="imagen">
        <div class="producto">
            <img src="imagenes/i+cried+at+the+gig.webp" alt="camiseta blanca american football">
            <br>
            <span>$24.99</span>
        </div>

        <div class="producto">
            <img src="imagenes/Screen+Shot+2023-06-12+at+12.24.44+PM.webp" alt="camiseta negra american football">
            <br>
            <span>$24.99</span>
        </div>

        <div class="producto">
            <img src="imagenes/eef6f4457ee96f8bae1893f5b234d2382f3ebf625f7f9b7be2d0545bfb57bd03e774ada5_thumbnail.jpg" alt="Banderín de american football">
            <br>
            <span>$29.99</span>     
        </div>    

        <div class="producto">
            <img src="imagenes/AF-Deluxe-004.webp" alt="Discos de american football">
            <br>
            <span>$39.99</span>
        </div>
    </div>
</div>
    <div id="pie1">
        <div id="rrss">
            <a href="https://www.facebook.com/americanfootballmusic"><img class="iconosSociales" src="imagenes/facebook_3670032.png" alt="Logo de la f de facebook"></a>
            <a href="https://twitter.com/americfootball"><img class="iconosSociales" src="imagenes/twitter_3670151.png" alt="Logo de pájaro de twitter"></a>
            <a href="https://www.instagram.com/americfootball/"><img class="iconosSociales" src="imagenes/instagram_4494488.png" alt="Logo de cámara de instagram"></a>
            <a href="https://open.spotify.com/intl-es/artist/5FwydyGVcsQllnM4xM6jw4?si=kFVdvQkSRi-fp2nAjM6Phw&nd=1"><img class="iconosSociales" src="imagenes/spotify.png" alt="Logo de Spotify"></a>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/buscador.js"></script>
</body>
</html>
