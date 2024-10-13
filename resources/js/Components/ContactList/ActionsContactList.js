import $ from "jquery";
import { fetchData } from "../../Utils/Requests.js";
import { handleSuccessResponsePostRequet } from "../../Basic/Handlers/handleResponse.js";
import { displayValidationErrorsFields } from "../../Basic/Handlers/handleErrorMessages.js";
import {
    renderChats,
    renderEmptyContactListMessage,
} from "./FunctionsContactList.js";

const menuButton = document.getElementById("menuButton");
const menuDropdown = document.getElementById("menuDropdown");

menuButton.addEventListener("click", () => {
    if (menuDropdown.classList.contains("hidden")) {
        menuDropdown.classList.remove("hidden");
    } else {
        menuDropdown.classList.add("hidden");
    }
});

// Close the menu if you click outside of it
document.addEventListener("click", (e) => {
    if (!menuDropdown.contains(e.target) && !menuButton.contains(e.target)) {
        menuDropdown.classList.add("hidden");
    }
});

$(document).ready(function () {
    let apiUrl = window.routeNames.chatsIndex;
    fetchData(apiUrl, "GET")
        .then((response) => {
            if (response.status === 200) {
                renderChats(response.data);
                console.log(response.data);
            } else {
                renderEmptyContactListMessage(response.message);
            }
        })
        .catch((xhr, status, error) => {
            // Extract detailed error information
            let errorMessage = "An error occurred while fetching data.";
            errorMessage = xhr.responseJSON.message;
            console.log(xhr.status);
        });

    /**
     * ON CLICK ADD NEW CONTACT LIST*/
    $("#create-new-chat-btn").click(function () {
        $("#add-contact-list-modal").removeClass("hidden").addClass("block");
    });

    /**
     * ON CLOASE THE MODAL
     */
    $("[data-modal-hide='authentication-modal']").click(function () {
        $("#add-contact-list-modal").removeClass("block").addClass("hidden");
    });

    /**
     * SUBMIT THE CREATION NEW CONTACT
     */
    $("#create-contact-form").submit(function (event) {
        event.preventDefault();
        let apiUrl = window.routeNames.chatsStore;
        fetchData(apiUrl, "POST", $(this).serialize())
            .then((response) => {
                if (response.status === 200) {
                    handleSuccessResponsePostRequet(
                        response.status,
                        response.message,
                        4000,
                        true,
                        true,
                        "toast-bottom-center",
                        response.data,
                        "#add-contact-list-modal",
                        "#create-contact-form",
                        ".error-message"
                    );
                } else {
                    // display the error message
                }
            })
            .catch((xhr, status, error) => {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    displayValidationErrorsFields(errors);
                }
            });
    });
});
