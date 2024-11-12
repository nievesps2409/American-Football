<?php
session_start(); 
$id_usuario = $_SESSION["id_usuario"];
include_once "bbdd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
    $target_dir = "imagenes/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        $imagen = $target_file;
        $result = insertar_noticia($_POST['titulo'], $_POST['descripcion'], $imagen, $_POST['fecha'], $_POST['resumen']);
        var_dump ($_POST['id_categoria']);
        foreach ($_POST['id_categoria'] as $categoria) {
            crear_categoria($result, $categoria);
        }
        
        header('location: index.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>