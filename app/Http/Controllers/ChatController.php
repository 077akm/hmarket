<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('userMessage'); // Исправлено с 'message'

        $botResponses = [
            'Привет' => 'Привет! Чем я могу помочь?',
            'Как дела?' => 'У меня всегда хорошо!',
            'Какой сегодня день?' => 'Сегодня ' . date('d.m.Y'),
            'Спасибо' => 'Пожалуйста! Рад помочь.',
        ];

        $botResponse = isset($botResponses[$userMessage])
            ? 'Бот: ' . $botResponses[$userMessage]
            : 'Бот: Извините, я не понял ваш вопрос.';

        return response()->json(['message' => $botResponse]);
    }



}
