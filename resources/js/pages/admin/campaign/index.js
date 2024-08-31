import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var daTable = $("#datatable").DataTable({
    ajax: "/admin/campaign",
    processing: true,
    serverSide: true,
    columns: [
        { data: "DT_RowIndex" },
        { data: "date" },
        { data: "title" },
        { data: "desc" },
        { data: "location" },
        { data: "proposed" },
        { data: "action" },
    ],
});

window.handleApprove = function handleApprove(slug) {
    $.ajax({
        url: "/admin/campaign/" + slug + "/approve",
        type: "POST",
        data: {
            _method: "PUT",
        },
        success: function (data) {
            reload();
        },
        error: function (error) {
            if (error.status == 401) {
                window.location = "/login";
            }

            console.log(error.message);
        },
    });
};

function reload() {
    daTable.ajax.reload(null, false);
}

$(document).ready(function () {});
