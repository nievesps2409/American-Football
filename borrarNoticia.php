<?php
include_once("bbdd.php");

// Connect to the database
$mysqli = connect_database();

if ($mysqli) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_noticia'])) {
        // Handle delete request
        $id_noticia = $_POST['id_noticia'];
        $sql = "DELETE FROM noticia_categoria WHERE id_noticia = ?";
        $sentencia = $mysqli->prepare($sql);
        $sentencia->bind_param("i", $id_noticia);
        $sentencia->execute();
        

        $sql = "DELETE FROM noticia WHERE id_noticia = ?";
        $sentencia = $mysqli->prepare($sql);
        $sentencia->bind_param("i", $id_noticia);
        if ($sentencia->execute()) {
            // If deletion was successful, echo 'success'
            echo 'success';
            exit; // Exit to prevent further execution
        } else {
            echo "Error al borrar la noticia.";
        }
        $sentencia->close();
    } else {
        echo "No se recibió la información necesaria para borrar la noticia.";
    }
} else {
    echo "Error connecting to the database.";
}
?>