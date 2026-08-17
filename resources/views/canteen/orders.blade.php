@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Riwayat & Status Pesanan Kantin</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive mt-4">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID Order</th>
                    <th>Detail Produk</th>
                    <th>Total Harga</th>
                    <th>Status Pesanan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>
                            <ul>
                                @foreach($order->orderItems as $item)
                                    <li>{{ $item->product->name }} x {{ $item->quantity }} (Rp {{ number_format($item->price, 0, ',', '.') }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @if($order->status === 'pending')
                                <span class="badge bg-warning text-dark">Menunggu Pembayaran / Konfirmasi</span>
                            @elseif($order->status === 'processing')
                                <span class="badge bg-info text-dark">Sedang Diproses</span>
                            @elseif($order->status === 'ready')
                                <span class="badge bg-success">Siap Diambil</span>
                            @elseif($order->status === 'completed')
                                <span class="badge bg-secondary">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dibatalkan</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection