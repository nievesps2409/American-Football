<?php
    session_start();
    unset($_SESSION["Nombre"]);
    header("location: index.php");
?>