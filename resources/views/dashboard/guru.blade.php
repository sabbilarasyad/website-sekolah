@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Guru</h1>
<p class="text-gray-600 mb-6">Selamat datang, {{ $user->nama_lengkap }}.</p>

<div class="bg-white p-6 rounded shadow text-gray-500">
    Widget & menu guru (mis. input nilai) akan ditambahkan oleh domain terkait.
</div>
@endsection
