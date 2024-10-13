export function fetchData(url, method = "GET", data = {}) {
    // prepare the hieaders
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Accept: "application/json",
        },
    });

    return $.ajax({
        url: url,
        method: method,
        data: data,
        dataType: "json",
    })
        .done(function (response) {
            console.log("API response:", response);
        })
        .fail(function (xhr, status, error) {
            let errorMessage = "An error occurred. Please try again later."; // Default message
            errorMessage = xhr.responseJSON.message; // Get the specific error message from the response
        });
}
