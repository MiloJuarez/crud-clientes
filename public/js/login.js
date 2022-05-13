import HTTPHeaders from "./headers.js";
import Messages from "./messages.js";

$("#login").click(function (e) {
    e.preventDefault();
    let formData = {
        correo: $("#correo").val(),
        password: $("#password").val(),
    };

    const token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: "/authenticate",
        method: "POST",
        headers: HTTPHeaders.postHeaders(token),
        data: formData,
        dataType: "json",
        success: function (response) {
            $("#l-messages").html(Messages.getSuccessMessage(response.message));
            setTimeout(function () {
                window.location = "/clientes";
            }, 2000);
        },
        error: function (response) {
            $("#l-messages").html(Messages.getErrorMessage(response));
        },
    });
});
