import HTTPHeaders from "./headers.js";
import Messages from "./messages.js";

$(".btnEliminar").click(function (e) {
    const identifier = $(this).attr("data-identifier");
    $("#identifier").val(identifier);
});

$(".agregar").click(function (e) {
    setFrmModalId('');
    $(".modal-title").html("Registrar cliente");
    let form = getForm("frmModal");
    form.reset()
});

$(".editar").click(function (e) {
    const identifier = $(this).attr("data-identifier");
    setFrmModalId(identifier);
    $(".modal-title").html("Modificar cliente");
    const token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: "clientes/" + identifier,
        method: "GET",
        headers: HTTPHeaders.postHeaders(token),
        dataType: "json",
        success: function (response) {
            $("input[name='nombres']").val(response.cliente.nombres);
            $("input[name='apellido_paterno']").val(response.cliente.apellido_paterno);
            $("input[name='apellido_materno']").val(response.cliente.apellido_materno);
            $("input[name='domicilio']").val(response.cliente.domicilio);
            $("input[name='correo']").val(response.cliente.email);
        },
        error: function (response) {
            $("#frm-messages").html(Messages.getErrorMessage(response));
        },
    });
});

$("#frmSubmit").click(function (e) {
    e.preventDefault();

    let data = {
        nombres: $("input[name='nombres']").val(),
        apellido_paterno: $("input[name='apellido_paterno']").val(),
        apellido_materno: $("input[name='apellido_materno']").val(),
        domicilio: $("input[name='domicilio']").val(),
        correo: $("input[name='correo']").val()
    };

    const token = $("meta[name='csrf-token']").attr("content");
    let identifier = document.querySelector("form #identifier").value;
    let url = "clientes/";
    if (identifier) {
        url += identifier;
    }

    $.ajax({
        url: "clientes/" + identifier,
        method: "POST",
        headers: HTTPHeaders.postHeaders(token),
        dataType: "json",
        data: data,
        success: function (response) {
            $("#frm-messages").html(
                Messages.getSuccessMessage(response.message)
            );

            setTimeout(() => {
                $(".btn-close").click();
                window.location = "/clientes";
            }, 3000);
        },
        error: function (response) {
            console.log(response);
            $("#frm-messages").html(Messages.getErrorMessage(response));
        },
    });
});

function setFrmModalId(identifier) {
    let frmModal = getForm("frmModal");

    Array.from(frmModal.elements).forEach(element => {
        if (element.id == "identifier") {
            element.value = identifier;
        }
    })
}

function getForm(frmName) {
    let formTarget = null;

    for (let form of document.forms) {
        if (form.name == frmName) {
            formTarget = form;
            break;
        }
    }

    return formTarget;
}



$("#btnConfirmar").click(function (e) {
    const identifier = $("#identifier").val();

    if (identifier == null || identifier == "") {
        $("#m-messages").html(
            Messages.getSimpleErrorMessage(
                "No se ha especificado el identificador del registro."
            )
        );

        return;
    }

    const token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: "clientes/" + identifier,
        method: "DELETE",
        headers: HTTPHeaders.deleteHeaders(token),
        dataType: "json",
        success: function (response) {
            $("#m-messages").html(
                Messages.getSuccessMessage("Cliente eliminado correctamente.")
            );
            setTimeout(() => {
                window.location = "/clientes";
                $(".btn-close").click();
            }, 2000);
        },
        error: function (response) {
            $("#m-messages").html(Messages.getErrorMessage(response));
        },
    });
});
