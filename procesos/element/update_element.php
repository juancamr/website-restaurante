<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$nombre = trim(htmlentities($_POST["nombre_elemento"]));
$id_elemento = $_POST["id_elemento"];
$category_type = $_POST["tipo_categoria"];
$id_categoria = consultar("SELECT id_categoria FROM elemento_" . $category_type . " WHERE id_elemento=" . $id_elemento);
