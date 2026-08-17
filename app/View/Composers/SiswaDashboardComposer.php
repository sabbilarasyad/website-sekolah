<?php

namespace App\View\Composers;

use App\Models\Nilai;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Domain C (Student/Parent) - mengisi data profil & nilai siswa yang sedang
 * login ke view `dashboard.siswa`.
 *
 * READ-ONLY. Tidak ada fitur input/edit/delete nilai di sini.
 *
 * ISOLASI DATA:
 * Identitas siswa SELALU diambil dari \Illuminate\Support\Facades\Auth::user()->nisn (user yang
 * sedang login), TIDAK PERNAH dari request/URL/parameter. Dengan begitu
 * request manual (mis. mengubah parameter di URL) tidak bisa dipakai untuk
 * melihat data siswa lain, karena tidak ada parameter semacam itu yang
 * dibaca sama sekali.
 */
class SiswaDashboardComposer
{
    public function compose(View $view): void
    {
        $user = Auth::user();

        // Relasi User::murid() sudah didefinisikan Domain A:
        // belongsTo(Murid::class, 'nisn', 'NISN') -> otomatis scoped ke user login.
        $murid = $user->murid;

        // Nilai milik siswa ini saja.
        $nilai = Nilai::where('nisn', $user->nisn)->get();

        // Lookup nama mapel untuk ditampilkan (tabel `mapel` dibaca langsung,
        // tanpa membuat/menyentuh model milik Domain B).
        $mapelNames = $nilai->isNotEmpty()
            ? DB::table('mapel')
                ->whereIn('kode_mapel', $nilai->pluck('kode_mapel')->unique())
                ->pluck('nama_mapel', 'kode_mapel')
            : collect();

        $view->with([
            'murid' => $murid,
            'nilai' => $nilai,
            'mapelNames' => $mapelNames,
        ]);
    }
}