@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard Siswa</h1>

    {{-- Profil --}}
    <div class="bg-white rounded shadow p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Profil Saya</h2>

        @if ($murid)
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <dt class="text-gray-500">Nama Lengkap</dt>
                    <dd class="text-gray-800">{{ $murid->Nama_Lengkap_Murid }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">NISN</dt>
                    <dd class="text-gray-800">{{ $murid->NISN }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">NIS</dt>
                    <dd class="text-gray-800">{{ $murid->NIS }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Tempat, Tanggal Lahir</dt>
                    <dd class="text-gray-800">
                        {{ $murid->TMPT_lahir }},
                        {{ \Illuminate\Support\Carbon::parse($murid->TGL_lahir)->translatedFormat('d F Y') }}
                    </dd>
                </div>
                <div>
                    <dt class="text-gray-500">Alamat</dt>
                    <dd class="text-gray-800">{{ $murid->Alamat }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500">Status</dt>
                    <dd class="text-gray-800">{{ $murid->Status }}</dd>
                </div>
            </dl>
        @else
            <p class="text-gray-500 text-sm">
                Data murid belum terhubung dengan akun ini. Hubungi admin.
            </p>
        @endif
    </div>

    {{-- Nilai (read-only) --}}
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Nilai Saya</h2>

        @if ($nilai->isEmpty())
            <p class="text-gray-500 text-sm">Belum ada data nilai.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-gray-500 border-b">
                        <tr>
                            <th class="py-2 pr-4">Mata Pelajaran</th>
                            <th class="py-2 pr-4">Tugas</th>
                            <th class="py-2 pr-4">UH</th>
                            <th class="py-2 pr-4">UTS</th>
                            <th class="py-2 pr-4">UAS</th>
                            <th class="py-2 pr-4">Semester</th>
                            <th class="py-2 pr-4">Tahun Ajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $n)
                            <tr class="border-b last:border-0">
                                <td class="py-2 pr-4">{{ $mapelNames[$n->kode_mapel] ?? $n->kode_mapel }}</td>
                                <td class="py-2 pr-4">{{ $n->nilai_tugas ?? '-' }}</td>
                                <td class="py-2 pr-4">{{ $n->nilai_uh ?? '-' }}</td>
                                <td class="py-2 pr-4">{{ $n->nilai_uts ?? '-' }}</td>
                                <td class="py-2 pr-4">{{ $n->nilai_uas ?? '-' }}</td>
                                <td class="py-2 pr-4">{{ $n->semester }}</td>
                                <td class="py-2 pr-4">{{ $n->tahun_ajaran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection