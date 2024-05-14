<?php

namespace App\Console\Commands;

use App\Events\MessageSent;
use Illuminate\Console\Command;
use Symfony\Contracts\Service\Attribute\Required;

use function Laravel\Prompts\text;

class SendMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a message to the chat';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // here i'll get the name of the sender (name) and the message he sent (text).
        $name = text(
            label: "What is your name?",
            required:true
        );

        $text = text(
            label: "What is your message?",
            required:true
        );

        MessageSent::dispatch($name,$text);
    }
}
