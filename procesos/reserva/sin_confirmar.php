<?php
require_once '../conectar.php';

try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());