/**
 * THIS FILE IS TO HANDLE THE RESPONSES AFTER POST REQUEST
 */
// 1. success resposne to post request
export function handleSuccessResponsePostRequet(
    status,
    message,
    timeout = 4000,
    processBar = true,
    closeButton = true,
    positionClass = "toast-bottom-center",
    data,
    modalClass,
    formClass,
    errorMessageContainer
) {
    //1. display the toaster
    displayToaster(status, message, timeout);

    //2. hide the pop up form
    $(modalClass).removeClass("block").addClass("hidden");

    //3. empty the input fields
    $(formClass)[0].reset();
    //4. empty the error messages if any
    $(errorMessageContainer).html("");
}

//2. error resposne to post reuqest
export function handleFailResponsePostRequet(
    status,
    message,
    timeout = 4000,
    processBar = true,
    closeButton = true,
    positionClass = "toast-bottom-center",
    data,
    modalClass,
    formClass
) {
    //1. display the error in the corresponding span
}

/**
 * UTILITY FUNCTIONS
 */
export function displayToaster(
    status,
    message,
    timeout,
    processBar = true,
    closeButton = true,
    positionClass = "toast-bottom-center"
) {
    if (status == 200) {
        toastr.success(message, "Success", {
            timeOut: timeout,
            progressBar: processBar,
            closeButton: closeButton,
            positionClass: positionClass,
        });
    }
}
