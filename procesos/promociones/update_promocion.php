<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

if (isset($_GET["active"])) {
    ejecutar("UPDATE anuncio set flag=\"F\"");
    $id = $_GET["id"];
    $sql = "UPDATE anuncio SET flag=\"T\" WHERE id_anuncio=" . $id;

    if (ejecutar($sql)) {
        header("location: ../support/support_promociones.php");
    } else {
        echo "Error, no se pudo agregar el elemento";
    }
} else {
    $id = $_POST["id_anuncio"];
    $head = trim(strtoupper($_POST["head_edit"]));
    $titulo = trim(strtoupper($_POST["titulo_edit"]));
    $contenido = trim(htmlentities($_POST["contenido_edit"]));
