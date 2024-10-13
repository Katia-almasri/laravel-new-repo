<!-- Chat Name Container -->
<header class="bg-white p-4 text-gray-700 mess chat-name-container">
    <h1 class="text-2xl font-semibold">Katia</h1>
</header>

<!-- Chat Messages -->
<div id ="messages-container" class="h-screen overflow-y-auto p-4 pb-36">


    <!-- Incoming Message -->
    <div class="hidden h-screen overflow-y-auto p-4 pb-36" id="messages-container">
        <!-- Incoming Message -->
        <div class="flex mb-4 cursor-pointer">
            <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar"
                    class="w-8 h-8 rounded-full">
            </div>
            <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                <p class="text-gray-700">Hey Bob, how's it going?</p>
            </div>
        </div>
    </div>
    <!-- Hidden "no messages available" div -->
    <div id="no-messages-container" class="hidden flex items-center justify-center h-24 bg-gray-100 rounded-md p-2">
        <p id="no-messages" class="text-gray-600 text-lg font-semibold"></p>
    </div>

</div>
