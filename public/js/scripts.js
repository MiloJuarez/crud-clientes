import HTTPHeaders from "./headers.js";
import Messages from "./messages.js";

function getFormData() {
    let formData = {
        nombres: $("#nombres").val(),
        apellido_paterno: $("#apellido_paterno").val(),
        apellido_materno: $("#apellido_materno").val(),
        domicilio: $("#domicilio").val(),
        correo: $("#correo").val(),
    };

    return formData;
}

$("#btnRegistrar").click(function (e) {
    e.preventDefault();

    let formData = getFormData();
    const token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: "/clientes",
        method: "POST",
        headers: HTTPHeaders.postHeaders(token),
        data: formData,
        dataType: "json",
        success: function (response) {
            $("#messages").html(Messages.getSuccessMessage(response.message));
            setTimeout(() => {
                window.location = "/clientes";
            }, 2000);
        },
        error: function (response) {
            $("#messages").html(Messages.getErrorMessage(response));
        },
    });
});

$("#btnEditar").click(function (e) {
    e.preventDefault();

    let formData = getFormData();
    const token = $("meta[name='csrf-token']").attr("content");
    const identifier = $("#identifier").val();

    $.ajax({
        url: "/clientes/" + Number.parseInt(identifier),
        method: "PUT",
        headers: HTTPHeaders.putHeaders(token),
        data: formData,
        dataType: "json",
        success: function (response) {
            $("#messages").html(Messages.getSuccessMessage(response.message));
            setTimeout(() => {
                window.location = "/clientes";
            }, 2000);
        },
        error: function (response) {
            $("#messages").html(Messages.getErrorMessage(response));
        },
    });
});
