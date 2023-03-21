<?php
require_once '../check_session.php';
include_once '../conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$sql = "SELECT * FROM categoria_" . $_GET["section"] . " ORDER BY id_categoria ASC";
$categorias = consultar($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../../css_bootstrap.php'; ?>
    <style>.bg-blue {
            background-color: #102c54
        }

        .edit-element {
            color: #20160d
        }

        .edit-element:hover {
            color: #ad985f
        }</style>
</head>

<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <?php require_once './sidebar.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 bg-light">
            <h1 class="f-nav p-5 pb-0 mb-0">Mantenimiento de carta</h1>
            <div class="row p-4">
                <?php foreach ($categorias as $cat): ?>
                    <div class="col-lg-4 col-md-6 p-4 ">
                        <div id="cat<?= $cat["id_categoria"] ?>"
                             class="card mx-auto w-100 rounded-4 border border-success border-opacity-10"
                             style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li
                                        class="list-group-item rounded-4 fw-bold fs-5 border-bottom-0 text-center my-3 mb-2 px-4 pb-0">
                                    <table class="w-100">
                                        <tr>
                                            <td class="w-75 text-start f-brand">
                                                <?= $cat["nombre"] ?>
                                            </td>
                                            <td class="w-25 text-end">
                                                <a data-name-cat="<?= $cat["nombre"] ?>"
                                                   class="editar btn btn-outline-dark border-0"
                                                   id="ec<?= $cat["id_categoria"] ?>" data-bs-toggle="modal"
                                                   role="button">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <?php if ($_GET["section"] == "espadas" && $cat["id_categoria"] != 5): ?>
                                    <li class="list-group-item fs-6 border-bottom-0 px-4">
                                        <table class="w-100">
                                            <tr>
                                                <td style="width:70%">
                                                </td>
                                                <td style="width: 30%" class="text-end">
                                                    <div class="row">
                                                        <div class="col-6 px-0 text-center f-brand fw-normal">
                                                            ARG
                                                        </div>
                                                        <div class="col-6 px-0 text-center f-brand fw-normal">
                                                            USA
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                <?php endif; ?>
                                <?php
                                $sql = "SELECT * FROM elemento_" . $_GET["section"] . " WHERE id_categoria=" . $cat["id_categoria"] . " ORDER BY id_elemento ASC";
                                $elementos = consultar($sql);
                                foreach ($elementos as $element):
                                    ?>
                                    <li class="list-group-item fs-6 border-bottom-0 px-4">
                                        <a
                                                class="edit-element text-decoration-none"
                                                id="el<?= $element["id_elemento"] ?>" role="button">
                                            <table class="w-100">
                                                <tr class="f-brand">
                                                    <td style="width: 70%">
                                                        <?= $element["nombre"] ?>
                                                    </td>
                                                    <td style="width: 30%">
                                                        <?php if ($_GET["section"] == "espadas" && $cat["id_categoria"] != 5): ?>
                                                            <div class="row">
                                                                <div class="col-6 px-0 text-center">
                                                                    <?= $element["precio_arg"] ?>
                                                                </div>
                                                                <div class="col-6 px-0 text-center">
                                                                    <?= $element["precio_usa"] ?>
                                                                </div>
                                                            </div>
                                                        <?php elseif ($cat["id_categoria"] == 5): ?>
                                                            <div class="text-end">
                                                                S/<?= $element["precio_arg"] ?>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="text-end">
                                                                S/<?= $element["precio"] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                                <a data-name-cat="<?= $cat["nombre"] ?>"
                                   class="f-nav btn btn-dark agregar my-3 mb-4 fw-bold px-4 mx-auto rounded-4"
                                   id="<?= $cat["id_categoria"] ?>" data-bs-toggle="modal"
                                   href="#addElementModal"
                                   role="button">
                                    <i class="fa-solid fa-plus"></i> Agregar
                                </a>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-lg-4 col-md-6 p-4 ">
                    <div
                            class="card mx-auto w-100 rounded-4 border border-success border-opacity-10 h-100"
                            style="width: 18rem;">
                        <a class="btn btn-outline-dark d-flex align-items-center justify-content-center border-0 fs-1 py-5 fw-bold px-3 rounded-4 w-100 h-100"
                           data-bs-toggle="modal" href="#addCategoryModal" id="add_category_btn"
                           role="button">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <!--        Ventana para agregar elemento-->
        <div class="modal fade" id="addElementModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header border-bottom-0 p-5 pb-4">
                        <h1 class="fw-bold mb-0 fs-3 f-brand text-muted" id="nombre_categoria_add"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-0 f-brand">
                        <form id="action-id" method="post">
                            <div class="form-floating mb-3 mt-1">
                                <input name="nombre_elemento_add" id="nombre_elemento_add" type="text"
                                       class="form-control rounded-3" placeholder="Nombre elemento" required
                                >
                                <label for="nombre_elemento_add">Nombre</label>
                            </div>
                            <div class="d-none">
                                <input type="text" name="tipo_categoria_add" value="<?= $_GET["section"] ?>">
                            </div>
                            <?php if ($_GET["section"] == "espadas"): ?>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-brown text-light">S/</span>
                                            <div class="form-floating">
                                                <input name="precio_arg_add" id="precio_arg_add" type="text"
                                                       class="form-control" pattern="[0-9]+" required
                                                >
                                                <label for="precio_arg_add">Precio Argentino</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-brown text-light">S/</span>
                                            <div class="form-floating">
                                                <input name="precio_usa_add" id="precio_usa_add" type="text"
                                                       class="form-control" pattern="[0-9]+" required
                                                >
                                                <label for="precio_usa_add">Precio Americano</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-brown text-light">S/</span>
                                    <div class="form-floating">
                                        <input name="precio_add" id="precio_add" type="text"
                                               class="form-control" pattern="[0-9]+" required
                                        >
                                        <label for="precio_add">Precio</label>
                                    </div>
                                </div>
                            <?php endif;
                            if ($_GET["section"] != "espadas"): ?>
                                <div class="form-floating mb-3 mt-1 descripcion-area">
                                    <textarea class="w-100 form-control" name="descripcion" id="descripcion"
                                              style="height: 150px; resize: none;"></textarea>
                                    <label for="descripcion">Descripci&oacute;n</label>
                                </div>
                            <?php endif; ?>
                            <div class="modal-footer border-top-0 p-0 f-nav">
                                <button type="button" class="btn btn-outline-secondary me-2 p-2 px-3 rounded-4"
                                        data-bs-dismiss="modal">Cancelar
                                </button>
                                <button type="submit"