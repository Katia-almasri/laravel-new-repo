<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\ChatExceptions\CantCreateChatException;
use App\Exceptions\ChatExceptions\NoChatsAvailableException;
use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Interfaces\ChatServiceInterface;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function __construct(private ChatServiceInterface $chatService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $chats = $this->chatService->getChatsByUserId(auth()->id());
            return response()->json(['status' => StatusCodeConstant::OK, 'message' => 'chats fetched successfully!', 'data' => $chats]);
        } catch (NoChatsAvailableException $exception) {
            return response()->json(['status' => $exception->getCode(), 'message' => $exception->getMessage(), 'data' => []]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {

        try {
            DB::beginTransaction();
            $chat = $this->chatService->createNewChat($request);
            DB::commit();
            return response()->json(data: ['status' => StatusCodeConstant::CREATED, 'message' => 'new contact has been added successfully!', 'data' => $chat]);
        } catch (CantCreateChatException $exception) {
            DB::rollBack();
            return response()->json(['status' => $exception->getCode(), 'message' => $exception->getMessage(), 'data' => $request]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
