import "./bootstrap";

$(".test-btn").click(function () {
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this user!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, keep it",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: "http://localhost:8000/users/" + $(this).data("id"),
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
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Your user is safe :)", "error");
        }
    });
});
