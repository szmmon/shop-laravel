import "bootstrap";
window._ = require("lodash");

try {
    window.Popper = require("@popperjs/core");
    window.bootstrap = require("bootstrap");
    window.$ = window.jQuery = require("jquery");
    window.$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name = "csrf-token"f]').attr("content"),
        },
    });
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Swal from "sweetalert2";
window.Swal = Swal;
