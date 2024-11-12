<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/compras.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Figtree&family=M+PLUS+1p:wght@500&family=Quicksand:wght@500&family=Roboto&family=Sarabun:wght@100;200;300&display=swap" rel="stylesheet">
    
    <title>American Football</title>
</head>
<body>

    <div id="encabezado">
        <h1 id="tituloWeb">a m e r i c</h1>
        <h2>a n f o o t b a l l</h2>
        <a href="index.php">
        </a>
    </div>
    <?php
            include_once "menu.php";    
        ?>
    <div id="cuerpo">
        
    <div class="container">
        <h3>Compra de Entradas - American Football</h3>
        <form action="procesar_compra.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="cantidad">Cantidad de Entradas:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" required>

            <label for="metodo_pago">Método de Pago:</label>
            <select id="metodo_pago" name="metodo_pago" required>
                <option value="tarjeta">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
                <option value="efectivo">Efectivo en el Evento</option>
            </select>

            <button type="submit">Comprar Entradas</button>
        </form>
    </div>
        
    </div>
    <div id="pie">
        <div id="rrss">
            <a href="https://www.facebook.com/americanfootballmusic"><img class="iconosSociales" src="imagenes/facebook_3670032.png" alt="Logo de la f de facebook" /></a>
            <a href="https://twitter.com/americfootball"><img class="iconosSociales" src="imagenes/twitter_3670151.png" alt="Logo de pájaro de twitter" /></a>
            <a href="https://www.instagram.com/americfootball/"><img class="iconosSociales" src="imagenes/instagram_4494488.png" alt="Logo de cámara de instagram" /></a>
            <a href="https://open.spotify.com/intl-es/artist/5FwydyGVcsQllnM4xM6jw4?si=kFVdvQkSRi-fp2nAjM6Phw&nd=1"><img class="iconosSociales" src="imagenes/spotify.png" alt="Logo de spotify" /></a>
        </div>
    </div>
</body>
</html>