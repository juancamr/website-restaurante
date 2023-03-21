<?php
include_once './procesos/conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$anuncio = consultar("SELECT * FROM anuncio WHERE flag=\"T\"");
?>
<!-- navbar -->
<div class="nav-container" id="navbar">
    <nav class="navbar navbar-expand-lg py-3 w-100 position-fixed">
        <div class="container mx-4 mx-sm-auto px-1">
            <a class="navbar-brand text-white fs-3 me-0" style="width: 110.59px;" href="./">
                NOMBRE</a>
            <button id="button-nav" class="text-gold navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-light">