//ten import rozjebany daje error: Uncaught Error: Cannot find module 'path'
// import { response } from "express";

import { redirect } from "statuses";
import "./bootstrap";

$(function () {
    // $("div.products-count a").click(function () {
    //     $("div.products-actual-count").text($(this).text());
    //     getProducts($(this).text);
    // });
    // $("a#filter-button").click(function () {
    //     getProducts($("a.products-actual-count").text());
    // });

    //cart add
    $(".add-cart-btn").click(function (event) {
        // event.preventDefault();

        $.ajax({
            method: "POST",
            url: WELCOME_DATA.addToCart + $(this).data("id"),
        })
            .done(function (data) {
                Swal.fire({
                    title: "Added to cart!",
                    text: "Product has been added to cart.",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonText:
                        '<i class="fa-solid fa-cart-shopping"></i> Go to cart',
                    cancelButtonText:
                        '<i class="fa-solid fa-shop"></i> Continue shopping',
                })
                    // window.location.reload();
                    .then((result) => {
                        // console.log($(this).data("id"));
                        if (result.isConfirmed) {
                            window.location = WELCOME_DATA.addToCart;
                        }
                    });
            })
            .fail(function (data) {
                console.log(data.status);
                if (data.status == 401) {
                    Swal.fire({
                        title: "Failed to add to cart!",
                        text: "Log in or register to proceed.",
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText:
                            '<i class="fa-solid fa-user-plus"></i>Log in',
                        cancelButtonText:
                            '<i class="fa-solid fa-shop"></i> Continue shopping',
                    });
                } else Swal.fire("Failed!", "internal server error occured", "error");
            });
    });

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
                $("div#products-wrapper").empty();
                $.each(response.data, function (index, product) {
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
            return WELCOME_DATA.storagePath + "/" + product.image_path;
        }
        return WELCOME_DATA.defaultImage;
    }
});
