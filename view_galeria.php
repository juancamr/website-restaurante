<?php
include_once './procesos/conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$sql = "SELECT * FROM imagenes";
$imagenes = consultar($sql);
desconectar();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once './css_bootstrap.php'; ?>
    <style>
        .images-container {
            animation: fadeIn 3s;
