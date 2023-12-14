const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
    var ctx = chart.getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});

$(document).ready(function () {
    $(".data-table").each(function (_, table) {
        $(table).DataTable();
    });
});

function showAdditionalFields() {
    var selectedSurat = document.getElementById("pilihanSurat").value;
    var additionalFields = document.getElementById("additionalFields");

    // Hide all additional fields by default
    document.getElementById("additionalFieldsSurat1").style.display = "none";
    document.getElementById("additionalFieldsSurat2").style.display = "none";
    document.getElementById("additionalFieldsSurat3").style.display = "none";

    // Show additional fields based on selected option
    if (selectedSurat === "Surat Berhenti Studi") {
        document.getElementById("additionalFieldsSurat1").style.display =
            "block";
    } else if (selectedSurat === "Surat Cuti") {
        document.getElementById("additionalFieldsSurat2").style.display =
            "block";
    } else if (selectedSurat === "Surat Aktif Studi") {
        document.getElementById("additionalFieldsSurat3").style.display =
            "block";
    }

    // Show the container of additional fields
    additionalFields.style.display = "block";

    function onSubmitForm() {
        // Menampilkan notifikasi menggunakan alert
        alert("Permohonan telah dikirim. Terima kasih!");

        // Mengembalikan false agar formulir tidak ter-submit secara default
        return false;
    }
}
