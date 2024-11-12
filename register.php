<?php
    include_once 'bbdd.php';

    if (isset($_POST["user"]) && isset($_POST["password"])) {
        $id_insertado = registro($_POST["user"], $_POST["password"]);

        if ($id_insertado > 0) {
            $_SESSION["user"] = $_POST["user"];
            header("Location: iniciosesion.php");
        } else {
            echo "Hubo un error al registrar el usuario.";
            header("Location: registro.php");
        }
    } else {
        echo "Por favor, rellene todos los campos.";
        header("Location: registro.php");
    }
?>