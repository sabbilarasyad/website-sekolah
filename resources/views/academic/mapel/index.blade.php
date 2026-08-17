@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Mata Pelajaran</h1>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Kode Mapel</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Nama Mapel</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">KKM</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Guru Pengampu</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($mapelList as $mapel)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $mapel->kode_mapel }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $mapel->nama_mapel }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $mapel->kkm }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                        {{ $mapel->guru->nama_lengkap_guru ?? 'Belum ditentukan' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                        Belum ada data mata pelajaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
