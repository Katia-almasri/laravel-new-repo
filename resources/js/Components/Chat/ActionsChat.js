import $ from "jquery";
import { fetchData } from "../../Utils/Requests.js";
import { renderMessages, renderEmptyMessage } from "./FunctionsChat.js";

$(document).ready(function () {
    $("#chat-container").on("click", ".chat-card", function () {
        const chatId = $(this).data("id");
        // load the messages related to this chat
        let apiUrl = window.routeNames.messagesIndex;
        apiUrl = window.routeNames.messagesIndex.replace(":chatId", chatId);

        console.log(apiUrl);
        fetchData(apiUrl, "GET")
            .then((response) => {
                if (response.status === 200) {
                    renderMessages(response.data);
                } else {
                    renderEmptyMessage(response.message);
                }
            })
            .catch((xhr, status, error) => {
                // Extract detailed error information
                let errorMessage = "An error occurred while fetching data.";
                errorMessage = xhr.responseJSON.message;
                console.log(xhr.status);
            });
    });
});
