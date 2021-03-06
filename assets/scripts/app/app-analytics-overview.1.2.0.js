"use strict";
!function (a) {
    a(document).ready(function () {
        var o = window.ShardsDashboards.colors;
        a("#analytics-overview-date-range").datepicker({}), a("#sessions-overview-date-range").datepicker({}), [{
            backgroundColor: o.primary.toRGBA(.1),
            borderColor: o.primary.toRGBA(),
            data: [9, 3, 3, 9, 9]
        }, {
            backgroundColor: o.success.toRGBA(.1),
            borderColor: o.success.toRGBA(),
            data: [3.9, 4, 4, 9, 4]
        }, {
            backgroundColor: o.warning.toRGBA(.1),
            borderColor: o.warning.toRGBA(),
            data: [6, 6, 9, 3, 3]
        }, {
            backgroundColor: o.salmon.toRGBA(.1),
            borderColor: o.salmon.toRGBA(),
            data: [0, 9, 3, 3, 3]
        }].map(function (a, o) {
            var e = {
                maintainAspectRatio: !0,
                responsive: !0,
                legend: {display: !1},
                tooltips: {enabled: !1, custom: !1},
                elements: {point: {radius: 0}, line: {tension: .33}},
                scales: {
                    xAxes: [{gridLines: !1, scaleLabel: !1, ticks: {display: !1}}],
                    yAxes: [{
                        gridLines: !1,
                        scaleLabel: !1,
                        ticks: {display: !1, suggestedMax: Math.max.apply(Math, a.data) + 1}
                    }]
                }
            }, t = document.getElementsByClassName("analytics-overview-stats-small-" + (o + 1));
            new Chart(t, {
                type: "line",
                data: {
                    labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5"],
                    datasets: [{
                        label: "Today",
                        fill: "start",
                        data: a.data,
                        backgroundColor: a.backgroundColor,
                        borderColor: a.borderColor,
                        borderWidth: 1.5
                    }]
                },
                options: e
            })
        });
        var e = document.getElementsByClassName("analytics-overview-sessions")[0], t = {
            labels: ["09:00 PM", "10:00 PM", "11:00 PM", "12:00 PM", "13:00 PM", "14:00 PM", "15:00 PM", "16:00 PM", "17:00 PM"],
            datasets: [{
                label: "Today",
                fill: "start",
                data: [5, 5, 10, 30, 10, 42, 5, 15, 5],
                backgroundColor: o.primary.toRGBA(.1),
                borderColor: o.primary.toRGBA(1),
                pointBackgroundColor: o.white.toHex(),
                pointHoverBackgroundColor: o.primary.toRGBA(1),
                borderWidth: 1.5
            }, {
                label: "Yesterday",
                fill: "start",
                data: ["", 23, 5, 10, 5, 5, 30, 2, 10],
                backgroundColor: o.salmon.toRGBA(.1),
                borderColor: o.salmon.toRGBA(1),
                pointBackgroundColor: o.white.toHex(),
                pointHoverBackgroundColor: o.salmon.toRGBA(1),
                borderDash: [5, 5],
                borderWidth: 1.5,
                pointRadius: 0,
                pointBorderColor: o.salmon.toRGBA(1)
            }]
        }, r = new Chart(e, {
            type: "line",
            data: t,
            options: {
                responsive: !0,
                legend: !1,
                elements: {line: {tension: .38}},
                scales: {
                    xAxes: [{
                        gridLines: !1, ticks: {
                            callback: function (a, o) {
                                return o % 2 == 0 ? "" : a
                            }
                        }
                    }], yAxes: [{ticks: {suggestedMax: 45}}]
                },
                tooltips: {enabled: !1, mode: "index", position: "nearest"}
            }
        });
        a("#analytics-overview-sessions-legend").html(r.generateLegend());
        var s = r.getDatasetMeta(0);
        s.data[0]._model.radius = 0, s.data[t.datasets[0].data.length - 1]._model.radius = 0, r.render();
        var n = {
            datasets: [{
                hoverBorderColor: o.white.toRGBA(1),
                data: [68.3, 24.2, 7.5],
                backgroundColor: [o.primary.toRGBA(.9), o.primary.toRGBA(.5), o.primary.toRGBA(.3)]
            }], labels: ["Desktop", "Tablet", "Mobile"]
        }, l = document.getElementsByClassName("analytics-users-by-device")[0];
        window.ubdChart = new Chart(l, {
            type: "doughnut",
            data: n,
            options: {legend: !1, cutoutPercentage: 80, tooltips: {enabled: !1, mode: "index", position: "nearest"}}
        });
        var d = [{
            datasets: [{
                hoverBorderColor: "#fff",
                data: [57.2, 42.8],
                backgroundColor: [o.primary.toRGBA(.9), o.athensGray.toRGBA(.8)]
            }], labels: ["Label 1", "Label 2"]
        }, {
            datasets: [{
                hoverBorderColor: "#fff",
                data: [45.5, 54.5],
                backgroundColor: [o.success.toRGBA(.9), o.athensGray.toRGBA(.8)]
            }], labels: ["Label 1", "Label 2"]
        }, {
            datasets: [{
                hoverBorderColor: "#fff",
                data: [5.2, 94.8],
                backgroundColor: [o.salmon.toRGBA(.9), o.athensGray.toRGBA(.8)]
            }], labels: ["Label 1", "Label 2"]
        }, {
            datasets: [{
                hoverBorderColor: "#fff",
                data: [30.2, 69.8],
                backgroundColor: [o.warning.toRGBA(.9), o.athensGray.toRGBA(.8)]
            }], labels: ["Label 1", "Label 2"]
        }], i = {legend: !1, responsive: !1, cutoutPercentage: 70, animation: !1, tooltips: !1};
        [0, 1, 2, 3].forEach(function (a) {
            var o = document.getElementById("analytics-overview-goal-completion-" + (a + 1));
            new Chart(o, {type: "doughnut", data: d[a], options: i})
        }), google.charts.load("current", {
            packages: ["geochart"],
            mapsApiKey: "AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY"
        }), google.charts.setOnLoadCallback(function () {
            var a = google.visualization.arrayToDataTable([["Country", "Users"], ["United States", 12219], ["United Kingdom", 11192], ["Australia", 9291], ["Japan", 2291]]),
                o = {colorAxis: {colors: ["#B9C2D4", "#E4E8EF"]}, legend: !1, width: "100%"},
                e = new google.visualization.GeoChart(document.getElementById("users-by-country-map"));

            function t() {
                e.draw(a, o)
            }

            t(), window.addEventListener("resize", t)
        })
    })
}(jQuery);