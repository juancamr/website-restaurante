<?php
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ./procesos/support/support_reservas.php");
    exit;
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesi&oacute;n</title>
    <?php require_once './css_bootstrap.php'; ?>

    <style>body,html{height:100%}body{display:flex;align-items:center;padding-top:40px;padding-bottom:40px;background-color:#f5f5f5}.form-signin{max-width:330px;padding:15px}.form-signin .form-floating:focus-within{z-index:2}.form-signin input[type=email]{margin-bottom:-1px;border-bottom-right-radius:0;border-bottom-left-radius:0}.form-signin input[type=password]{margin-bottom:10px;border-top-left-radius:0;border-top-right-radius:0}.nav-link,.navbar-brand,.navbar-brand:hover,.navbar-nav .nav-link.active,.navbar-nav .show>.nav-link,.text-gold{color:#a39068}.bg-brown{background-color:#261e1c}.bg-gold{background-color:#ad985f}.f-nav,.nav-link{font-family:Poppins,sans-serif}.f-brand,.navbar-brand{font-family:Lora,serif}.nav-link:hover{color:#fff}#ingresar:hover{background-color:#2c3938}</style>

</head>

<body class="text-center">
