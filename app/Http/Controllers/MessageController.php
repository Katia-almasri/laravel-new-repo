<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\MessagesExceptions\NoMessagesAvailableException;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Services\MessageService;

class MessageController extends Controller
{
    public function __construct(private MessageService $messageService) {}

    public function index()
    {
        //
    }

    public function getMessagesByChat($chatId)
    {
        try {
            $messages = $this->messageService->getMessagesBelongToChat($chatId);
            if ($messages->isEmpty())
                throw new NoMessagesAvailableException();
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'messages fetched successfully!', 'data' => $messages]);
        } catch (NoMessagesAvailableException $exception) {
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
    public function store(StoreMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
