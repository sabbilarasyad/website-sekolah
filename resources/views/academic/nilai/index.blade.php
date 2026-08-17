@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Data Nilai</h1>

    <a href="{{ route('academic.nilai.create') }}"
       class="inline-block px-4 py-2 rounded bg-indigo-600 text-white text-sm hover:bg-indigo-700">
        Input Nilai
    </a>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Nama Siswa</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">NISN</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Mata Pelajaran</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Semester</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Tahun Ajaran</th>
                <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase text-xs">Tugas</th>
                <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase text-xs">UH</th>
                <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase text-xs">UTS</th>
                <th class="px-4 py-3 text-right font-medium text-gray-500 uppercase text-xs">UAS</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($nilaiList as $nilai)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                        {{ $nilai->murid->Nama_Lengkap_Murid ?? '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $nilai->nisn }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                        {{ $nilai->mapel->nama_mapel ?? '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $nilai->semester }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $nilai->tahun_ajaran }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-right text-gray-700">
                        {{ $nilai->nilai_tugas !== null ? number_format((float) $nilai->nilai_tugas, 2) : '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-right text-gray-700">
                        {{ $nilai->nilai_uh !== null ? number_format((float) $nilai->nilai_uh, 2) : '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-right text-gray-700">
                        {{ $nilai->nilai_uts !== null ? number_format((float) $nilai->nilai_uts, 2) : '-' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-right text-gray-700">
                        {{ $nilai->nilai_uas !== null ? number_format((float) $nilai->nilai_uas, 2) : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="px-4 py-6 text-center text-gray-500">
                        Belum ada data nilai.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
