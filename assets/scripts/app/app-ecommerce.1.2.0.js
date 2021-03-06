"use strict";
!function (o) {
    o(document).ready(function () {
        var a = window.ShardsDashboards.colors;
        o("#sales-overview-date-range").datepicker({}), o("#sales-report-date-range").datepicker({});
        var e = {
            responsive: !0,
            legend: {display: !1},
            tooltips: {enabled: !1},
            elements: {point: {radius: 0}},
            scales: {xAxes: [{gridLines: !1, ticks: {display: !1}}], yAxes: [{gridLines: !1, ticks: {display: !1}}]}
        };
        [{
            backgroundColor: a.primary.toRGBA(.1),
            borderColor: a.primary.toRGBA(),
            data: [4, 4, 4, 9, 20]
        }, {
            backgroundColor: a.success.toRGBA(.1),
            borderColor: a.success.toRGBA(),
            data: [1, 9, 1, 9, 9]
        }, {
            backgroundColor: a.warning.toRGBA(.1),
            borderColor: a.warning.toRGBA(),
            data: [9, 9, 3, 9, 9]
        }, {
            backgroundColor: a.salmon.toRGBA(.1),
            borderColor: a.salmon.toRGBA(),
            data: [3, 3, 4, 9, 4]
        }].forEach(function (o, a) {
            const r = document.getElementsByClassName("sales-overview-small-stats-" + (a + 1));
            new Chart(r, {
                type: "line",
                data: {
                    labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
                    datasets: [{
                        label: "Today",
                        fill: "start",
                        data: o.data,
                        backgroundColor: o.backgroundColor,
                        borderColor: o.borderColor,
                        borderWidth: 1.5
                    }]
                },
                options: e
            })
        });
        var r = document.getElementsByClassName("sales-overview-sales-report")[0];
        window.SalesOverviewChart = new Chart(r, {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Nov", "Dec"],
                datasets: [{
                    label: "Profit",
                    fill: "start",
                    data: [28922, 25317, 23182, 32119, 11291, 8199, 25182, 22120, 10219, 8771, 12992, 8221],
                    backgroundColor: "rgba(0, 123, 255, 1)",
                    borderColor: "rgba(0, 123, 255, 1)",
                    pointBackgroundColor: "#FFFFFF",
                    pointHoverBackgroundColor: "rgba(0, 123, 255, 1)",
                    borderWidth: 1.5
                }, {
                    label: "Shipping",
                    fill: "start",
                    data: [2892, 2531, 2318, 3211, 1129, 819, 2518, 2212, 1021, 8771, 1299, 820],
                    backgroundColor: "rgba(72, 160, 255, 1)",
                    borderColor: "rgba(72, 160, 255, 1)",
                    pointBackgroundColor: "#FFFFFF",
                    pointHoverBackgroundColor: "rgba(0, 123, 255, 1)",
                    borderWidth: 1.5
                }, {
                    label: "Tax",
                    fill: "start",
                    data: [1400, 1250, 1150, 1600, 500, 400, 1250, 1100, 500, 4e3, 600, 500],
                    backgroundColor: "rgba(153, 202, 255, 1)",
                    borderColor: "rgba(153, 202, 255, 1)",
                    pointBackgroundColor: "#FFFFFF",
                    pointHoverBackgroundColor: "rgba(0, 123, 255, 1)",
                    borderWidth: 1.5
                }]
            },
            options: {
                legend: !1,
                tooltips: {enabled: !1, mode: "index", position: "nearest"},
                scales: {
                    xAxes: [{stacked: !0, gridLines: !1}],
                    yAxes: [{
                        stacked: !0, ticks: {
                            userCallback: function (o, a, e) {
                                return o > 999 ? (o / 1e3).toFixed(0) + "k" : o
                            }
                        }
                    }]
                }
            }
        }), o("#sales-overview-sales-report-legend").html(SalesOverviewChart.generateLegend()), google.charts.load("current", {
            packages: ["geochart"],
            mapsApiKey: "AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY"
        }), google.charts.setOnLoadCallback(function () {
            var o = google.visualization.arrayToDataTable([["Country", "Sales"], ["United States", 12219], ["United Kingdom", 11192], ["Australia", 9291], ["Japan", 2291]]),
                a = {colorAxis: {colors: ["#B9C2D4", "#E4E8EF"]}, legend: !1},
                e = new google.visualization.GeoChart(document.getElementById("users-by-country-map"));

            function r() {
                e.draw(o, a)
            }

            r(), window.addEventListener("resize", r)
        })
    })
}(jQuery);