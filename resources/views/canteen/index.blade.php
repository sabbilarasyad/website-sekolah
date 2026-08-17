@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Katalog Kantin Sekolah</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('canteen.checkout') }}" method="POST">
        @csrf
        <div class="row mt-4">
            @forelse($products as $index => $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                            <p class="fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-sm">Stok: {{ $product->stock }}</p>

                            @auth
                                <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $product->id }}">
                                <div class="mb-2">
                                    <label class="form-label">Jumlah Order:</label>
                                    <input type="number" name="items[{{ $index }}][quantity]" class="form-control" value="0" min="0" max="{{ $product->stock }}">
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada produk yang tersedia saat ini.</p>
            @endforelse
        </div>

        @auth
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg">Pesan Sekarang</button>
            </div>
        @else
            <div class="alert alert-info">Silakan login terlebih dahulu untuk melakukan pemesanan.</div>
        @endauth
    </form>
</div>
@endsection