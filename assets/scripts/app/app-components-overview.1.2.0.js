"use strict";
!function (e) {
    e(document).ready(function () {
        e("#slider-example-1").customSlider({
            start: 85,
            connect: [!0, !1],
            tooltips: !0,
            range: {min: 0, max: 100}
        }), e("#slider-example-2").customSlider({
            start: 15,
            connect: [!1, !0],
            range: {min: 0, max: 100}
        }), e("#slider-example-3").customSlider({
            start: [35, 65],
            range: {min: 0, max: 100},
            connect: !0,
            pips: {mode: "positions", values: [0, 25, 50, 75, 100], density: 5}
        })
    })
}(jQuery);