<?php

namespace App\Interfaces;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;

interface ChatServiceInterface
{
    public function getChatsByUserId(int $userId): array|Collection;
    public function createNewChat($data): Chat|null;
}
