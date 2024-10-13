<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. get the data from user table and chat table
        // make random relationship and insert into the break table
        $users = User::all();
        $chats = Chat::all();

        // Loop through each chat and assign users to it
        foreach ($chats as $chat) {
            // Randomly attach users to chats
            $chat->users()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
