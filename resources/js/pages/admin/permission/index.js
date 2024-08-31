import $ from "jquery";

var daTable = $("#datatable").DataTable({
    ajax: "/admin/permission",
    processing: true,
    serverSide: true,
    columns: [{ data: "DT_RowIndex" }, { data: "name" }],
});

function reload() {
    daTable.ajax.reload(null, false);
}

$(document).ready(function () {});
