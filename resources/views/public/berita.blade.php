@extends('layouts.main')

@section('title', 'Berita & Informasi - Website Sekolah')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold border-b-2 border-blue-900 pb-2 mb-6">Berita & Informasi Sekolah</h1>

    <div class="grid md:grid-cols-3 gap-6">
        <!-- Item Berita 1 -->
        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="p-5">
                <span class="block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-3">
                    DATA DUMMY — Konten ini hanya digunakan untuk keperluan pengembangan.
                </span>
                <span class="text-xs text-gray-400">12 Agustus 2026</span>
                <h2 class="font-bold text-lg my-2">Workshop Pengembangan Web Berbasis Laravel</h2>
                <p class="text-sm text-gray-600 mb-4">Kegiatan pelatihan untuk mempertajam keahlian siswa dalam pemanfaatan framework modern.</p>
            </div>
        </div>

        <!-- Item Berita 2 -->
        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="p-5">
                <span class="block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-3">
                    DATA DUMMY — Konten ini hanya digunakan untuk keperluan pengembangan.
                </span>
                <span class="text-xs text-gray-400">05 Agustus 2026</span>
                <h2 class="font-bold text-lg my-2">Pelaksanaan Asesmen Nasional Berbasis Komputer</h2>
                <p class="text-sm text-gray-600 mb-4">Persiapan dan pelaksanaan ANBK berjalan lancar dan tertib di seluruh lab komputer.</p>
            </div>
        </div>

        <!-- Item Berita 3 -->
        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <div class="p-5">
                <span class="block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-3">
                    DATA DUMMY — Konten ini meupakan data contoh untuk pengujian antarmuka.
                </span>
                <span class="text-xs text-gray-400">20 Juli 2026</span>
                <h2 class="font-bold text-lg my-2">Kegiatan Masa Pengenalan Lingkungan Sekolah</h2>
                <p class="text-sm text-gray-600 mb-4">Menyambut siswa baru dengan berbagai kegiatan edukatif dan pengenalan budaya sekolah.</p>
            </div>
        </div>
    </div>
</div>
@endsection