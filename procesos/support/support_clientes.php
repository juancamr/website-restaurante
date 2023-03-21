<?php
require_once '../check_session.php';
include_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once '../../css_bootstrap.php'; ?>
    <style>
        p {
            font-size: 1.1rem;
            margin-bottom: 0;
        }
    </style>
</head>
<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <?php require_once './sidebar.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 bg-light">
            <h1 class="f-nav p-5 pb-0 mb-0 text-center">Administraci&oacute;n de clientes</h1>
            <div class="p-4 pt-5">
                <?php
                $sql = "SELECT * FROM cliente";
                $clientes = consultar($sql);
                $correos = "";
                if ($clientes):
                ?>
                <table class="ms-auto me-lg-5 mb-4">
                    <tr>
                        <td class="w-50">
                            <button id="copy-btn" class="btn btn-primary me-3 rounded-4">Copiar correos<i
                                        class="fa-solid fa-copy ms-2"></i></button>
                        </td>
