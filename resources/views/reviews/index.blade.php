@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Rating & Ulasan Sekolah</h2>

    <div class="alert alert-secondary mt-3">
        <strong>Rata-Rata Rating:</strong> {{ number_format($averageRating ?? 0, 1) }} / 5.0 ⭐
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @auth
        <div class="card mb-4">
            <div class="card-header">Beri Rating & Ulasan</div>
            <div class="card-body">
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Rating (1-5 Bintang)</label>
                        <select name="rating" class="form-select" required>
                            <option value="">-- Pilih Rating --</option>
                            <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Baik)</option>
                            <option value="4">⭐⭐⭐⭐ (4 - Baik)</option>
                            <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                            <option value="2">⭐⭐ (2 - Kurang)</option>
                            <option value="1">⭐ (1 - Sangat Kurang)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ulasan / Komentar</label>
                        <textarea name="comment" class="form-control" rows="3" placeholder="Bagikan pengalaman Anda..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info">Silakan login untuk memberikan ulasan.</div>
    @endauth

    <h4 class="mt-4">Ulasan Pengguna</h4>
    <div class="row">
        @forelse($reviews as $review)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->user->name ?? 'Pengguna' }}</h5>
                        <h6 class="card-subtitle mb-2 text-warning">
                            {{ str_repeat('⭐', $review->rating) }} ({{ $review->rating }}/5)
                        </h6>
                        <p class="card-text">{{ $review->comment ?? 'Tidak ada komentar.' }}</p>
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada ulasan.</p>
        @endforelse
    </div>
</div>
@endsection