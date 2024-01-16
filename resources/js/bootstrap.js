import "bootstrap";
window._ = require("lodash");

try {
    window.$ = window.jQuery = require("jquery");
    window.Popper = require("@popperjs/core");
    window.bootstrap = require("bootstrap");
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Swal from "sweetalert2";
window.Swal = Swal;
