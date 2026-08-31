@extends('layouts.app')

@section('title', 'Input Nilai')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Input Nilai</h1>
</div>

<div class="bg-white rounded shadow p-6 max-w-3xl">
    <form method="POST" action="{{ route('academic.nilai.store') }}" class="space-y-5">
        @csrf

        <div>
            <label for="nisn" class="block text-sm font-medium text-gray-700">Siswa</label>
            <select id="nisn" name="nisn"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Pilih Siswa --</option>
                @foreach ($muridList as $murid)
                    <option value="{{ $murid->NISN }}" @selected(old('nisn') == $murid->NISN)>
                        {{ $murid->Nama_Lengkap_Murid }} ({{ $murid->NISN }})
                    </option>
                @endforeach
            </select>
            @error('nisn')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kode_mapel" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
            <select id="kode_mapel" name="kode_mapel"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Pilih Mata Pelajaran --</option>
                @foreach ($mapelList as $mapel)
                    <option value="{{ $mapel->kode_mapel }}" @selected(old('kode_mapel') == $mapel->kode_mapel)>
                        {{ $mapel->nama_mapel }} ({{ $mapel->kode_mapel }}) &mdash; KKM {{ $mapel->kkm }}
                    </option>
                @endforeach
            </select>
            @error('kode_mapel')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                <select id="semester" name="semester"
                        class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">-- Pilih Semester --</option>
                    <option value="Ganjil" @selected(old('semester') === 'Ganjil')>Ganjil</option>
                    <option value="Genap" @selected(old('semester') === 'Genap')>Genap</option>
                </select>
                @error('semester')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
                <input type="text" id="tahun_ajaran" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}"
                       placeholder="contoh: 2026/2027"
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('tahun_ajaran')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="nilai_tugas" class="block text-sm font-medium text-gray-700">Nilai Tugas</label>
                <input type="number" id="nilai_tugas" name="nilai_tugas" value="{{ old('nilai_tugas') }}"
                       min="0" max="100" step="0.01"
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('nilai_tugas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nilai_uh" class="block text-sm font-medium text-gray-700">Nilai UH</label>
                <input type="number" id="nilai_uh" name="nilai_uh" value="{{ old('nilai_uh') }}"
                       min="0" max="100" step="0.01"
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('nilai_uh')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nilai_uts" class="block text-sm font-medium text-gray-700">Nilai UTS</label>
                <input type="number" id="nilai_uts" name="nilai_uts" value="{{ old('nilai_uts') }}"
                       min="0" max="100" step="0.01"
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('nilai_uts')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nilai_uas" class="block text-sm font-medium text-gray-700">Nilai UAS</label>
                <input type="number" id="nilai_uas" name="nilai_uas" value="{{ old('nilai_uas') }}"
                       min="0" max="100" step="0.01"
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('nilai_uas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="px-4 py-2 rounded bg-indigo-600 text-white text-sm hover:bg-indigo-700">
                Simpan Nilai
            </button>

            <a href="{{ route('academic.nilai.index') }}"
               class="px-4 py-2 rounded border border-gray-300 text-gray-700 text-sm hover:bg-gray-50">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
