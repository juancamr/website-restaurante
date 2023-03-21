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
            margin-bottom: 0
        }

        a.btn {
            border-radius: 50%
        }

        .bg-green {
            background-color: #1bd741;
            color: #fff
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <?php require_once './sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 bg-light">
                <h1 class="f-nav p-5 pb-0 mb-0 text-center">Administraci&oacute;n de reservas</h1>
                <div class="row p-4 pt-5">
                    <div class="col-md-6 border-end px-lg-5">
                        <p class="text-center f-nav fs-4 mb-5">Reservas por confirmar</p>
                        <?php
                        $sql = "SELECT * FROM reserva WHERE confirmado=\"F\" ORDER BY id_reserva DESC";
                        $reservas = consultar($sql);
                        if (!$reservas): ?>
                            <p class="f-nav text-muted text-center">No hay reservas sin confirmar</p>
                        <?php endif;
                        foreach ($reservas as $reserva):
                            $date = DateTime::createFromFormat('Y-m-d', $reserva["fecha_reserva"]);
                            $output = $date->format('j/m/Y')
                                ?>
                            <div id="cat<?= $reserva["id_reserva"] ?>"
                                class="card mb-4 mx-auto w-100 rounded-4 border border-success border-opacity-10 p-3 px-lg-5"
                                style="width: 18rem;">
                                <table class="w-100">
                                    <tr>
                                        <td style="width: 75%">
                                            <table class="f-nav">
                                                <tr>
                                                    <td class="w-50">
                                                        <p>Nombre: </p>
                                                    </td>
                                                    <td class="w-50">
                                                        <p>
                                                            <?= $reserva["name_encargado"] ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50">
                                                        <p>Tel&eacute;fono: </p>
                                                    </td>
                                                    <td class="w-50">
                                                        <p>
                                                            <?= $reserva["contacto"] ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50">
                                                        <p>Fecha: </p>
                                                    </td>
                                                    <td class="w-50">
                                                        <p>
                                                            <?= $output ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50">
                                                        <p>Hora: </p>
                                                    </td>
                                                    <td class="w-50">
                                                        <p>
                                                            <?= $reserva["hora_reserva"] ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50">
                                                        <p>Clientes: </p>
                                                    </td>
                                                    <td class="w-50">
                                                        <p>
                                                            <?= $reserva["cant_personas"] ?><i
                                                                class="ms-2 fa-solid fa-user me-2"></i>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php if (!$reserva["name_empresa"] == null): ?>
                                                    <tr>
                                                        <td class="w-50">
                                                            <p>Empresa: </p>
                                                        </td>
                                                        <td class="w-50">
                                                            <p>
                                                                <?= $reserva["name_empresa"] ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                <?php endif;
                                                if ($reserva["nota"] != null): ?>
                                                    <tr>
                                                        <td class="w-50 d-flex">
                                                            <p>Nota: </p>
                                                        </td>
                                                        <td class="w-50">
                                                            <p id="np<?= $reserva["id_reserva"] ?>" class="d-none"><?=
                                                                $reserva["nota"] ?></p>
                                                            <a id="no<?= $reserva["id_reserva"] ?>" href="#nota-modal"
                                                                role="button" data-bs-toggle="modal"
                                                                class="btn-nota text-decoration-none f-nav fs-6">Ver nota...</a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </table>

                                        </td>
                                        <td style="width: 20%; text-align: center">
                                            <div class="width-100">
                                                <a onclick="return confirm('Estas seguro de eliminar la reserva?');"