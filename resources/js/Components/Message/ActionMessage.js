import $ from "jquery";
import { renderRecievedMessage } from "./FunctionsMessage.js";
import { io } from "socket.io-client";
// Setup the WebSocket connection with Socket.IO Server
const socket = io("http://localhost:6001");

socket.on("connect", () => {
    console.log("Successfully connected to the Socket.IO server.");
});
// Listen for messages from the server
socket.on("chat.user-channel", function (data) {
    const messages = document.getElementById("send-message-btn");
    console.log(data.data.content);
    renderRecievedMessage(data);
    // const message = document.createElement("p");
    // message.textContent = data.content;
    // messages.appendChild(message);
});

// Send the message to the server
function sendMessage() {
    const messageInput = document.getElementById("messageInput");
    const message = messageInput.value;

    // Emit the message through Socket.IO
    socket.emit("send-message", { message: message });

    // Clear the input box
    messageInput.value = "";
}
