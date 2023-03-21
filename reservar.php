<!-- Ventana para reservar -->
<div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0 p-0 mb-4">
                <h1 class="mb-0 fs-3 f-nav text-gold">RESERVA<span class="ms-2 text-muted fs-4 f-nav"
                                                                     id="inf-reserva"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="panelReserva" class="carousel slide">
                    <div class="carousel-inner">
                        <form class="form-reserva" onsubmit="return verify_inputs();" method="post"
                              action="./procesos/reserva/add_reserva.php">
                            <div id="panel-personas" class="carousel-item active">
                                <div>
                                    <p class="f-nav text-center mb-3">Seleccione la cantidad de personas<i
                                                class="ms-2 text-muted fa-solid fa-user"></i></p>

                                    <div class="row px-4 px-sm-5">
                                        <?php for ($i = 1;
                                                   $i <= 24;
                                                   $i++): ?>
                                            <div class="col-3 text-center">
                                                <input class="radio-cant rounded-5 border_0" type="radio" id="<?= $i ?>"
                                                       name="cantidad_personas"
                                                       value="<?= $i ?>">
                                                <label class="label-cant mb-2 f-nav" for="<?= $i ?>"><?= $i ?></label>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <div id="panel-fecha" class="carousel-item">
                                <div>
                                    <p class="f-nav mb-2">Fecha y hora (12:00 pm - 11:00 pm)</p>
                                    <div class="row">
                                        <div class="col-6 pe-0 pe-md-2">
                                            <div class="input-group">
                                                <span class="input-group-text px-2 bg-brown text-light"><i
                                                            class="fa-regular fa-calendar"></i></span>
                                                <input type="date" onfocus="this.showPicker()" id="fecha_reserva"
                                                       name="fecha_reserva"
                                                       class="form-control f-nav py-3">
                                            </div>
                                        </div>
                                        <div class="col-6 ps-1">
                                            <div class="input-group">
                                                <span class="input-group-text px-2 bg-brown text-light"><i
                                                            class="fa-regular fa-clock"></i></span>
                                                <input type="time" onfocus="this.showPicker()" id="hora_reserva"
                                                       name="hora_reserva"
                                                       class="form-control f-nav py-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <p class="f-nav mb-2">Para:</p>
                                        <input class="rounded-5 border_0" type="radio" id="personal"
                                               name="tipo" checked
                                               value="personal">
                                        <label class="label-tipo me-2 f-nav" for="personal">Personas</label>
                                        <input class="rounded-5 border_0" type="radio" id="empresa"
                                               name="tipo"
                                               value="empresa">
                                        <label class="label-tipo f-nav" for="empresa">Empresa</label>
                                    </div>
                                </div>