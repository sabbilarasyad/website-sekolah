@extends('layouts.main')

@section('title', 'Beranda - Website Sekolah')

@section('content')
<!-- Hero Section -->
<div class="bg-blue-800 text-white py-20 px-4 text-center">
    <h1 class="text-4xl font-extrabold mb-4">Selamat Datang di SMKN 1 KATAPANG</h1>
    <p class="text-lg max-w-2xl mx-auto mb-6 text-blue-100">Mencetak Generasi Unggul, Berkarakter, dan Siap Kerja di Era Digital.</p>
    <a href="{{ route('public.profil') }}" class="bg-white text-blue-900 font-bold px-6 py-3 rounded shadow hover:bg-gray-100 transition">Jelajahi Profil</a>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 space-y-12">
    <!-- Informasi Singkat Sekolah -->
    <section>
        <h2 class="text-2xl font-bold mb-4 border-b-2 border-blue-900 pb-2">Tentang Sekolah Kami</h2>
        <p class="text-gray-700 leading-relaxed">
            SMKN 1 Katapang merupakan salah satu sekolah menengah kejuruan unggulan yang siap mencetak lulusan terampil, mandiri, dan berdaya saing tinggi di dunia kerja. Dengan menghadirkan 9 kompetensi keahlian yang beragam, siswa memiliki kebebasan untuk memilih bidang keahlian yang paling sesuai dengan minat, bakat, serta potensi diri mereka.</p>
    </section>

    <!-- Preview Berita -->
    <section>
        <div class="flex justify-between items-center mb-6 border-b-2 border-blue-900 pb-2">
            <h2 class="text-2xl font-bold">Berita & Kegiatan Terbaru</h2>
            <a href="{{ route('public.berita') }}" class="text-blue-700 hover:underline font-semibold">Lihat Semua &rarr;</a>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded shadow border">
                <span class="inline-block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-2">
                    DATA DUMMY — Konten ini hanya digunakan untuk keperluan pengembangan.
                </span>
                <h3 class="font-bold text-lg mb-2">Workshop Industri Teknologi 2026</h3>
                <p class="text-sm text-gray-600 mb-4">Pelatihan intensif bersama praktisi industri untuk meningkatkan keahlian siswa.</p>
            </div>
            <div class="bg-white p-6 rounded shadow border">
                <span class="inline-block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-2">
                    DATA DUMMY — Konten ini hanya digunakan untuk keperluan pengembangan.
                </span>
                <h3 class="font-bold text-lg mb-2">Juara 1 Lomba Kompetensi Siswa</h3>
                <p class="text-sm text-gray-600 mb-4">Siswa kami berhasil membanggakan sekolah dalam ajang kompetisi tingkat provinsi.</p>
            </div>
        </div>
    </section>

    <!-- Preview Hubin -->
    <section class="bg-blue-50 p-6 rounded border border-blue-200">
        <h2 class="text-2xl font-bold mb-2">Hubungan Industri (Hubin)</h2>
        <span class="inline-block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-4">
            DATA DUMMY — Informasi Hubin belum menggunakan data resmi.
        </span>
        <p class="text-gray-700 mb-4">Kami bekerja sama dengan berbagai mitra industri untuk program Praktik Kerja Lapangan (PKL) dan penyaluran kerja.</p>
        <a href="{{ route('public.hubin') }}" class="inline-block bg-blue-900 text-white font-semibold px-4 py-2 rounded hover:bg-blue-800 transition">Informasi Hubin Selengkapnya</a>
    </section>
</div>
@endsection