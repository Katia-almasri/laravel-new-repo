<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\ChatExceptions\CantCreateChatException;
use App\Exceptions\ContactListException\CantCreateContactExeption;
use App\Exceptions\ContactListException\NoContactListException;
use App\Models\ContactList;
use App\Http\Requests\StoreContactListRequest;
use App\Http\Requests\UpdateContactListRequest;
use App\Services\ContactListSerivce;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ContactListController extends Controller
{
    public function __construct(private ContactListSerivce $contactListSerivce,) {}


    /**
     * Display a listing of the resource. (with accounts in whats or not)
     */
    public function index() {}

    /**
     * 
     * get the contact list for the user where they have the accounts
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContactListsWithAccounts(): JsonResponse
    {
        try {
            $contactLists = $this->contactListSerivce->getContactListsWithAccounts();
            return response()->json(['status' => StatusCodeConstant::OK, 'message' => 'contact lists fetched successfully!', 'data' => $contactLists]);
        } catch (NoContactListException $exception) {
            return response()->json(['status' => $exception->getCode(), 'message' => $exception->getMessage(), 'data' => []]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * add the existing previous chatting to my contacts 
     * @return void
     */
    public function addChatToContact() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactListRequest $request)
    {
        try {
            DB::beginTransaction();
            //1. create new cotnact list
            $newContactList = $this->contactListSerivce->createNewContact($request->input('first-name'), $request->input('last-name'), $request->input('phone-number'));
            DB::commit();

            return response()->json(['status' => StatusCodeConstant::OK, 'message' => 'new contact list has been added', 'data' => $newContactList]);
        } catch (CantCreateContactExeption $exception) {
            DB::rollBack();
            return response()->json(['status' => $exception->getCode(), 'message' => $exception->getMessage(), 'data' => []]);
        } catch (CantCreateChatException $exception) {
            DB::rollBack();
            return response()->json(['status' => $exception->getCode(), 'message' => $exception->getMessage(), 'data' => []]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactList $contactList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactList $contactList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactListRequest $request, ContactList $contactList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactList $contactList)
    {
        //
    }
}
