<?php

namespace App\Services;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $userRepository) {}

    public function checkUserHasAccountByPhoneNumber($phoneNumber): User|null
    {
        return $this->userRepository->getByPhoneNumber($phoneNumber);
    }
}
