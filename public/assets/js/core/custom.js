$(document).ready(function () {
    //Delete record from the list//
    $(".listdelete").on("click", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger me-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "me-2",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    );
                }
            });
    });
    //End Delete

    //Change Status from Listing Page

    $(".statuschange").on("change", function () {
        clickStatus = $(this).prop("checked");
        var statuslink = $(this).attr("rel");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger me-2",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "<strong>Status Update</strong>",
                text: "Are you sure, you want to change the status?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "me-2",
                confirmButtonText: "Yes",
                cancelButtonText: '<i data-feather="thumbs-down"></i>',
                reverseButtons: false,
            })
            .then((result) => {
                if (result.value) {
                    window.location.href = statuslink;
                    swalWithBootstrapButtons.fire(
                        "Updated",
                        "Status Updated Successfully.",
                        "success"
                    );
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    if (clickStatus === "true") {
                        $(this).prop("checked", false);
                    } else {
                        $(this).prop("checked", true);
                    }
                }
            });
        feather.replace();
    });

    //End Status
});
