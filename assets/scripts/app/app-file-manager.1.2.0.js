"use strict";
!function (e) {
    e(".file-manager-list").DataTable({
        responsive: !0,
        order: [[0, "desc"]]
    }), e(".file-manager__item").click(function () {
        e(this).toggleClass("file-manager__item--selected")
    })
}(jQuery);