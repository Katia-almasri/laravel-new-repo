<!-- component -->
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="w-1/4 bg-white border-r border-gray-300">
        <!-- Sidebar Header -->
        <x-Chat.contact-list.sidebar-component />

        <!-- contact list -->
        <x-Chat.contact-list.contact-list-component :userName="$userName" />
    </div>


    <!-- Main Chat Area -->
    <div class="flex-1">
        <x-message.message-list-component />

        <!-- Chat Input -->
        <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-3/4" id="send-message-card">
            <div class="flex items-center">
                <input type="text" placeholder="Say Hi..."
                    class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500"
                    id="send-message-btn">
                <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
            </div>
        </footer>
    </div>

    <!-- add contact list modal -->
    <x-Chat.contact-list.create-component />

    <!-- add group modal -->
    <x-Chat.group.create-group-component />
</div>
