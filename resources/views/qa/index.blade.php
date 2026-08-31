@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Forum Tanya Jawab (Q&A)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        <div class="card mb-4 mt-3">
            <div class="card-header">Buat Pertanyaan Baru</div>
            <div class="card-body">
                <form action="{{ route('qa.questions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Pertanyaan</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Pertanyaan</label>
                        <textarea name="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info">Login terlebih dahulu untuk mengajukan pertanyaan.</div>
    @endauth

    <h4 class="mt-4">Daftar Pertanyaan</h4>
    <div class="list-group">
        @forelse($questions as $question)
            <a href="{{ route('qa.show', $question->id) }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $question->title }}</h5>
                    <small>{{ $question->created_at->diffForHumans() }}</small>
                </div>
                <p class="mb-1 text-truncate">{{ $question->content }}</p>
                <small class="text-muted">Ditanyakan oleh: {{ $question->user->name ?? 'User' }} | Jawaban: {{ $question->answers->count() }}</small>
            </a>
        @empty
            <p>Belum ada pertanyaan.</p>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $questions->links() }}
    </div>
</div>
@endsection