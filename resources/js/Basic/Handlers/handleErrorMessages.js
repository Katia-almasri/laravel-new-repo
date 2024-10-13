/**
 * THIS FUNCTION IS TO HANDLE THE ERROR MESSAGES APPEAR AFTER FAILED POST REQUEST
 */
export function displayValidationErrorsFields(errors) {
    $(".error-message").text("");

    $.each(errors, function (key, value) {
        var errorSpan = $("#" + key + "-error");
        if (errorSpan.length) {
            errorSpan.html(value[0]);
            errorSpan.removeClass("d-none");
        }
    });
}
