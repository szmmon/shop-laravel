//ten import rozjebany daje error: Uncaught Error: Cannot find module 'path'
// import { response } from "express";

import "./bootstrap";

$(function () {
    // $("div.products-count a").click(function () {
    //     $("div.products-actual-count").text($(this).text());
    //     getProducts($(this).text);
    // });
    // $("a#filter-button").click(function () {
    //     getProducts($("a.products-actual-count").text());
    // });
    //dropdown dont work

    // function getProducts() {
    $("#filter-button").click(function () {
        const form = $("form.sidebar-filter").serialize();
        console.log(decodeURI(form));
        $.ajax({
            method: "GET",
            url: "/",
            data: form,
        })
            .done(function (response) {
                // console.log(response.data);
                // alert("success");
                $("div#products-wrapper").empty();
                $.each(response.data, function (index, product) {
                    console.log(product);
                    const html =
                        '<div class="col-6 col-md-6 col-lg-4 mb-3">' +
                        '<div class="card h-100 border-0">' +
                        '<div class="card-img-top">' +
                        '<img src="' +
                        getImage(product) +
                        '" class="img-fluid mx-auto d-block" alt="Product image">' +
                        "</div>" +
                        '<div class="card-body text-center">' +
                        '<h4 class="card-title">' +
                        '<a href="product.html" class=" font-weight-bold text-dark text-uppercase small">' +
                        product.name +
                        "</a>" +
                        "</h4>" +
                        '<h5 class="card-price small">' +
                        "<i> PLN" +
                        product.price +
                        "</i>" +
                        "</h5>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                    $("div#products-wrapper").append(html);
                });
            })
            .fail(function (data) {
                console.log(data);
                Swal.fire("Failed!", "internal server error occured", "error");
            });
    });
    // }

    function getImage(product) {
        if (!!product.image_path) {
            return storagePath + "/" + product.image_path;
        }
        return defaultImage;
    }
});
