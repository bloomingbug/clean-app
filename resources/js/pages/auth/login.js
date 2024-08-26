import "@/css/pages/_auth.scss";

import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $("#formLogin").submit(function (e) {
        e.preventDefault();
        $('button.btn[type="submit"]').attr("disabled", true);
        $('button.btn[type="submit"]').html("Loading...");
        $("#alert").css("display", "none");

        const email = $("#email").val();
        const password = $("#password").val();
        const remember = $("#remember").is(":checked") ? 1 : 0;

        $.ajax({
            url: "/login",
            type: "POST",
            data: {
                email: email,
                password: password,
                remember: remember,
            },
            success: function (response) {
                window.location.href = response.data.redirect;
            },
            error: function (error) {
                if (error.responseJSON.code == 422) {
                    let message = JSON.parse(error.responseJSON.message);
                    for (let key in message) {
                        if (message.hasOwnProperty(key)) {
                            let errorMessage = message[key][0];
                            $("#" + key + ".invalid-feedback").html(
                                errorMessage,
                            );
                        }
                    }
                } else if (error.responseJSON.code == 500) {
                    $("#alert").html(error.responseJSON.message);
                    $("#alert").css("display", "block");
                }
            },
            complete: function () {
                $('button.btn[type="submit"]').attr("disabled", false);
                $('button.btn[type="submit"]').html("Masuk");
            },
        });
    });
});
