<?php
// Start the session at the beginning of the file
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div id="menu">
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li>
            <a href="gira.php">Gira</a>
            <ul>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="compras.php">Compras</a></li>
            </ul>
        </li>
        <li><a href="miembros.php">Miembros</a></li>
        <li><a href="discografia.php">Discografía</a></li>

        <?php  
        
        if (isset($_SESSION["Nombre"])) {
            echo "<li><a href='insertarNoticia.php'>Insertar Noticia</a></li>";
            echo "<li><a href='gestionNoticias.php'>Gestión Noticia</a></li>";
            echo "<li><a href='integrante.php'>Añadir integrante</a></li>";
            echo "<li><a href='logout.php'>Salir</a></li>";
        } else {
            echo "<li><a href='registro.php'>Registro</a></li>";
            echo "<li><a href='iniciosesion.php'>Log in</a></li>";
        }
        ?>
    </ul>
</div>
