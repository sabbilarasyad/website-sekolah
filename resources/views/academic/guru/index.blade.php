@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Data Guru</h1>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">NIP</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Nama Lengkap</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Jenis Kelamin</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">No HP</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Email</th>
                <th class="px-4 py-3 text-left font-medium text-gray-500 uppercase text-xs">Alamat</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($guruList as $guru)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $guru->nip }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $guru->nama_lengkap_guru }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">
                        {{ $guru->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $guru->no_hp ?? '-' }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ $guru->email ?? '-' }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $guru->alamat ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                        Belum ada data guru.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
