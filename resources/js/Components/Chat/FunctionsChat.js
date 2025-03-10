export function renderMessages(messages) {
    let messagesContainer = $("#messages-container");
    messages.forEach((message) => {
        messagesContainer.append(`
                <div class="flex mb-4 cursor-pointer" data-id="${message.id}">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar"
                            class="w-8 h-8 rounded-full">
                    </div>
                    <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                        <p class="text-gray-700">${message.content}</p>
                    </div>
                </div>
            `);
    });
}

export function renderEmptyMessage(message) {
    let noMessagesAvailableContainer = $("#no-messages-container");
    $("#no-messages").html(message);
    noMessagesAvailableContainer.show();
}
