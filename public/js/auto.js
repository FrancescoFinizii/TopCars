$(window).on("load", function () {
    $("#motore").on("change", function () {
        if ($(this).val() === "Metano" || $(this).val() === "Idrogeno") {
            $("#autonomia-suffix").text("km/kg");
        }
        else if ($(this).val() === "Elettrica") {
            $("#autonomia-suffix").text("km/kWh");
        }
        else {
            $("#autonomia-suffix").text("km/litro");
        }

    })
})
