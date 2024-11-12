<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

include_once 'bbdd.php';

function editarNoticia($id_noticia, $titulo, $descripcion, $imagen, $fecha, $resumen) {
    $mysqli = connect_database();

    $sql = "UPDATE noticia SET titulo = ?, descripcion = ?, ";
    $sql .= ($imagen === null || $imagen === '') ? "" : "imagen = ?, ";
    $sql .= "fecha = ?, resumen = ? WHERE id_noticia = ?";
    
    $sentencia = $mysqli->prepare($sql);

    if (!$sentencia) {
        echo "Fallo en la preparación de la sentencia: " . $mysqli->error;
        return false;
    }
    
    if ($imagen === null || $imagen === '') {
        $sentencia->bind_param("ssssi", $titulo, $descripcion, $fecha, $resumen, $id_noticia);
    } else {
        $sentencia->bind_param("sssssi", $titulo, $descripcion, $imagen, $fecha, $resumen, $id_noticia);
    }

    $ejecucion = $sentencia->execute();

    if (!$ejecucion) {
        echo "Fallo en la ejecución: " . $mysqli->error;
        return false;
    }
    
    $sentencia->close();

    return $ejecucion;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_noticia = $_POST['id_noticia'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $resumen = $_POST['resumen'];
    
    var_dump($_POST);

    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["size"] > 0) {
        $nombreArchivo = $_FILES["imagen"]["name"];
        $rutaArchivo = "imagenes/" . $nombreArchivo;
    
        // Cambiar el valor de imagen a la nueva ruta
        $imagen = $rutaArchivo;
    } else {
        // Mantener la imagen actual si no se subió una nueva
        $imagen = null;
    }

    $resultado = editarNoticia($id_noticia, $titulo, $descripcion, $imagen, $fecha, $resumen);

    if ($resultado) {
        echo "Noticia actualizada correctamente.";
        header("location: index.php");
    } else {
        echo "Error al actualizar la noticia.";
    }
}
?>
