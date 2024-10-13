<?php

namespace App\Console\Commands;

use App\Events\MessageSent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

use function Laravel\Prompts\text;

class sendMessage extends Command
{
    protected $signature = 'send:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a message to a specified Redis channel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = $this->argument('message');
        $chatId = 1;
        $userId = 1;
        // Prepare the data (you can also customize this as needed)
        $data = [
            'message' => 'new-message',
            'data'  => [
                'content' => $message,
                'chatId' => $chatId,
                'userId' => $userId,
            ]
        ];
        // new event
        event(new MessageSent($userId, $message, $chatId));


        // Output success message
        $this->info(json_encode($data));
        Log::info(json_encode($data));

        return 0;
    }
}
