<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$head = trim(strtoupper($_POST["head_add"]));
$titulo = trim(strtoupper($_POST["titulo_add"]));
$contenido = trim(htmlentities($_POST["contenido"]));
desconectar();
