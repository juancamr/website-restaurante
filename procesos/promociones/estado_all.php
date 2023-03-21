<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

if (isset($_GET["active"])) {
    $id = consultar("SELECT MIN(id_anuncio) FROM anuncio");
    $query = "UPDATE anuncio SET flag=\"T\" WHERE id_anuncio=" . $id[0]["MIN(id_anuncio)"];