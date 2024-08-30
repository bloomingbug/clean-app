import $ from "jquery";

var daTable = $("#datatable").DataTable({
    ajax: "/admin/user",
    processing: true,
    serverSide: true,
    columns: [
        { data: "DT_RowIndex" },
        { data: "name" },
        { data: "username" },
        { data: "email" },
        { data: "roles" },
        { data: "action" },
    ],
});

function reload() {
    daTable.ajax.reload(null, false);
}

$(document).ready(function () {});
