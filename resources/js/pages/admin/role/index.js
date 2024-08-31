import $ from "jquery";

var daTable = $("#datatable").DataTable({
    ajax: "/admin/role",
    processing: true,
    serverSide: true,
    columns: [
        { data: "DT_RowIndex" },
        { data: "name" },
        { data: "permissions" },
        { data: "action" },
    ],
});

function reload() {
    daTable.ajax.reload(null, false);
}

$(document).ready(function () {});
