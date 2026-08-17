@extends('layouts.app')

@section('title', 'Dashboard Orang Tua')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard Orang Tua</h1>

    @if ($anakAnak->isEmpty())
        <div class="bg-white rounded shadow p-6">
            <p class="text-gray-500 text-sm">
                Belum ada data anak yang terhubung dengan akun ini. Hubungi admin.
            </p>
        </div>
    @else
        <p class="text-sm text-gray-500 mb-4">
            Menampilkan {{ $anakAnak->count() }} anak yang terdaftar pada Kartu Keluarga Anda.
        </p>

        <div class="space-y-6">
            @foreach ($anakAnak as $anak)
                <div class="bg-white rounded shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">{{ $anak->Nama_Lengkap_Murid }}</h2>
                        <span class="text-xs text-gray-500">
                            NISN: {{ $anak->NISN }} &middot; NIS: {{ $anak->NIS }}
                        </span>
                    </div>

                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm mb-4">
                        <div>
                            <dt class="text-gray-500">Status</dt>
                            <dd class="text-gray-800">{{ $anak->Status }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500">Alamat</dt>
                            <dd class="text-gray-800">{{ $anak->Alamat }}</dd>
                        </div>
                    </dl>

                    @php $nilaiAnak = $nilaiPerAnak->get($anak->NISN, collect()); @endphp

                    <h3 class="text-sm font-semibold text-gray-600 mb-2">Nilai</h3>

                    @if ($nilaiAnak->isEmpty())
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
                                    @foreach ($nilaiAnak as $n)
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
            @endforeach
        </div>
    @endif
@endsection