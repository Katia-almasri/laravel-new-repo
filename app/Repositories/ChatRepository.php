<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Chat;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ChatRepository implements BasicRepositoryInterface
{
    public function getById($id)
    {
        return Chat::findOrFail($id);
    }

    public function getByName($name)
    {
        return Chat::where('name', $name)->firstOrFail();
    }

    public function getByPhoneNumber($phoneNumber): Chat|null
    {
        return Chat::with('users')
            ->whereHas('users', function ($query) use ($phoneNumber) {
                $query->where('phone_number', $phoneNumber);
            })
            ->first();
    }

    public function getAll()
    {
        return Chat::with('users')->get();
    }

    public function getAllByUserId($userId)
    {
        return Chat::select('first_name', 'last_name', 'id', 'is_group', 'name')  // Select actual columns
            ->where('owner_id', $userId)
            ->get();  // Make sure to execute the query
    }

    public function create($data)
    {
        //1. create new chat
        $newChat = Chat::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['first_name'],
            'name' => $data['name'],
            'decription' => $data['decription'],
            'is_group' => $data['is_group'],
            'owner_id' => auth()->user()->id,
        ]);

        //2. attach the 2 users to it
        foreach ($data['user-members'] as $key => $value) {
            $newChat->users()->attach(id: $value);
        }
        return $newChat;
    }

    public function update($id, $data)
    {
        $chat = Chat::findOrFail($id);
        $chat->update($data);
        return $chat;
    }

    public function delete($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();
    }

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data)
    {
        $chat = Chat::find($id);
        if (!$chat) {
            $chat = Chat::create($data);
        }
        return $chat;
    }

    public function createIfNotFoundByName($name, $data)
    {
        $chat = Chat::where('name', $name)->first();
        if (!$chat) {
            $chat = Chat::create($data);
        }
        return $chat;
    }


    public function updateOrCreateById($id, $data)
    {
        return Chat::updateOrCreate(['id' => $id], $data);
    }

    public function updateOrCreateByName($name, $data)
    {
        return Chat::updateOrCreate(['name' => $name], $data);
    }

    ################### WITH RELATIONSHIPS #########################
    public function getAllWithOwner()
    {
        return Chat::with('owner')->get();
    }
}
