<?php

namespace App\Repositories;

use App\Interfaces\BasicRepositoryInterface;
use App\Models\Chat;
use App\Models\ContactList;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ContactListRepository implements BasicRepositoryInterface
{

    public function getById($id)
    {
        return ContactList::findOrFail($id);
    }

    public function getByName($name) {}

    public function getAll()
    {
        return ContactList::get();
    }

    public function create($data)
    {
        $data['owner_phone_number'] = auth()->user()->phone_number;
        return ContactList::create($data);
    }

    public function update($id, $data)
    {
        $contactList = ContactList::findOrFail($id);
        $contactList->update($data);
        return $contactList;
    }

    public function delete($id)
    {
        $contactList = ContactList::findOrFail($id);
        $contactList->delete();
    }

    ######################## CUSTOM METHODS #####################
    public function createIfNotFoundById($id, $data)
    {
        $contactList = ContactList::find($id);
        if (!$contactList) {
            $contactList = ContactList::create($data);
        }
        return $contactList;
    }

    public function createIfNotFoundByName($name, $data) {}


    public function updateOrCreateById($id, $data)
    {
        return ContactList::updateOrCreate(['id' => $id], $data);
    }

    public function updateOrCreateByName($name, $data) {}


    public function getByFirstName($firstName)
    {
        return ContactList::where('first_name', $firstName)->firstOrFail();
    }

    public function getByLastName($lastName)
    {
        return ContactList::where('last_name', $lastName)->firstOrFail();
    }

    public function getAllWithAccounts()
    {
        return ContactList::query()
            ->where([
                'has_account' => 1,
                'owner_phone_number' => auth()->user()->phone_number
            ]);
    }
    public function createIfNotFoundByFirstName($firstName, $data)
    {
        $contactList = ContactList::where('first_name', $firstName)->first();
        if (!$contactList) {
            $contactList = ContactList::create($data);
        }
        return $contactList;
    }

    public function updateOrCreateByFirstName($firstName, $data)
    {
        return ContactList::updateOrCreate(['first_name' => $firstName], $data);
    }
}
