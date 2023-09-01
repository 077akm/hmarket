<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\ScoringDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Google\Cloud\Vision\VisionClient;

use DB;
class DocumentController extends Controller
{

    public function profile(Document $item){
        $items = Document::where('user_id', Auth::user()->id)->get();
        $ids = Auth::user()->itemsQuant("Confirmed")->get();


        return view('documents.profile', ['items'=>$items, 'ids'=>$ids]);
    }

    public function itemsByCategory(Category $category){
        return view('documents.index', ['documents'=>$category->items, 'categories' => Category::all()]);
    }

    public function index(Request $request)
    {
        $documents = null;
        if ($request->search){
            $items = Document::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }else{
            $items = Document::all();
        }

        $kol = 0;
        if (Auth::check()) {
            $itemshop = Auth::user()->itemsQuant("in_cart")->get();
            foreach ($itemshop as $its) {
                $kol += $its->pivot->kol;
            }
        }



        return view('documents.index', ['documents'=>$items, 'categories' => Category::all()])->with('documents', $items);
    }

    public function create()
    {

        return view('documents.create');
    }

    public function zaiavka(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'text' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $now = DB::raw('CURRENT_TIMESTAMP');
        DB::table('document_message')->insert([
            'text' => $validated['text'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'user_id' => Auth::user() ? Auth::id() : 0,
            'quantity' => 0,
            'active' => true,
            'updated_at' => $now,
            'created_at' => $now
        ]);
        return redirect()->route('documents.index')->with('message', __('error.ketti1'));
    }





    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:255',
            'number' => 'required',
            'PKB_otchet.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'Zeinet_Aqy.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'Neke_anyktama.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'Bala_tizimi.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'Kualik.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'content' => 'required',
        ]);
        $user = Auth::user();

        // Проверяем, были ли документы уже отправлены
        if ($user->sent_documents) {
            return redirect()->route('documents.index')->with('message', 'Документы уже были отправлены.');
        }

        $document = Auth::user()->documents()->create([
            'name' => $validated['name'],
            'number' => $validated['number'],
            'content' => $validated['content'],
        ]);

        $score = 0;
        $totalScore = 0;

        foreach ($req->file('PKB_otchet', []) as $file) {
            $fileName = time() . $file->getClientOriginalName();
            $image_path = $file->storeAs('documents', $fileName, 'public');

            $document->pkbFiles()->create([
                'column_name' => 'PKB_otchet',
                'path' => '/storage/' . $image_path,
            ]);
            // Вызываем функцию анализа изображения и получаем скоринг
//            $imageScore = $this->analyzeImage($image_path, 'PKB_otchet');
//            $totalScore += $imageScore;

//            // Прибавляем скоринг изображения к общему скорингу
//            $score += $imageScore;
        }
        foreach ($req->file('Zeinet_Aqy', []) as $file) {
            $fileName = time() . $file->getClientOriginalName();
            $image_path = $file->storeAs('documents', $fileName, 'public');

            $document->zeinetFiles()->create([
                'column_name' => 'Zeinet_Aqy',
                'path' => '/storage/' . $image_path,
            ]);
            // Вызываем функцию анализа изображения и получаем скоринг
//            $imageScore = $this->analyzeImage($image_path, 'Zeinet_Aqy');
//            $totalScore += $imageScore;
//
//            // Прибавляем скоринг изображения к общему скорингу
//            $score += $imageScore;
        }
        foreach ($req->file('Neke_anyktama', []) as $file) {
            $fileName = time() . $file->getClientOriginalName();
            $image_path = $file->storeAs('documents', $fileName, 'public');

            $document->nekeFiles()->create([
                'column_name' => 'Neke_anyktama',
                'path' => '/storage/' . $image_path,
            ]);
            // Вызываем функцию анализа изображения и получаем скоринг
//            $imageScore = $this->analyzeImage($image_path, 'Neke_anyktama');
//            $totalScore += $imageScore;
//            // Прибавляем скоринг изображения к общему скорингу
//            $score += $imageScore;
        }
        foreach ($req->file('Bala_tizimi', []) as $file) {
            $fileName = time() . $file->getClientOriginalName();
            $image_path = $file->storeAs('documents', $fileName, 'public');

            $document->balaFiles()->create([
                'column_name' => 'Bala_tizimi',
                'path' => '/storage/' . $image_path,
            ]);
            // Вызываем функцию анализа изображения и получаем скоринг
//            $imageScore = $this->analyzeImage($image_path, 'Bala_tizimi');
//            $totalScore += $imageScore;
//            // Прибавляем скоринг изображения к общему скорингу
//            $score += $imageScore;
        }
        foreach ($req->file('Kualik', []) as $file) {
            $fileName = time() . $file->getClientOriginalName();
            $image_path = $file->storeAs('documents', $fileName, 'public');

            $document->kualikFiles()->create([
                'column_name' => 'Kualik',
                'path' => '/storage/' . $image_path,
            ]);
            // Вызываем функцию анализа изображения и получаем скоринг
//            $imageScore = $this->analyzeImage($image_path, 'Kualik');
//            $totalScore += $imageScore;
//            // Прибавляем скоринг изображения к общему скорингу
//            $score += $imageScore;
        }
        $score = $this->calculateScoring($document);

        $document = Auth::user()->documents()->latest()->first();

        $maxScore = 100;

        // Определение правильности документов
        $isCorrect = ($totalScore == $maxScore);
        // Создание записи о документе
        $documentRecord = new ScoringDocument();
        $documentRecord->user_id = Auth::id();
        $documentRecord->document_id = $document->id;
        $documentRecord->score = $totalScore;
        $documentRecord->is_correct = $isCorrect;
        $documentRecord->save();

        $user->update(['sent_documents' => true]);

//        // Обновляем статус одобрения у пользователя
        $approvalStatus =  'ожидает_подтверждения';
        $user->update(['approval_status' => $approvalStatus]);
//
//        // Если все документы правильные, выдать подтверждение
//        if ($isCorrect) {
//            // Ваш код для отправки подтверждения клиенту
//            return redirect()->route('documents.index')->with('message', 'Документы подтверждены.');
//        } else {
//            // Ваш код для отправки отказа клиенту
//            return redirect()->route('documents.index')->with('message', 'Документы не соответствуют требованиям.');
//        }


        return redirect()->route('documents.index')->with('message', __('error.ketti'));
    }

    private function calculateScoring(Document $document)
    {
        // Получите связанные файлы каждого типа
        $pkbFiles = $document->pkbFiles;
        $zeinetFiles = $document->zeinetFiles;
        $nekeFiles = $document->nekeFiles;
        $balaFiles = $document->balaFiles;
        $kualikFiles = $document->kualikFiles;

        // Пример вычисления скоринга на основе количества загруженных файлов
        $score = 0;
        $score += count($pkbFiles);
        $score += count($zeinetFiles);
        $score += count($nekeFiles);
        $score += count($balaFiles);
        $score += count($kualikFiles);

        // Пример вычисления скоринга на основе содержимого файлов
        foreach ($kualikFiles as $file) {
            $content = file_get_contents(public_path($file->path));
            // ... Ваш код для анализа содержимого файла и вычисления скоринга ...
        }
        if ($score >= 5) {
            $score = 5;
            return $score;
        }

        return $score;
    }

    private function analyzeImage($imagePath, $documentType)
    {
        // Используем Tesseract OCR для распознавания текста на изображении
        $imageFullPath = storage_path('app/public/' . $imagePath);
        $text = (new TesseractOCR($imageFullPath))->run();

        // Пример анализа текста и вычисления скоринга на основе длины текста
         $imageScore = strlen($text);
        // Пример проверки на наличие определенных слов в зависимости от типа документа
        if ($documentType === 'PKB_otchet' && strpos($text, 'определенное_слово_для_PKB_otchet') !== false) {
            // Увеличиваем скоринг на определенное значение
            $imageScore += 10;
        } elseif ($documentType === 'Zeinet_Aqy' && strpos($text, 'определенное_слово_для_удостоверение') !== false) {
            // Увеличиваем скоринг на другое значение
            $imageScore += 5;
        } elseif ($documentType === 'Neke_anyktama' && strpos($text, 'определенное_слово_для_удостоверение') !== false) {
            // Увеличиваем скоринг на другое значение
            $imageScore += 5;
        } elseif ($documentType === 'Bala_tizimi' && strpos($text, 'определенное_слово_для_удостоверение') !== false) {
            // Увеличиваем скоринг на другое значение
            $imageScore += 5;
        } elseif ($documentType === 'Kualik' && strpos($text, 'определенное_слово_для_удостоверение') !== false) {
            // Увеличиваем скоринг на другое значение
            $imageScore += 5;
        }

        return $imageScore;
    }




    public function show(Document $document)
    {
        $itemRated = Auth::user()->documentsRated()->where('document_id', $document->id)->first();
        if ($itemRated != null)
            $myRating = $itemRated->pivot->rating;
        return view('documents.show', ['item'=>$document,'categories' => Category::all() ]);
    }



    public function approve(Request $request, Document $document) {
        $approvalStatus = $request->input('approval_status'); // Получите значение из кнопки

        // Обновите статус пользователя в зависимости от значения
        if ($approvalStatus === 'Подтверждено' || $approvalStatus === 'Отклонено') {
            $document->user->update(['approval_status' => $approvalStatus]);
        }

        // Верните пользователя на страницу документа
        return redirect()->route('documents.show', $document->id)->with('message', 'Статус пользователя обновлен.');
    }

    public function calc(){

        return view('documents.calc');
    }

    public function edit(Document $item)
    {
        return view('documents.edit', ['item'=>$item, 'categories' => Category::all()]);
    }

    public function destroy(Document $document)
    {
        $document->delete();

        // После удаления документа проверяем, были ли все документы удалены
        $user = Auth::user();
        if ($user->documents->isEmpty()) {
            // Если все документы удалены, снимаем отметку о том, что документы были отправлены
            $user->update(['sent_documents' => false]);
        }

        return redirect()->route('adm.documents')->with('message', __('error.itmdstr'));
    }


}
