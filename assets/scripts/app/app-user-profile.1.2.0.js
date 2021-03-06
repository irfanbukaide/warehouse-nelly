"use strict";
!function (e) {
    var o = document.getElementsByClassName("user-profile-weekly-performance")[0];
    window.WeeklyPerformanceChart = new Chart(o, {
        type: "bar",
        data: {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [{
                label: "Hours",
                fill: "start",
                data: [5, 6.4, 7.2, 6, 9, 4.7, 7],
                backgroundColor: "rgba(0, 123, 255, 1)",
                borderColor: "rgba(0, 123, 255, 1)",
                pointBackgroundColor: "#FFFFFF",
                pointHoverBackgroundColor: "rgba(0, 123, 255, 1)",
                borderWidth: 0
            }]
        },
        options: {
            responsive: !0,
            scaleBeginsAtZero: !0,
            legend: !1,
            tooltips: {enabled: !1, mode: "index", position: "nearest"},
            elements: {line: {tension: 0}},
            scales: {xAxes: [{stacked: !0, gridLines: !1}], yAxes: [{ticks: {beginAtZero: !0}}]}
        }
    })
}(jQuery);