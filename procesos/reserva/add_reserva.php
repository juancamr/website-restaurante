<?php
require_once '../conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

$cant_personas = $_POST["cantidad_personas"];
$fecha = $_POST["fecha_reserva"];