<?php
include_once 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_noticia'])) {
        $id_noticia = $_POST['id_noticia'];
        $resultado = borrar_noticia($id_noticia);

        if ($resultado) {
            echo "Noticia borrada correctamente.";
            header("location: index.php");
            exit(); // Asegurar que el script se detenga después de una eliminación exitosa
        } else {
            echo "Error al borrar la noticia.";
        }
    } else {
        echo "No se proporcionó el ID de la noticia.";
    }
}

function borrar_noticia($id_noticia) {
    $mysqli = connect_database();
    if ($mysqli->connect_error) {
        die('Error de Conexión (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }

    $sql = "DELETE FROM noticia WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
        echo "Fallo en la preparación de la sentencia: " . $mysqli->error;
        return false;
    }
    $sentencia->bind_param("i", $id_noticia);
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
        echo "Fallo en la ejecución: " . $sentencia->error; // Cambiado de $mysqli->error a $sentencia->error
        return false;
    }
    $sentencia->close();
    return $ejecucion;
}
?>