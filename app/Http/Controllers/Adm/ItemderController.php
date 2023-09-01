<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Message;
use Illuminate\Http\Request;

class ItemderController extends Controller
{
    public function showItems(){
        $documents = Document::all();

        return view('adm.documents', ['documents'=>$documents]);
    }
    public function showsob(){
        $messages = Message::with('user')->get(); // Получите все сообщения с информацией о пользователях
        return view('adm.botchat', ['messages' => $messages]);
    }
    public function chatdelete(Request $request, $messageId)
    {
        try {
            // Найдем сообщение по его идентификатору и удалите его
            $message = Message::findOrFail($messageId);
            $message->delete();

            return redirect()->back()->with('success', 'Сообщение успешно удалено');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при удалении сообщения: ' . $e->getMessage());
        }
    }

    public function chatdeleteMultiple(Request $request)
    {
        $selectedMessages = $request->input('selected_messages', []);

        try {
            // Находим и удаляем выбранные сообщения
            Message::whereIn('id', $selectedMessages)->delete();

            return redirect()->back()->with('success', 'Выбранные сообщения успешно удалены');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при удалении сообщений: ' . $e->getMessage());
        }
    }
}
