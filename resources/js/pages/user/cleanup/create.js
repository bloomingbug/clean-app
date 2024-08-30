import $ from "jquery";
import select2 from "select2";

select2($);

$(document).ready(function () {
    $("select#provinceId").select2({
        theme: "bootstrap-5",
        allowClear: true,
        allowSearch: true,
        placeholder: "Pilih Provinsi",
    });

    $("select#provinceId").change(function () {
        getCity();
    });

    $("select#cityId").select2({
        theme: "bootstrap-5",
        allowClear: true,
        allowSearch: true,
        placeholder: "Pilih Kota",
    });

    $("#btnGetLocation").click(function (e) {
        e.preventDefault();
        getLocation();
    });
});

function getCity() {
    let provinceId = $("select#provinceId option:selected").val();
    let wrapper = $("select#cityId");
    wrapper.empty();

    let opt = "<option></option>";

    $.get(`/province/${provinceId}`, function (response) {
        $.each(response.data, function (i, v) {
            opt += '<option value="' + v.id + '">' + v.name + "</option>";
        });

        wrapper.append(opt).trigger("change");
    });
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                if (latitude && longitude) {
                    $("input#location").val(`${latitude}, ${longitude}`);
                }
            },
            function (error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        alert("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("An unknown error occurred.");
                        break;
                }
            },
        );
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
