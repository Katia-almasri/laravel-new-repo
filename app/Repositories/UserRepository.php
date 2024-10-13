<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\User;

class UserRepository implements BasicRepositoryInterface
{
    public function getById($id): User|null
    {
        return User::find($id);
    }

    public function getByName($name): User|null
    {
        return User::where('name', $name)->first();
    }

    public function getAll()
    {
        return User::all();
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function update($id, $data)
    {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        $user->delete();
        return $user;
    }

    ######################## CUSTOM METHODS #####################

    public function createIfNotFoundById($id, $data)
    {
        if (!User::find($id)) {
            return $this->create($data);
        }

        return null;
    }

    public function createIfNotFoundByName($name, $data)
    {
        if (!User::where('name', $name)->exists()) {
            return $this->create($data);
        }

        return null;
    }

    public function updateOrCreateById($id, $data)
    {
        return User::updateOrCreate(['id' => $id], $data);
    }

    public function updateOrCreateByName($name, $data)
    {
        return User::updateOrCreate(['name' => $name], $data);
    }
    ############### SPECIFIC METHODS ################  

    public function getByPhoneNumber($phoneNumber): User|null
    {
        return User::where('phone_number', $phoneNumber)->first();
    }
}
