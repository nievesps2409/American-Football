<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 86400");
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

header('Content-Type: application/json; charset=utf-8');

include_once('bbdd.php');

$funcion = isset($_POST['function']) ? $_POST['function'] : '';

if ($funcion == 'getNoticias') {
    $not = get_noticia();
    echo json_encode($not, JSON_PRETTY_PRINT);
} elseif ($funcion == 'get_Categoria') {
    $cat = get_categoria();
    echo json_encode($cat, JSON_PRETTY_PRINT);
} elseif ($funcion == 'get_fecha') {
    if (isset($_POST['idCategoria'])) {
        $idCategoria = $_POST['idCategoria'];
        $fecha = get_fecha($idCategoria);
        echo json_encode($fecha, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['error' => 'Falta el parámetro idCategoria'], JSON_PRETTY_PRINT);
    }
} elseif ($funcion == 'get_titulos_noticias_categoria_fecha') {
    if (isset($_POST['idCategoria']) && isset($_POST['fecha'])) {
        $idCategoria = $_POST['idCategoria'];
        $fecha = $_POST['fecha'];
        $titulos = get_noticia_fecha($idCategoria, $fecha);
        echo json_encode($titulos, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['error' => 'Faltan parámetros idCategoria y/o fecha'], JSON_PRETTY_PRINT);
    }
} elseif ($funcion == 'get_noticias_id') {
    if (isset($_POST['idNoticia'])) {
        $id = $_POST['idNoticia'];
        $not = get_noticias_id($id);
        echo json_encode($not, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['error' => 'Falta el parámetro idNoticia'], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['error' => 'Función no válida'], JSON_PRETTY_PRINT);
}
//si el usuario existe en la base de datos no se permite el registro

?>
