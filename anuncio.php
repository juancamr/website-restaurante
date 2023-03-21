<?php
include_once './procesos/conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$anuncio = consultar("SELECT * FROM anuncio WHERE flag=\"T\"");
?>

<?php if ($anuncio): ?>
<div class="modal fade" id="anuncio" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">