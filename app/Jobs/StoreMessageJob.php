<?php

namespace App\Jobs;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new event instance.
     */
    public function __construct(protected int $senderId, protected string $content, protected int $chatId) {}


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Message::create([
            'content' => $this->content,
            'chat_id' => $this->chatId,
            'sender_id' => $this->senderId,
        ]);
    }
}
