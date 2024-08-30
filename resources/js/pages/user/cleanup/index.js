import "leaflet/dist/leaflet.css";
import "leaflet/dist/leaflet.js";

import * as bootstrap from "bootstrap";

import $ from "jquery";

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var daTable = $("table#campaign").DataTable({
    ajax: "/",
    processing: true,
    serverSide: true,
    columns: [
        { data: "DT_RowIndex" },
        { data: "title" },
        { data: "cityAndProvince" },
        { data: "vote" },
    ],
});

window.handleVote = function handleVote(slug) {
    $.ajax({
        url: "/campaign/" + slug + "/vote",
        type: "POST",
        data: {
            _method: "PUT",
        },
        success: function (data) {
            reload();
        },
        error: function (data) {
            console.log(data);
        },
    });
};

$(document).ready(function () {
    $("button#vote").click(function (e) {
        // handleVote(e);
        console.log("Vote Clicked");
    });

    var map = L.map("map").setView([-3, 115], 5);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            "&copy; <a href='https://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors",
    }).addTo(map);

    $.ajax({
        url: "/campaign/location",
        type: "GET",
        success: function (response) {
            if (response.success && response.data.length > 0) {
                response.data.forEach(function (campaign) {
                    console.log(campaign);

                    var marker = L.marker([
                        campaign.latitude,
                        campaign.longitude,
                    ])
                        .addTo(map)
                        .bindPopup(
                            `<a id="campaign-${campaign.slug}" href="#" class="popup-link text-decoration-none">
                                <b>${campaign.title}</b><br>${campaign?.city?.name}, ${campaign?.city?.province?.name}
                            </a>`,
                        );

                    marker.on("popupopen", function () {
                        const link = document.getElementById(
                            `campaign-${campaign.slug}`,
                        );

                        if (link) {
                            link.addEventListener("click", function (e) {
                                e.preventDefault(); // Menghindari reload halaman atau navigasi
                                showCampaignModal(campaign); // Menampilkan modal dengan data campaign
                            });
                        }
                    });
                });
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        },
    });
});

function showCampaignModal(campaign) {
    // Mengisi konten modal dengan data campaign
    $("#campaignModal .modal-title").text(campaign.title);
    let content = "";

    if (campaign.cover) {
        content +=
            '<img src="' +
            campaign.cover +
            '" alt="' +
            campaign.title +
            '" style="width:100%;">';
    }

    content +=
        "<p class='mt-3'>" + truncateString(campaign.description, 150) + "</p>";
    content +=
        "<p class='fw-semibold mb-0'>" +
        campaign.city.name +
        ", " +
        campaign.city.province.name +
        "</p>";
    content += "<p>oleh: " + campaign.proposed_by.name + "</p>";
    // button to see detail
    content +=
        '<a href="/campaign/' +
        campaign.slug +
        '" class="btn btn-primary">Lihat Detail</a>';
    $("#campaignModal .modal-body").html(content);

    const myModal = new bootstrap.Modal(
        document.getElementById("campaignModal"),
    );
    myModal.show();
}

function reload() {
    daTable.ajax.reload(null, false);
}

const truncateString = (string = "", maxLength = 50) =>
    string.length > maxLength ? `${string.substring(0, maxLength)}…` : string;
