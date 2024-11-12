<?php
session_start(); 
$id_usuario = $_SESSION["id_usuario"]; 
include_once "bbdd.php";

if (isset($_POST['nombre'], $_POST['instrumento'], $_POST['fecha_nacimiento'], $_POST['ciudad'])) {
    $result = insertar_integrante($_POST['nombre'], $_POST['instrumento'], $_POST['fecha_nacimiento'], $_POST['ciudad']);   
    if ($result === true) {
        header('location: index.php'); 
    } else {
        header('location: index.php'); 
    }
} else {
    echo "Form data is missing.";
}
?>