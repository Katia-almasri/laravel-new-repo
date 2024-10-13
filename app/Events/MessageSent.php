<?php

namespace App\Events;

use App\Jobs\StoreMessageJob;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;



    /**
     * Create a new event instance.
     */
    public function __construct(protected int $senderId, protected string $content, protected int $chatId)
    {
        dispatch(new StoreMessageJob($this->senderId, $this->content, $this->chatId));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('chat.user-channel');
    }

    // Define the event name that will be broadcasted
    public function broadcastAs()
    {
        return 'message.sent';
    }

    /**
     * Data to broadcast with the event.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'senderId' => $this->senderId,
            'content' => $this->content,
            'chatId' => $this->chatId
        ];
    }

    // public function storeMessage()
    // {
    //     Message::create([
    //         'sender_id' => $this->messageData['sender_id'],
    //         'receiver_id' => $this->messageData['receiver_id'],
    //         'message' => $this->messageData['message'],
    //     ]);
    // }
}
