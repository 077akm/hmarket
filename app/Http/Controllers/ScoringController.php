<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoringDocument;

class ScoringController extends Controller
{
    // Примерный код для вычисления скоринга документов
    public function calculateDocumentScore(Request $request, $userId)
    {
        $documentsData = $request->input('documents');

        // Пример: Оценка по наличию определенных документов
        $requiredDocuments = ['passport', 'employment_proof', 'income_statement'];
        $missingDocuments = array_diff($requiredDocuments, $documentsData);

        $documentScore = 1.0; // Базовый скоринг

        if (empty($missingDocuments)) {
            $documentScore += 0.5; // Дополнительный скоринг, если все необходимые документы предоставлены
        } else {
            $documentScore -= count($missingDocuments) * 0.2; // Штрафной скоринг за недостающие документы
        }

        // Пример: Оценка по уровню дохода
        $userIncome = $documentsData['income'] ?? 0;

        if ($userIncome >= 5000) {
            $documentScore += 0.3; // Дополнительный скоринг за высокий доход
        }

        // Сохранение результата скоринга в базе данных
        $scoringDocument = new ScoringDocument();
        $scoringDocument->user_id = $userId;
        $scoringDocument->document_score = $documentScore;
        $scoringDocument->save();

        return response()->json(['document_score' => $documentScore]);
    }
    public function viewScoringResults($userId)
    {
        $scoringResults = ScoringDocument::where('user_id', $userId)->get();

        return view('scoring-results', ['scoringResults' => $scoringResults]);
    }


}
