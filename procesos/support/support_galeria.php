<?php
require_once '../check_session.php';
include_once '../conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$sql = "SELECT * FROM imagenes";
$imagenes = consultar($sql);
desconectar();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Welcome</title>

    <style>
        .eliminar:hover {
            opacity: 50%;
        }
    </style>
    <?php require_once '../../css_bootstrap.php'; ?>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <?php require_once './sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10">
                <h1 class="f-nav p-5 pb-0 mb-0">Mantenimiento de galer&iacute;a</h1>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-0">
                    <div class="row p-4 w-100">
                        <?php foreach($imagenes as $imagen):?>
                        <div class="col-lg-4 col-md-6 p-4">
                            <a class="eliminar" data-bs-toggle="modal" id="<?=$imagen["id_imagen"]?>" role="button" href="#deleteImageModal">
                            <img class="img-galeria w-100 mx-auto rounded-4" src="../.<?=$imagen["href"]?>"
                                alt="imagen">
                        </a>
                        </div>
                        <?php endforeach; ?>
                        <div class="col-lg-4 col-md-6 p-4">
                            <div class="card mx-auto w-100 h-100 rounded-4 border border-success border-opacity-10">
                                <a class="btn btn-outline-dark d-flex align-items-center justify-content-center border-0 fs-1 py-5 fw-bold px-3 mx-auto rounded-4 w-100 h-100"
                                    data-bs-toggle="modal" href="#addImageModal" id="agregar" role="button">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>