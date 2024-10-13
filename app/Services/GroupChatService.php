<?php

namespace App\Services;

use App\Enums\ChatsEnum\ChatType;
use App\Exceptions\ChatExceptions\CantCreateChatException;
use App\Exceptions\ChatExceptions\NoChatsAvailableException;
use App\Interfaces\BasicRepositoryInterface;
use App\Interfaces\ChatServiceInterface;
use App\Models\Chat;
use App\Repositories\ChatRepository;
use Illuminate\Database\Eloquent\Collection;

class GroupChatService implements ChatServiceInterface
{
    public function __construct(protected ChatRepository $chatRepository) {}

    public function getChatsByUserId(int $userId): array|Collection
    {
        $chats = $this->chatRepository->getAllByUserId($userId)->where('is_group', 1)->whereHas('messages')->get();
        if ($chats->isEmpty()) {
            throw new NoChatsAvailableException();
        }
        return $chats;
    }
    public function createNewChat($data): Chat|null
    {
        $data['is_group'] = ChatType::Group->value;
        $newChat = $this->chatRepository->create($data);
        if ($newChat === null)
            throw new CantCreateChatException();
        return $newChat;
    }
}
