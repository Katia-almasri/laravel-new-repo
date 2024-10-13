<!-- Contact List -->
<div class="overflow-y-auto h-screen p-3 mb-9 pb-20" id="chat-container">
    <!-- This ensures the chat container is a fixed height -->
    <div class="flex flex-col">
        <!-- Dynamic chat items will be appended here -->
    </div>

    <!-- Hidden "no chats available" div -->
    <div id="no-chats-container" class="hidden flex items-center justify-center h-24 bg-gray-100 rounded-md p-2">
        <p id="no-chats" class="text-gray-600 text-lg font-semibold"></p>
    </div>
</div>

<script>
    // get the route names
    window.routeNames = {
        chatsIndex: "{{ route('chats.index') }}",
        chatsStore: "{{ route('contact-list.store') }}",
        contactListHasAccounts: "{{ route('contact-list.index.with-accounts') }}",
        groupsStore: "{{ route('groups.store') }}",
        messagesIndex: "{{ route('messages.get-all', ':chatId') }}",
    };
</script>
