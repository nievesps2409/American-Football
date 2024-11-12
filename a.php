<?php
include_once 'bbdd.php';
$id_categoria = 3; // Replace 1 with the actual category ID you want to use
$fechas = get_fecha($id_categoria);
var_dump($fechas);
?>