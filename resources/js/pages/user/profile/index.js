import "@/css/pages/user/_profile.scss";

var daTableTicket = $("table#tableTicket").DataTable({
    ajax: "/profile/tiket",
    processing: true,
    serverSide: true,
    columns: [
        { data: "DT_RowIndex" },
        { data: "no" },
        { data: "campaign" },
        { data: "date" },
        { data: "location" },
        { data: "action" },
    ],
});

var daTableDonation = $("table#tableDonationHistory").DataTable({
    ajax: "/profile/fund",
    processing: true,
    serverSide: true,
    columns: [
        { data: "DT_RowIndex" },
        { data: "no" },
        { data: "campaign" },
        { data: "status" },
        { data: "action" },
    ],
});
