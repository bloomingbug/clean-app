import "@/css/pages/auth/_login.scss";

import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $("#formLogin").submit(function (e) {
        e.preventDefault();
        const email = $("#email").val();
        const password = $("#password").val();
        const remember = $("#remember").is(":checked") ? 1 : 0;
        console.log(remember);
        console.log(typeof remember);

        $.ajax({
            url: "/login",
            type: "POST",
            data: {
                email: email,
                password: password,
                remember: remember,
            },
            success: function (response) {
                $('button.btn[type="submit"]').attr("disabled", true);
                $('button.btn[type="submit"]').html("Loading...");
                window.location.href = response.data.redirect;
            },
            error: function (error) {
                if ((error.responseJSON.code = 422)) {
                    let message = JSON.parse(error.responseJSON.message);
                    for (let key in message) {
                        if (message.hasOwnProperty(key)) {
                            let errorMessage = message[key][0];
                            $("#" + key + ".invalid-feedback").html(
                                errorMessage,
                            );
                        }
                    }
                }

                $('button.btn[type="submit"]').attr("disabled", false);
                $('button.btn[type="submit"]').html("Login");
            },
        });
    });
});
