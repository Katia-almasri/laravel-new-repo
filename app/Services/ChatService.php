<?php

namespace App\Services;

use App\Enums\ChatsEnum\ChatType;
use App\Exceptions\ChatExceptions\CantCreateChatException;
use App\Exceptions\ChatExceptions\NoChatsAvailableException;
use App\Interfaces\ChatServiceInterface;
use App\Models\Chat;
use App\Repositories\ChatRepository;
use Illuminate\Database\Eloquent\Collection;

class ChatService implements ChatServiceInterface
{
    public function __construct(protected ChatRepository $chatRepository, protected UserService $userService) {}

    public function getChatsByUserId(int $userId): array|Collection
    {
        $chats = $this->chatRepository->getAllByUserId($userId);
        if ($chats->isEmpty()) {
            throw new NoChatsAvailableException();
        }
        return $chats;
    }

    public function createNewChat($data): Chat|null
    {
        $contactUser = $this->userService->checkUserHasAccountByPhoneNumber($data['phone_number']);
        $currentUser = auth()->user();
        $data['user-members'] = [
            $contactUser->id,
            $currentUser
        ];
        $data['name'] = null;
        $data['decription'] = null;
        $data['is_group'] = ChatType::Chat->value;
        $newChat = $this->chatRepository->create($data);
        if ($newChat === null)
            throw new CantCreateChatException();
        return $newChat;
    }

    public function checkHasAccountByPhoneNumber($phoneNumber): Chat|null
    {
        return $this->chatRepository->getByPhoneNumber($phoneNumber);
    }
}
