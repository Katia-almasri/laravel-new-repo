<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Message;
use App\Models\User;

class MessageRepository implements BasicRepositoryInterface
{
    public function getById($id) {}

    public function getByName($name) {}

    public function getAll() {}

    public function create($data) {}

    public function update($id, $data) {}

    public function delete($id) {}

    public function getByChatId($chatId)
    {
        return Message::query()->where('chat_id', $chatId);
    }

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data) {}

    public function createIfNotFoundByName($name, $data) {}


    public function updateOrCreateById($id, $data) {}

    public function updateOrCreateByName($name, $data) {}
}
