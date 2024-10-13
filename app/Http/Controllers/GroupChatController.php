<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstants\StatusCodeConstant;
use App\Exceptions\ChatExceptions\CantCreateGroupException;
use App\Http\Requests\StoreGroupChatRequest;
use App\Interfaces\ChatServiceInterface;
use App\Services\ChatService;
use App\Services\GroupChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupChatController extends Controller
{
    public function __construct(private ChatServiceInterface $chatService) {}
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
    public function store(StoreGroupChatRequest $request)
    {
        try {
            DB::beginTransaction();
            $group = $this->chatService->createNewChat($request);
            DB::commit();
            return response()->json(data: ['status' => StatusCodeConstant::OK, 'message' => 'new contact has been added successfully!', 'data' => $group]);
        } catch (CantCreateGroupException $exception) {
            DB::rollBack();
            return response()->json(['status' => $exception->getCode(), 'message' => $exception->getMessage(), 'data' => $request]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
