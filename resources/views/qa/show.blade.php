@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('qa.index') }}" class="btn btn-outline-secondary mb-3">&larr; Kembali ke Q&A</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h3>{{ $question->title }}</h3>
            <p class="text-muted">Oleh: {{ $question->user->name ?? 'User' }} | {{ $question->created_at->format('d M Y H:i') }}</p>
            <hr>
            <p>{{ $question->content }}</p>
        </div>
    </div>

    <h4>Jawaban ({{ $question->answers->count() }})</h4>
    <div class="mb-4">
        @forelse($question->answers as $answer)
            <div class="card mb-2">
                <div class="card-body">
                    <p class="mb-1">{{ $answer->content }}</p>
                    <small class="text-muted">Oleh: {{ $answer->user->name ?? 'User' }} pada {{ $answer->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada jawaban untuk pertanyaan ini.</p>
        @endforelse
    </div>

    @auth
        <div class="card">
            <div class="card-header">Berikan Jawaban Anda</div>
            <div class="card-body">
                <form action="{{ route('qa.answers.store', $question->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="content" class="form-control" rows="3" required placeholder="Tulis jawaban di sini..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim Jawaban</button>
                </form>
            </div>
        </div>
    @endauth
</div>
@endsection