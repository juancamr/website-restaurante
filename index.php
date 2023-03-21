<?php
include_once './procesos/conectar.php';
session_start();
if (!isset($_SESSION["anuncio"])) {
    $_SESSION["anuncio"] = true;
}
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$anuncio = consultar("SELECT * FROM anuncio WHERE flag=\"T\"");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>RESTAURANT</title>
    <?php require_once './css_bootstrap.php'; ?>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        p {
            color: #4E4746;
            margin: 0;
        }

        .top-container {
            height: 700px;
            background-image: url("./images/image-top.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: auto 100%;
        }

        @media only screen and (max-width: 500px) {
            #slogan {
                width: 240px;
            }

            #map {
                height: 500px;
            }
        }

        @media only screen and (min-width: 500px) {
            .promo-container {
                width: 60%;
            }

            .top-container {
                height: 850px;
            }

            #map {
                height: 100%;
            }
        }

        li::marker {
            color: #A39068;
        }
    </style>
</head>

<body>
<!--    navbar-->
<?php require_once("header.php"); ?>

<div class="top-container position-relative">
    <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
        <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">SLOGAN PRINCIPAL</h1>
        <p class="text-gold pb-3">SLOGAN SECUNDARIO</p>
    </div>
    <p class="position-absolute bottom-0 start-50 text-white mb-4">
        <i class="fs-5 fa-solid fa-angle-down"></i>
    </p>
</div>


<div class="bg-light py-5">
    <div class="container py-5">
        <h1 class="text-center f-nav text-gold my-5 w-75 mx-auto" style="line-height: 2.5rem;">LOREM IPSUM DOLOR SIT AMET</h1>
        <div class="row mb-5">
            <div class="col-sm-6 text-center text-md-end px-4">
                <a style="width: 167.61px;" class="btn btn-outline-dark margin-auto rounded-0 px-4 py-3 mb-4 f-nav"
                   data-bs-toggle="modal"
                   id="reservar" role="button" href="#reservaModal"><i
                            class="fa-solid fa-pencil me-2"></i>RESERVAR
                </a>
            </div>
            <div class="col-sm-6 text-center text-md-start px-4">
                <a class="btn btn-outline-dark margin-auto rounded-0 px-4 py-3 f-nav" href="./carta.php">
                    <i class="fa-solid fa-champagne-glasses me-2"></i>
                    VER
                    CARTA</a></div>
        </div>
    </div>
</div>

<div class="location-container bg-white py-3 pb-md-4">