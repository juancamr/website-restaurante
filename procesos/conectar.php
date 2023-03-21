<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "bdparu");
define("DB_PORT", 3306);

$connection = "";

function conectar() {
    global $connection;
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    mysqli_query($connection, "set names utf8");
    if ($connection == false) {
        die("ERROR: No se pudo conectar a la base de datos");
    }
}

function desconectar() { 
    global $connection;
    mysqli_close($connection);