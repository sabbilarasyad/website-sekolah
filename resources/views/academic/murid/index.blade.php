@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Data Siswa</h1>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Nama Lengkap</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">NISN</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($muridList as $murid)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $murid->Nama_Lengkap_Murid }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $murid->NISN }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <span class="inline-block px-2 py-0.5 text-xs rounded bg-gray-200 text-gray-700">
                            {{ $murid->Status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                        Belum ada data siswa.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
