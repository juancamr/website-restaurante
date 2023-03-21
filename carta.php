<?php
include_once './procesos/conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Men&uacute;</title>
    <?php require_once './css_bootstrap.php'; ?>

    <style>*{margin:0;padding:0}.carta{font-family:Lora,serif}.accordion-button{padding:2px 0;background-color:unset}.accordion-item{border:0}.accordion-button:after{content:none}@media only screen and (min-width:500px){#row-container .fa-solid{font-size:1rem;padding:4px}}@media only screen and (min-width:1100px){#cartas_container{width:50%!important;margin:0 auto}}#cartas{transition:background-color .3s}.col-2{text-align:center}.image-category{height:600px;background-position:center;background-repeat:no-repeat;background-size:auto 100%}.navbar-fade{box-shadow:0 30px 40px rgba(0,0,0,.1)}.btn-outline-dark{--bs-btn-color:#AD985F!important;--bs-btn-border-color:#20160D!important}.border-gold{border-color:#ad985f}#cartas_category .col-2{padding:0}.relleno{height:86px}.modal-body table{width:100%}.carousel-item p{text-align:justify}@media only screen and (max-width:400px){#panelCortes .carousel-item{height:370px}}@media only screen and (min-width:400px){#panelCortes .carousel-item{height:400px}}.btn-link:active{background-color:#ad985f;color:#fff}</style>
</head>

<body>
<!-- navbar -->
<?php require_once("header.php"); ?>

<!-- menu container -->
<div class="bg-white">
    <div style="height: 120px;"></div>
    <div class="top-container container my-5 py-4 pb-2 py-md-5">
        <div class="px-3 px-sm-0 pb-3 pb-md-4">
            <h1 class="text-center f-nav text-gold mb-5">SOLO LO MEJOR EN TU MESA</h1>
        </div>
        <h5 class="text-center f-nav text-muted mb-0 pt-4">NUESTRA CARTA</h5>
        <div id="relleno"></div>
        <div id="cartas" class="py-4 bg-white w-100" style="z-index: 4">
            <div id="cartas_container">
                <div id="cartas_category" class="px-3">
                    <div class="row">
                        <div class="col-2">
                            <a id="link-espada" href="#espada_category" class="btn-link btn btn-outline-dark"><i
                                        class="fa-solid fa-fire-burner"></i></a>
                        </div>
                        <div class="col-2">
                            <a id="link-plato" href="#platos_personales_category" class="btn btn-outline-dark btn-link"><i
                                        class="fa-solid fa-utensils"></i></a>
                        </div>
                        <div class="col-2">
                            <a id="link-burguer" href="#burguer_category" class="btn btn-outline-dark btn-link"><i class="fa-solid fa-burger"></i></a>
                        </div>
                        <div class="col-2">
                            <a id="link-postre" href="#postre_category" class="btn btn-outline-dark btn-link"><i
                                        class="fa-solid fa-cheese"></i></a>
                        </div>
                        <div class="col-2">
                            <a id="link-refresco" href="#refresco_category" class="btn btn-outline-dark btn-link"><i
                                        class="fa-solid fa-martini-glass-citrus"></i></a>
                        </div>
                        <div class="col-2">
                            <a id="link-vino" href="#vino_category" class="btn btn-outline-dark btn-link"><i
                                        class="fa-solid fa-wine-bottle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center my-2">
            <a href="#categorias_iconos" data-bs-toggle="modal" role="button" class="f-nav text-decoration-none">Detalles de la carta</a>
        </div>
        <p class="text-center mt-5 py-4 pt-md-5">
            <i class="fs-1 fa-solid fa-angle-down text-gold mt-3"></i>
        </p>
    </div>
    <?php
    $all_category = ["espadas", "platos", "burguer", "postre", "refresco", "vino"];
    ?>
    <div class="py-4 menu-container container pt-0">

        <?php foreach ($all_category as $category_section):
            if ($category_section == "espadas"): ?>
                <div id="espada_category" class="image-category position-relative my-4"
                     style="background-image: url('./images/espadas.jpg')">
                    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
                        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">CARNES</h1>
                        <p class="text-light pb-3">Espadas y parrillas</p>
                    </div>
                    <p class="position-absolute bottom-0 start-50 text-white mb-4">
                        <i class="fs-5 fa-solid fa-angle-down"></i>
                    </p>
                </div>
                <a href="#cortesModal" role="button" data-bs-toggle="modal" class="f-nav text-decoration-none ms-3">¿Que
                    cortes de carne existen?</a>
            <?php elseif ($category_section == "platos"): ?>
                <div id="platos_personales_category" class="image-category position-relative my-3"
                     style="background-image: url('./images/platos.jpg')">
                    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
                        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">PLATOS</h1>
                        <p class="text-light pb-3">Piqueos y platos personales</p>
                    </div>
                    <p class="position-absolute bottom-0 start-50 text-white mb-4">
                        <i class="fs-5 fa-solid fa-angle-down"></i>
                    </p>
                </div>
            <?php elseif ($category_section == "burguer"): ?>
                <div id="burguer_category" class="image-category position-relative my-3"
                     style="background-image: url('./images/burguer.jpg')">
                    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
                        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">HAMBURGUESAS</h1>
                        <p class="text-light pb-3">Carnes importadas</p>
                    </div>
                    <p class="position-absolute bottom-0 start-50 text-white mb-4">
                        <i class="fs-5 fa-solid fa-angle-down"></i>
                    </p>
                </div>
            <?php elseif ($category_section == "postre"): ?>
                <div id="postre_category" class="image-category position-relative my-3"
                     style="background-image: url('./images/postre.jpg')">
                    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
                        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">POSTRES</h1>
                        <p class="text-light pb-3">Helados y Postres. Delicias del Par&uacute;</p>
                    </div>
                    <p class="position-absolute bottom-0 start-50 text-white mb-4">
                        <i class="fs-5 fa-solid fa-angle-down"></i>
                    </p>
                </div>
            <?php elseif ($category_section == "refresco"): ?>
                <div id="refresco_category" class="image-category position-relative my-3"
                     style="background-image: url('./images/paru_punch.jpg')">
                    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
                        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">REFRESCANTES</h1>
                        <p class="text-light pb-3">Cocteles y refrescos</p>
                    </div>
                    <p class="position-absolute bottom-0 start-50 text-white mb-4">
                        <i class="fs-5 fa-solid fa-angle-down"></i>
                    </p>
                </div>
            <?php elseif ($category_section == "vino"): ?>
                <div id="vino_category" class="image-category position-relative my-3"
                     style="background-image: url('./images/vinos.jpg')">
                    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
                        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">VINOS</h1>
                        <p class="text-light pb-3">Vinos tinto secos</p>
                    </div>
                    <p class="position-absolute bottom-0 start-50 text-white mb-4">
                        <i class="fs-5 fa-solid fa-angle-down"></i>
                    </p>
                </div>
            <?php endif; ?>
            <div class="row menu mt-4">
                <?php $categorias = consultar("SELECT * FROM categoria_" . $category_section . " ORDER BY id_categoria ASC");
                foreach ($categorias as $cat):
                    ?>
                    <div class="col-lg-4 col-md-6 mb-2 p-4 py-3 carta">
                        <h4 class="mb-3 fw-bold text-muted">
                            <?= $cat["nombre"] ?>
                        </h4>
                        <div class="accordion accordion-flush" id="category-<?= strtolower($cat["nombre"]) ?>">
                            <?php if ($category_section == "espadas" && $cat["nombre"] != "PARRILLAS"): ?>
                                <table class="w-100 mb-2">
                                    <tr>
                                        <td style="width:60%">
                                        </td>
                                        <td style="width: 40%" class="text-end text-muted">
                                            <div class="row">
                                                <div class="col-6 px-0 text-center">
                                                    ARG
                                                </div>
                                                <div class="col-6 px-0 text-center">
                                                    USA
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif;
                            $sql = "SELECT * FROM elemento_" . $category_section . " WHERE id_categoria=" . $cat["id_categoria"];
                            $elementos = consultar($sql);
                            foreach ($elementos as $element):
                                $id_el = $element["id_elemento"];
                                if ($category_section == "espadas"):?>
                                    <table class="w-100 mb-2">
                                        <?php if ($cat["nombre"] != "PARRILLAS"): ?>
                                            <tr>
                                                <td style="width: 60%">
                                                    <?= $element["nombre"] ?>
                                                </td>
                                                <?php if ($element["precio_arg"] != null): ?>
                                                    <td style="width: 40%" class="text-end">
                                                        <div class="row">
                                                            <div class="col-6 px-0 text-center">
                                                                s/. <?= $element["precio_arg"] ?>
                                                            </div>
                                                            <div class="col-6 px-0 text-center">
                                                                s/. <?= $element["precio_usa"] ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endif ?>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td style="width: 70%">
                                                    <?= $element["nombre"] ?>
                                                </td>
                                                <?php if ($element["precio_arg"] != null): ?>
                                                    <td style="width: 30%" class="text-end">
                                                        s/. <?= $element["precio_arg"] ?>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                    </table>
                                <?php else: ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="flush-heading<?= $id_el ?>">
                                            <button class="accordion-button collapsed bg-body border-0" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse<?= $id_el ?>" aria-expanded="false"
                                                    aria-controls="flush-collapse<?= $id_el ?>">
                                                <table class="w-100 mb-2">