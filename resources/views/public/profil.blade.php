@extends('layouts.main')

@section('title', 'Profil - Website Sekolah')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12 space-y-10">
    <div>
        <h1 class="text-3xl font-bold border-b-2 border-blue-900 pb-2 mb-4">Profil Sekolah</h1>
        <p class="text-gray-700 leading-relaxed">
            SMK Negeri Demo didirikan untuk memberikan pendidikan kejuruan berkualitas tinggi yang adaptif terhadap perkembangan teknologi dan kebutuhan dunia kerja.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded shadow border">
            <h2 class="text-xl font-bold mb-3 text-blue-900">Visi</h2>
            <p class="text-gray-700 italic">"Menjadi pusat pendidikan kejuruan unggulan yang berkarakter, berdaya saing global, dan berwawasan lingkungan."</p>
        </div>
        <div class="bg-white p-6 rounded shadow border">
            <h2 class="text-xl font-bold mb-3 text-blue-900">Misi</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Menyelenggarakan pembelajaran berbasis kompetensi industri.</li>
                <li>Membina karakter siswa yang disiplin, jujur, dan profesional.</li>
                <li>Memperkuat kemitraan dengan dunia kerja dan dunia industri.</li>
            </ul>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold border-b-2 border-blue-900 pb-2 mb-4">Program Keahlian / Jurusan</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-5 rounded border shadow-sm">
                <h3 class="font-bold text-lg mb-1">Pengembangan Perangkat Lunak & Gim</h3>
                <p class="text-sm text-gray-600">Fokus pada pemrograman, web development, dan rekayasa perangkat lunak.</p>
            </div>
            <div class="bg-white p-5 rounded border shadow-sm">
                <h3 class="font-bold text-lg mb-1">Teknik Komputer & Jaringan</h3>
                <p class="text-sm text-gray-600">Mempelajari infrastruktur jaringan, administrasi server, dan cyber security.</p>
            </div>
            <div class="bg-white p-5 rounded border shadow-sm">
                <h3 class="font-bold text-lg mb-1">Desain Komunikasi Visual</h3>
                <p class="text-sm text-gray-600">Mengembangkan kreatifitas multimedia, grafis, dan multimedia interaktif.</p>
            </div>
        </div>
    </div>
</div>
@endsection