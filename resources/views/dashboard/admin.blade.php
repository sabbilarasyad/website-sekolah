@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard Admin</h1>
<p class="text-gray-600 mb-6">Selamat datang, {{ $user->nama_lengkap }}.</p>

{{--
    Domain B/C/D/E (mis. manajemen guru/murid/mapel/nilai) menambahkan
    konten dashboard admin di sini atau membuat partial baru yang di-@include.
    Jangan mengubah layout/navbar di layouts/app.blade.php.
--}}
<div class="bg-white p-6 rounded shadow text-gray-500">
    Widget & menu admin akan ditambahkan oleh domain terkait.
</div>
@endsection
