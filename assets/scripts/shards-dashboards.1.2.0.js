!function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? t() : "function" == typeof define && define.amd ? define(t) : t()
}(0, function () {
    "use strict";

    function e(o) {
        return o && "object" == typeof o ? a(o) || n(o) ? o : r(o) ? function (e, t) {
            if (e.map) return e.map(t);
            for (var r = [], a = 0; a < e.length; a++) r.push(t(e[a], a));
            return r
        }(o, e) : function (e, t, r) {
            if (e.reduce) return e.reduce(t, r);
            for (var a = 0; a < e.length; a++) r = t(r, e[a], a);
            return r
        }(i(o), function (r, a) {
            return r[t(a)] = e(o[a]), r
        }, {}) : o
    }

    function t(e) {
        return e.replace(/[_.-](\w|$)/g, function (e, t) {
            return t.toUpperCase()
        })
    }

    var r = Array.isArray || function (e) {
        return "[object Array]" === Object.prototype.toString.call(e)
    }, a = function (e) {
        return "[object Date]" === Object.prototype.toString.call(e)
    }, n = function (e) {
        return "[object RegExp]" === Object.prototype.toString.call(e)
    }, o = Object.prototype.hasOwnProperty, i = Object.keys || function (e) {
        var t = [];
        for (var r in e) o.call(e, r) && t.push(r);
        return t
    };
    var s = Object.assign || function (e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var a in r) Object.prototype.hasOwnProperty.call(r, a) && (e[a] = r[a])
        }
        return e
    }, l = function () {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var a = t[r];
                a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a)
            }
        }

        return function (t, r, a) {
            return r && e(t.prototype, r), a && e(t, a), t
        }
    }();
    var c, d = function () {
        function e(t) {
            !function (e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this.value = t
        }

        return l(e, [{
            key: "toHex", value: function () {
                return this.value
            }
        }, {
            key: "toRGBA", value: function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 1, t = void 0;
                if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(this.value)) return 3 == (t = this.value.substring(1).split("")).length && (t = [t[0], t[0], t[1], t[1], t[2], t[2]]), "rgba(" + [(t = "0x" + t.join("")) >> 16 & 255, t >> 8 & 255, 255 & t].join(",") + "," + e + ")"
            }
        }]), e
    }(), u = {
        white: new d("#ffffff"),
        gray100: new d("#f8f9fa"),
        gray200: new d("#e9ecef"),
        gray300: new d("#dee2e6"),
        gray400: new d("#ced4da"),
        gray500: new d("#adb5bd"),
        gray600: new d("#868e96"),
        gray700: new d("#495057"),
        gray800: new d("#343a40"),
        gray900: new d("#212529"),
        black: new d("#000")
    }, f = {
        blueishGrey: new d("#5A6169"),
        blue: new d("#007bff"),
        indigo: new d("#674eec"),
        purple: new d("#8445f7"),
        pink: new d("#ff4169"),
        red: new d("#c4183c"),
        orange: new d("#fb7906"),
        yellow: new d("#ffb400"),
        green: new d("#17c671"),
        teal: new d("#1adba2"),
        cyan: new d("#00b8d8"),
        gray: u.gray600,
        grayDark: u.gray800
    }, h = {
        fiordBlue: new d("#3D5170"),
        reagentGray: new d("#818EA3"),
        shuttleGray: new d("#5A6169"),
        mischka: new d("#CACEDB"),
        athensGray: new d("#E9ECEF"),
        salmon: new d("#FF4169"),
        royalBlue: new d("#674EEC"),
        java: new d("#1ADBA2")
    }, p = {
        accent: f.blue,
        primary: f.blue,
        secondary: f.blueishGrey,
        success: f.green,
        info: f.cyan,
        warning: f.yellow,
        danger: f.red,
        light: u.gray200,
        dark: u.gray800
    }, b = window.ShardsDashboards && window.ShardsDashboards.colors ? window.ShardsDashboards.colors : {};
    if (0 !== Object.keys(b).length && b.constructor === Object) for (var y in b) if (b.hasOwnProperty(y)) {
        if (!/^#([A-Fa-f0-9]{3}$)|([A-Fa-f0-9]{6}$)/.test(b[y])) throw new Error("Please provide a hexadecimal color value if you are trying to override the Shards Dashboards colors.");
        b[(c = y, "string" == typeof c ? t(c) : e(c))] = new d(b[y])
    }
    var g = s({}, u, f, h, p, b);
    if ("undefined" == typeof Chart) throw new Error("Shards Dashboards requires the Chart.js library in order to work properly.");
    window.ShardsDashboards = window.ShardsDashboards ? window.ShardsDashboards : {}, window.ShardsDashboards.colors = g, $.extend($.easing, {
        easeOutSine: function (e, t, r, a, n) {
            return a * Math.sin(t / n * (Math.PI / 2)) + r
        }
    }), Chart.defaults.global.defaultFontColor = "#BBBCC1", Chart.defaults.global.elements.point.backgroundColor = "rgba(255, 255, 255, 1)", Chart.defaults.global.elements.point.radius = 4, Chart.defaults.global.elements.point.hoverRadius = 6, Chart.defaults.scale.gridLines.color = "rgba(233, 236 ,239, 1)", Chart.defaults.scale.ticks.autoSkip = !1, Chart.defaults.scale.ticks.minRotation = 0, Chart.defaults.scale.ticks.maxRotation = 0, Chart.defaults.scale.ticks.padding = 10, Chart.defaults.global.elements.point.backgroundColor = g.white.toHex(), Chart.defaults.global.elements.point.radius = 4, Chart.defaults.global.elements.point.hoverRadius = 5, Chart.defaults.global.tooltips.custom = function (e) {
        var t = document.getElementsByClassName("sc-tooltip-" + this._chart.id)[0];
        if (t || ((t = document.createElement("div")).classList.add("sc-tooltip-" + this._chart.id), t.innerHTML = "<table></table>", this._chart.canvas.parentNode.appendChild(t)), 0 !== e.opacity) {
            if (t.classList.remove("above", "below", "no-transform"), e.yAlign ? t.classList.add(e.yAlign) : t.classList.add("no-transform"), e.body) {
                var r = e.title || [], a = e.body.map(function (e) {
                    return e.lines
                }), n = "<thead>";
                r.forEach(function (e) {
                    n += "<tr><th>" + e + "</th></tr>"
                }), n += "</thead><tbody>", a.forEach(function (t, r) {
                    var a = e.labelColors[r], o = "background:" + a.backgroundColor;
                    o += "; border-color:" + a.borderColor, n += "<tr><td>" + ('<span class="sc-tooltip-key" style="' + (o += "; border-width: 2px") + '"></span>') + " " + t + "</td></tr>"
                }), n += "</tbody>", t.querySelector("table").innerHTML = n
            }
            var o = this._chart.canvas.offsetTop, i = this._chart.canvas.offsetLeft;
            t.style.opacity = 1, t.style.left = i + e.caretX + "px", t.style.top = o + e.caretY + "px"
        } else t.style.opacity = 0
    }, Chart.defaults.global.legendCallback = function (e) {
        var t = '<ul class="sc-legend-container sc-legend-chart-' + e.id + '">';
        return e.data.datasets.map(function (e) {
            t += '<li class="sc-legend"><span class="sc-legend__label" style="background: ' + e.borderColor + ' !important;"></span>' + (e.label ? e.label : "") + "</li>"
        }), t += "</ul>"
    }, Chart.defaults.LineWithLine = Chart.defaults.line, Chart.controllers.LineWithLine = Chart.controllers.line.extend({
        draw: function (e) {
            if (Chart.controllers.line.prototype.draw.call(this, e), this.chart.tooltip._active && this.chart.tooltip._active.length) {
                var t = this.chart.tooltip._active[0], r = this.chart.ctx, a = t.tooltipPosition().x,
                    n = this.chart.scales["y-axis-0"].top, o = this.chart.scales["y-axis-0"].bottom;
                r.save(), r.beginPath(), r.moveTo(a, n), r.lineTo(a, o), r.lineWidth = .5, r.strokeStyle = "#ddd", r.stroke(), r.restore()
            }
        }
    }), $(document).ready(function () {
        var e = {duration: 270, easing: "easeOutSine"};
        $(":not(.main-sidebar--icons-only) .dropdown").on("show.bs.dropdown", function () {
            $(this).find(".dropdown-menu").first().stop(!0, !0).slideDown(e)
        }), $(":not(.main-sidebar--icons-only) .dropdown").on("hide.bs.dropdown", function () {
            $(this).find(".dropdown-menu").first().stop(!0, !0).slideUp(e)
        }), $(".toggle-sidebar").click(function (e) {
            $(".main-sidebar").toggleClass("open")
        })
    })
});