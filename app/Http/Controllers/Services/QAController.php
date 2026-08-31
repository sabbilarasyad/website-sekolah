<?php

namespace App\Http\Controllers\Services;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreQuestionRequest;
use App\Http\Requests\Services\StoreAnswerRequest;
use App\Models\Question;
use App\Models\Answer;

class QAController extends Controller
{
    // Menampilkan daftar pertanyaan
    public function index()
    {
        $questions = Question::with(['user', 'answers.user'])
            ->latest()
            ->paginate(10);

        return view('qa.index', compact('questions'));
    }

    // Menampilkan detail pertanyaan & jawaban
    public function show(Question $question)
    {
        $question->load(['user', 'answers.user']);
        return view('qa.show', compact('question'));
    }

    // Membuat pertanyaan baru
    public function storeQuestion(StoreQuestionRequest $request)
    {
        Question::create([
            'user_id' => Auth::id(), // FK ke users.id
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('qa.index')
            ->with('success', 'Pertanyaan berhasil diajukan.');
    }

    // Memberikan jawaban
    public function storeAnswer(StoreAnswerRequest $request, Question $question)
    {
        Answer::create([
            'question_id' => $question->id,
            'user_id' => Auth::id(), // FK ke users.id
            'content' => $request->content,
        ]);

        return redirect()->route('qa.show', $question->id)
            ->with('success', 'Jawaban berhasil dikirim.');
    }
}