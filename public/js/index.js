import HTTPHeaders from "./headers.js";
import Messages from "./messages.js";

$(".btnEliminar").click(function (e) {
    const identifier = $(this).attr("data-identifier");
    $("#identifier").val(identifier);
});

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
