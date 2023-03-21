<?php
require_once '../check_session.php';
include_once '../conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$sql = "SELECT * FROM anuncio";
$anuncios = consultar($sql);
$anuncio_activo = consultar("SELECT * FROM anuncio WHERE flag=\"T\"");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Welcome</title>

    <?php require_once '../../css_bootstrap.php'; ?>
    <style>#img-anuncio:hover {
            opacity: 50%
        }

        .card_anuncio:hover, .card_anuncio_active {
            border: 1px solid #ad985f !important
        }</style>
</head>

<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <?php require_once './sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10">
            <h1 class="f-nav p-5 pb-0 mb-0">Mantenimiento de anuncios</h1>
            <div class="form-check form-switch align-items-end p-5 pb-3" style="margin-left: 4rem;">
                <input class="form-check-input fs-4" type="checkbox" role="switch" id="switch-anuncio"
                    <?php if ($anuncio_activo): ?> checked <?php endif; ?>>
                <label class="form-check-label fs-4 f-nav" for="flexSwitchCheckChecked">Habilitar anuncios</label>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-0">
                <div class="row pt-0 p-4 w-100">
                    <?php foreach ($anuncios as $anuncio): ?>
                        <div class="col-lg-4 col-md-6 p-4">
                            <div id="ca<?= $anuncio["id_anuncio"] ?>"
                                 class="card card_anuncio mx-auto w-100 h-100 rounded-4 border border-success border-opacity-10 p-4">
                                <table class="mb-2">
                                    <tr class="w-100">
                                        <td class="w-25 d-none">
                                            <input id="ar<?= $anuncio["id_anuncio"] ?>" type="radio"
                                                   name="anuncios-radio"
                                                   class="me-auto anuncios-radio" <?php if ($anuncio["flag"] == "T"): ?>
                                                checked <?php endif; ?>>
                                        </td>
                                        <td class="w-75 text-end">
                                            <a role="button" data-bs-toggle="modal" id="<?= $anuncio["id_anuncio"] ?>"
                                               class="btn edit-anuncio btn-outline-dark border-0"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                </table>
                                <div id="an<?= $anuncio["id_anuncio"] ?>" class="card-content-anuncio">
                                    <div class="p-0 mb-3">
                                        <h3 class="mb-0 f-nav fw-bold text-gold"><?= $anuncio["head"] ?></h3>
                                    </div>
                                    <p class="f-nav mb-3 fw-bold"><?= $anuncio["titulo"] ?></p>
                                    <img src="../../<?= $anuncio["src_imagen"] ?>" alt="img-anuncio"
                                         class="rounded-3 w-100 mb-3">
                                    <p class="f-nav mb-3" style="text-align: justify;"><?= $anuncio["contenido"] ?>
                                    </p>
                                    <div class="w-75">
                                        <a href="<?= $anuncio["href"] ?>" class="btn btn-dark f-nav">Saber m&aacute;s<i
                                                    class="fa-solid fa-angle-right ms-2" style="font-size: 0.8rem;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                    $count = consultar("SELECT COUNT(*) FROM anuncio");
                    if ($count[0]["COUNT(*)"] < 4) :?>
                        <div class="col-lg-4 col-md-6 p-4">
                            <div class="card mx-auto w-100 h-100 rounded-4 border border-success border-opacity-10">
                                <a class="btn btn-outline-dark d-flex align-items-center justify-content-center border-0 fs-1 py-5 fw-bold px-3 mx-auto rounded-4 w-100 h-100"
                                   data-bs-toggle="modal" href="#addAnuncioModal" id="agregar" role="button">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </main>

        <!-- Ventana para agregar anuncio-->
        <div class="modal fade" id="addAnuncioModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rounded-4 shadow p-4">
                    <div class="modal-header border-bottom-0 p-0 mb-3">
                        <h3 class="mb-0 f-nav fw-bold text-gold">AGREGAR ANUNCIO</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 f-nav">
                        <form enctype="multipart/form-data" action="../promociones/add_promocion.php"
                              method="post">
                            <div class="form-floating mb-3 mt-1">
                                <input name="head_add" id="head_add" type="text"
                                       class="form-control rounded-3 mb-3 fw-bold text-gold" placeholder="Titulo"
                                       required
                                >
                                <label for="head_add">Header</label>
                            </div>
                            <div class="form-floating mb-3 mt-1">
                                <input name="titulo_add" id="titulo_add" type="text"
                                       class="form-control rounded-3 mb-3 fw-bold" placeholder="Titulo" required
                                >
                                <label for="titulo_add">T&iacute;tulo</label>