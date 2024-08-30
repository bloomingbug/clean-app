import $ from "jquery";
import select2 from "select2";

select2($);

$(document).ready(function () {
    $("select#role").select2({
        theme: "bootstrap-5",
        allowClear: true,
        allowSearch: true,
        placeholder: "Pilih Role",
    });
});
