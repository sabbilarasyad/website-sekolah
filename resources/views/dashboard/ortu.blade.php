@extends('layouts.app')

@section('title', 'Dashboard Orang Tua')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Orang Tua</h1>
<p class="text-gray-600 mb-6">Selamat datang, {{ $user->nama_lengkap }}.</p>

<div class="bg-white p-6 rounded shadow text-gray-500">
    Widget & menu ortu (mis. pantau nilai anak via view data_siswa_ortu)
    akan ditambahkan oleh domain terkait.
</div>
@endsection
