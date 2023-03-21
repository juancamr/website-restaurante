<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"
></script>
<script>function next_panel() {
        $("#panelReserva").carousel("next")
    }

    function prev_panel() {
        $("#panelReserva").carousel("prev")
    }

    function verify_inputs() {
        let e = [], a = new Date, n = new Date(Date.parse(document.getElementById("fecha_reserva").value));
        a.setMinutes(0), a.setHours(0), a.setSeconds(0), n.setMinutes(n.getMinutes() + n.getTimezoneOffset() + 45);
        let s = $("#hora_reserva").val();
        if (console.log(s), $(".form-reserva input").removeClass("is-invalid"), ("" === $("#fecha_reserva").val() || n < a) && (console.log(a + ", " + n), e.push("#fecha_reserva")), ("" === s || s < "12:00" || s > "24:01") && e.push("#hora_reserva"), "" === $("#nombre-encargado").val() && e.push("#nombre-encargado"), "" === $("#number-encargado").val() && e.push("#number-encargado"), 0 == e.length) return !0;
        {
            e.forEach(e => $(e).addClass("is-invalid"));
            let r = e[0];
            return console.log(r), "#number-encargado" != r && (prev_panel(), $("#continuar-btn").removeClass("d-none"), $("#inf-reserva").text(""), $("#inf-reserva").append($('input[name="cantidad_personas"]:checked').val() + '<i class = "ms-2 text-muted fa-solid fa-user fs-5 me-2"></i>')), !1
        }
    }

    $(document).ready(() => {
        $("#empresa").click(() => {
            $("#f-nombre-empresa").removeClass("d-none")
