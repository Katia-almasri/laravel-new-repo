<?php

namespace App\Services;

use App\Constants\WhatsappConstants\WhatsAppDescriptionChat;
use App\Enums\ContactListsEnum\ContactListType;
use App\Exceptions\ContactListException\CantCreateContactExeption;
use App\Exceptions\ContactListException\NoContactListException;
use App\Models\Chat;
use App\Models\ContactList;
use App\Repositories\ChatRepository;
use App\Repositories\ContactListRepository;
use Illuminate\Database\Eloquent\Collection;

class ContactListSerivce
{
    public function __construct(
        protected ContactListRepository $contactListRepository,
        protected UserService $userService,
        protected ChatService $chatService
    ) {}

    public function getContactListsWithAccounts(): array|Collection
    {
        $contactListsWithAccounts = $this->contactListRepository->getAllWithAccounts()->with(['userAccount' => function ($query) {
            $query->select('id', 'name', 'phone_number');
        }])->get();
        if (empty($contactListsWithAccounts)) {
            throw new NoContactListException();
        }
        return $contactListsWithAccounts;
    }

    /**
     * add new name to my contact
     * if the contact`s phone number exist in the chat (has account), then 
     *         call also create new chat & has_account = 1
     * else
     *         only add this person to my contact & has_account = 0
     * @return void
     */
    public function createNewContact($firstName, $lastName,  $phoneNumber): ContactList
    {
        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $phoneNumber,
            'owner_id' => auth()->id(),
        ];
        // check if the phone number already has an account on whats-app
        $newContactList = $this->contactListRepository->create($data);
        if (!$newContactList)
            throw new CantCreateContactExeption();

        $userHasChat = $this->userService->checkUserHasAccountByPhoneNumber($phoneNumber);
        if ($userHasChat) {
            // 1. update the status of the contact list
            $this->contactListRepository->update($newContactList->id, ['has_account' => ContactListType::has_account->value]);

            // 2. create new chat record
            $this->chatService->createNewChat($data);
        }
        return $newContactList;
    }
}
