"use strict";
jQuery(document).ready(function () {
    new Quill("#editor-container", {
        modules: {toolbar: [[{header: [1, 2, 3, 4, 5, !1]}], ["bold", "italic", "underline", "strike"], ["blockquote", "code-block"], [{header: 1}, {header: 2}], [{list: "ordered"}, {list: "bullet"}], [{script: "sub"}, {script: "super"}], [{indent: "-1"}, {indent: "+1"}]]},
        placeholder: "Words can be like x-rays if you use them properly...",
        theme: "snow"
    })
});