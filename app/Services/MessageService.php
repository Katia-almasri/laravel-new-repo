<?php

namespace App\Services;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Message;
use App\Repositories\MessageRepository;

class MessageService
{
    public function __construct(protected MessageRepository $messageRepository) {}

    public function getMessagesBelongToChat($chatId)
    {
        return $this->messageRepository->getByChatId($chatId)->with('user')->get();
    }
}
