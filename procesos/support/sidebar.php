<?php $user = $_SESSION["username"];

require_once '../check_session.php';
include_once '../conectar.php';
try {
    conectar();
} catch (Exception $e) {
    die($e->getMessage());
}
$sql = "SELECT COUNT(*) FROM reserva WHERE confirmado=\"F\"";
$cant_reservas = consultar($sql);
?>
<link href="../../css/dashboard.css" rel="stylesheet">
<style>.btn-dark,.btn-outline-dark{--bs-btn-border-color:#AD985F}.bd-placeholder-img{font-size:1.125rem;text-anchor:middle;-webkit-user-select:none;-moz-user-select:none;user-select:none}@media (min-width:768px){.bd-placeholder-img-lg{font-size:3.5rem}}.b-example-divider{height:3rem;background-color:rgba(0,0,0,.1);border:solid rgba(0,0,0,.15);border-width:1px 0;box-shadow:inset 0 .5em 1.5em rgba(0,0,0,.1),inset 0 .125em .5em rgba(0,0,0,.15)}.b-example-vr{flex-shrink:0;width:1.5rem;height:100vh}.bi{vertical-align:-.125em;fill:currentColor}.nav-scroller{position:relative;z-index:2;height:2.75rem;overflow-y:hidden}.nav-scroller .nav{display:flex;flex-wrap:nowrap;padding-bottom:1rem;margin-top:-1px;overflow-x:auto;text-align:center;white-space:nowrap;-webkit-overflow-scrolling:touch}.bg-brown{background-color:#261e1c}.bg-gold,.dropdown-item:hover{background-color:#ad985f}.navbar-brand,.navbar-brand:hover,.text-gold{color:#a39068}.f-nav,.nav-link{font-family:Poppins,sans-serif}.f-brand,.navbar-brand{font-family:Lora,serif}.navbar{z-index:5;transition:background-color .3s,padding-top .3s,padding-bottom .3s}#cartas_category{z-index:4}.btn-gold:hover{background-color:#2c3938}.bg-nav{background-color:#20160d}@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:1ms chartjs-render-animation}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}.sidebar{box-shadow:none;padding:0}.sidebar .nav-link.active,.sidebar .nav-link:hover{font-weight:700;background-color:#ad985f;color:#261e1c}.nav-link{margin:4px 0;padding:10px;font-size:15px;color:#f0f0f0}.dropdown-item:active{background-color:#bf0000}div.d-flex{padding:0 15%}.btn-outline-dark{--bs-btn-color:#AD985F}.btn-dark{--bs-btn-bg:#AD985F}.card{box-shadow:0 30px 40px rgba(0,0,0,.1)}</style>
<?php require_once '../../css_bootstrap.php'; ?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-brown">
    <div class="d-flex flex-column flex-shrink position-sticky py-5 sidebar-sticky h-100">
        <h2 class="ms-3 mb-5 f-brand text-light">NOMBRE</h2>
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a id="support_reservas" class="nav-link rounded-4" href="support_reservas.php">
                    <i class="fa-solid fa-bars me-2"></i>
                    Reservas
                    <?php if ($cant_reservas[0]["COUNT(*)"] != 0): ?>
                        <span class="f-nav ms-2 badge text-bg-primary py-1 px-2"><?= $cant_reservas[0]["COUNT(*)"] ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item">
                <button class="btn nav-link align-items-center rounded-4 collapsed" data-bs-toggle="collapse"
                        data-bs-target="#carta-collapse" aria-expanded="true">
                    <i class="me-2 fa-solid fa-angle-down"></i>
                    <i class="fa-solid fa-champagne-glasses me-2"></i>
                    Carta
                </button>
                <div class="collapse show" id="carta-collapse">
                    <ul class="ms-3 pt-0 btn-toggle-nav text-light list-unstyled fw-normal pb-1 small">
                        <li><a href="support_carta.php?section=espadas" id="support_espadas" class="nav-link rounded-4">Espadas</a>
                        </li>
                        <li><a href="support_carta.php?section=platos" id="support_platos" class="nav-link rounded-4">Platos</a>
                        </li>
                        <li><a href="support_carta.php?section=burguer" id="support_burguer" class="nav-link rounded-4">Hamburguesas</a>
                        </li>
                        <li><a href="support_carta.php?section=postre" id="support_postre" class="nav-link rounded-4">Postres</a>
                        </li>
                        <li><a href="support_carta.php?section=refresco" id="support_refresco"
                               class="nav-link rounded-4">Refrescantes</a>
                        </li>
                        <li><a href="support_carta.php?section=vino" id="support_vino"
                               class="nav-link rounded-4">Vinos</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a id="support_galeria" class="nav-link rounded-4" href="support_galeria.php">
                    <i class="fa-solid fa-camera-retro me-2"></i>
                    Galer&iacute;a
                </a>
            </li>
            <li class="nav-item">
                <a id="support_promociones" class="nav-link rounded-4" href="support_promociones.php">
                    <i class="fa-solid fa-link me-2"></i>
                    Promociones
                </a>
            </li>
            <li class="nav-item">
                <a id="support_clientes" class="nav-link rounded-4" href="support_clientes.php">
                    <i class="fa-solid fa-user me-2"></i>
                    Clientes
                </a>
            </li>
        </ul>
        <div class="dropdon ms-3">
            <a href="#" class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
               data-bs-toggle="dropdown" aria-expanded="false">
                <div style="width: 40px; height: 40px;" class="rounded-circle me-2 bg-gold">
                    <h4 class="text-center text-light my-1">
                        <?= strtoupper(substr($user, 0, 1)); ?>
                    </h4>
                </div>
                <strong>
                    <?= $user; ?>
                </strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="../logout.php">Cerrar sesi&oacute;n</a></li>
                <li><a class="dropdown-item" href="#changePasswd" role="button" data-bs-toggle="modal">Cambiar contrase&ntilde;a</a></li>
            </ul>
        </div>
    </div>
</nav>
<a href="#sidebarCanvas" role="button" data-bs-toggle="offcanvas" class="d-md-none pt-4 fs-1 ps-5"><i
            class="fa-solid fa-bars text-gold"></i></a>

<div class="offcanvas offcanvas-start bg-brown text-light" tabindex="-1" id="sidebarCanvas"
     aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header mt-3">
        <h2 class="offcanvas-title ms-3 f-brand text-light">PAR&Uacute;</h2>
        <button type="button" class="btn-close" style="color: white;" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        <button class="btn btn-outline-dark border-0 ms-auto fs-3" data-bs-dismiss="offcanvas"><i
                    class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body">