<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$nombre = $_POST["nombre_elemento_add"];
$category_type = $_POST["tipo_categoria_add"];
$id_categoria = $_GET["id"];
