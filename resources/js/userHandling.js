import { url } from "css-tree";
import "./bootstrap";

$(".test-btn").click(function () {
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this record!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, keep it",
    }).then((result) => {
        if (result.isConfirmed) {
            if (window.location.href.includes("users")) {
                $.ajax({
                    method: "DELETE",
                    // url: "http://shop.test/users/" + $(this).data("id"),
                    url: deleteUrl + $(this).data("id"),
                    // data: {$id = },
                })
                    .done(function (data) {
                        // Swal.fire("Deleted!", "User has been deleted.", "success");
                        window.location.reload();
                    })
                    .fail(function (data) {
                        console.log(data);
                        Swal.fire(
                            "Failed!",
                            "internal server error occured",
                            "error"
                        );
                    });
            } else if (window.location.href.includes("products")) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id"),
                    // data: {$id = },
                })
                    .done(function (data) {
                        // Swal.fire("Deleted!", "User has been deleted.", "success");
                        window.location.reload();
                    })
                    .fail(function (data) {
                        Swal.fire(
                            "Failed!",
                            "internal server error occured",
                            "error"
                        );
                    });
            } else if (window.location.href.includes("cart")) {
                $.ajax({
                    method: "DELETE",
                    url: WELCOME_DATA.addToCart + $(this).data("id"),
                    // data: {$id = },
                })
                    .done(function (data) {
                        window.location.reload();
                    })
                    .fail(function (data) {
                        Swal.fire(
                            "Failed!",
                            "internal server error occured",
                            "error"
                        );
                    });
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Your user is safe :)", "error");
        }
    });
});
