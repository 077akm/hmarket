<?php

namespace App\Http\Controllers;
use App\Models\Message;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Auth;


class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            $user = Auth::user(); // Получите текущего авторизованного пользователя

            // Если пользователь авторизован, сохраните сообщение в таблице
            if ($user) {
                Message::create([
                    'user_id' => $user->id,
                    'content' => $message,
                    'is_bot_reply' => false,
                ]);
            }

            // Обработка команд
            if ($message == __('bet.hi') || $message == __('bet.hi1') ) {
                $this->askName($botman);
            } elseif ($message == 'help') {
                $botman->reply(__('bet.helpp'));
            } else {
                $botman->reply(__('bet.sag'));
            }
        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask(__('bet.namebot'), function(Answer $answer) {
            $name = $answer->getText();
            $this->say(__('bet.qwes') . $name);
        });
    }
}
