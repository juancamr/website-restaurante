<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$id = $_GET["id"];
$anuncio = consultar("SELECT * FROM anuncio WHERE id_anuncio=" . $id);
