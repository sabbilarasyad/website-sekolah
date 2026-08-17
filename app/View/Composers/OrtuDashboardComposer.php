<?php

namespace App\View\Composers;

use App\Models\Murid;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Domain C (Student/Parent) - mengisi data SEMUA anak (dan nilai
 * masing-masing) untuk orang tua yang sedang login, ke view
 * `dashboard.ortu`.
 *
 * KEPUTUSAN RESMI: TIDAK menggunakan view `data_siswa_ortu` (punya filter
 * hardcode `Nama_Lengkap_Murid LIKE 'A%'`, lihat sekolah.sql baris 369).
 * Kalau dipakai, orang tua hanya akan melihat anak yang namanya
 * berawalan "A" — bug data yang serius.
 *
 * Query di sini JOIN murid <-> ortu via N_KK milik user yang login, TANPA
 * filter huruf awal nama, sehingga SEMUA anak dengan N_KK tersebut tampil.
 *
 * READ-ONLY. Tidak ada fitur input/edit/delete nilai di sini.
 *
 * ISOLASI DATA:
 * N_KK SELALU diambil dari auth()->user()->n_kk (user yang sedang login),
 * TIDAK PERNAH dari request/URL/parameter. Nilai yang ditampilkan juga
 * selalu difilter dari NISN anak-anak yang sudah discope ke N_KK tersebut
 * -- tidak pernah dari NISN yang dikirim lewat request.
 */
class OrtuDashboardComposer
{
    public function compose(View $view): void
    {
        $user = Auth::user();

        // Semua anak dengan N_KK yang sama dengan orang tua yang login.
        // TIDAK ADA filter nama/huruf awal.
        $anakAnak = Murid::where('N_KK', $user->n_kk)->get();

        $nisnList = $anakAnak->pluck('NISN');

        // Nilai untuk semua anak tersebut, dikelompokkan per NISN.
        $nilaiPerAnak = Nilai::whereIn('nisn', $nisnList)
            ->get()
            ->groupBy('nisn');

        // Lookup nama mapel (tabel `mapel` dibaca langsung, tanpa membuat/
        // menyentuh model milik Domain B).
        $mapelNames = $nilaiPerAnak->isNotEmpty()
            ? DB::table('mapel')
                ->whereIn('kode_mapel', $nilaiPerAnak->flatten()->pluck('kode_mapel')->unique())
                ->pluck('nama_mapel', 'kode_mapel')
            : collect();

        $view->with([
            'anakAnak' => $anakAnak,
            'nilaiPerAnak' => $nilaiPerAnak,
            'mapelNames' => $mapelNames,
        ]);
    }
}