/**
 * BUILD THE HTML TAGS*/
export function renderChats(chats) {
    let chatContainer = $("#chat-container");
    chats.forEach((chat) => {
        const fullName = !chat.is_group
            ? chat.first_name + " " + chat.last_name
            : chat.name;
        const groupLabel = chat.is_group
            ? `<span class="ml-2 px-2 py-1 bg-blue-500 text-white text-xs font-semibold rounded">Group</span>`
            : "";
        chatContainer.append(`
                <div id="${
                    chat.id
                }" class="chat-card flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md" data-id="${
            chat.id
        }">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-12 h-12 rounded-full">
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">${fullName} ${groupLabel}</h2>
                        <p class="text-gray-600">${
                            chat.last_message || "No messages yet."
                        }</p>
                    </div>
                </div>
            `);
    });
}

/**
 * RENDER THE FAILED RESPONSE MESSAGES*/
export function renderEmptyContactListMessage(message) {
    let noChatsAvailableContainer = $("#no-chats-container");
    $("#no-chats").html(message);
    noChatsAvailableContainer.show();
}
