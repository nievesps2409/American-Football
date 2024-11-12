<?php
    session_start();
    include_once "bbdd.php";
    $sesionCorrecta = login($_POST["Nombre"], $_POST["contraseña"]);

    if($sesionCorrecta)
    {
        $_SESSION["Nombre"] = $_POST["Nombre"];
        $_SESSION["id_usuario"] = $sesionCorrecta;
        header("location: index.php");
    } else
    {
        header("location: inicio.html");
    }
?>
