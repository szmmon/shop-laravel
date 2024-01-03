import "./bootstrap";

$(".test-btn").click(function () {
    // alert("click");
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8000/users/" + $(this).data("id"),
        // data: {$id = },
    })
        .done(function (response) {
            // alert("success");
            window.location.reload();
        })
        .fail(function (response) {
            alert("error");
        });
});
