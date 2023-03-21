<?php
require_once '../check_session.php';

// Include config file
require_once "../conectar.php";
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {