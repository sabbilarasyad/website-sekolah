@extends('layouts.main')

@section('title', 'Hubungan Industri (Hubin) - Website Sekolah')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12 space-y-10">
    <div>
        <h1 class="text-3xl font-bold border-b-2 border-blue-900 pb-2 mb-3">Hubungan Industri (Hubin)</h1>
        <p class="text-gray-700">Pusat informasi kerja sama industri, Praktik Kerja Lapangan (PKL), dan karir lulusan.</p>
    </div>

    <!-- Section Mitra Industri Placeholder -->
    <div class="bg-white p-6 rounded shadow border">
        <h2 class="text-xl font-bold mb-2 text-blue-900">Mitra Kerja Sama Industri</h2>
        <span class="inline-block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-4">
            DATA DUMMY — Daftar mitra industri akan ditambahkan pada tahap pengembangan berikutnya.
        </span>
        <div class="grid md:grid-cols-4 gap-4 mt-2">
            <div class="border p-4 text-center rounded bg-gray-50 text-gray-500 font-semibold">Perusahaan Contoh A</div>
            <div class="border p-4 text-center rounded bg-gray-50 text-gray-500 font-semibold">Perusahaan Contoh B</div>
            <div class="border p-4 text-center rounded bg-gray-50 text-gray-500 font-semibold">Perusahaan Contoh C</div>
            <div class="border p-4 text-center rounded bg-gray-50 text-gray-500 font-semibold">Perusahaan Contoh D</div>
        </div>
    </div>

    <!-- Section Program PKL Placeholder -->
    <div class="bg-white p-6 rounded shadow border">
        <h2 class="text-xl font-bold mb-2 text-blue-900">Program Praktik Kerja Lapangan (PKL)</h2>
        <span class="inline-block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-4">
            DATA DUMMY — Informasi PKL belum menggunakan data resmi.
        </span>
        <p class="text-gray-700">
            Halaman ini nantinya akan menyediakan alur pendaftaran PKL, syarat administrasi, serta jurnal kegiatan siswa selama menjalani program di dunia industri.
        </p>
    </div>

    <!-- Section Lowongan & Kontak Hubin -->
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded shadow border">
            <h2 class="text-xl font-bold mb-2 text-blue-900">Informasi Lowongan / Karir</h2>
            <span class="inline-block bg-red-100 text-red-700 text-xs font-bold px-2.5 py-1 rounded mb-4">
                DATA DUMMY — Informasi lowongan kerja belum aktif.
            </span>
            <p class="text-sm text-gray-600">Peluang kerja khusus bagi alumni SMK Negeri Demo akan diperbarui di bagian ini.</p>
        </div>
        <div class="bg-white p-6 rounded shadow border">
            <h2 class="text-xl font-bold mb-2 text-blue-900">Kontak Hubin</h2>
            <p class="text-sm text-gray-700 mb-1"><strong>Email:</strong> hubin@sekolah.demo.id (Placeholder)</p>
            <p class="text-sm text-gray-700"><strong>Ruang Layanan:</strong> Gedung B, Lantai 1</p>
        </div>
    </div>
</div>
@endsection