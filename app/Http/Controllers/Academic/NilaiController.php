<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreNilaiRequest;
use App\Models\Mapel;
use App\Models\Murid;
use App\Models\Nilai;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NilaiController extends Controller
{
    public function index(): View
    {
        $nilaiList = Nilai::query()
            ->with(['murid:NISN,Nama_Lengkap_Murid', 'mapel:kode_mapel,nama_mapel'])
            ->orderByDesc('id_nilai')
            ->get();

        return view('academic.nilai.index', compact('nilaiList'));
    }

    public function create(): View
    {
        $muridList = Murid::query()
            ->select(['NISN', 'Nama_Lengkap_Murid'])
            ->orderBy('Nama_Lengkap_Murid')
            ->get();

        $mapelList = Mapel::query()
            ->orderBy('nama_mapel')
            ->get();

        return view('academic.nilai.create', compact('muridList', 'mapelList'));
    }

    public function store(StoreNilaiRequest $request): RedirectResponse
    {
        try {
            Nilai::create($request->validated());
        } catch (QueryException $e) {
            if ((int) $e->getCode() === 23000) {
                return back()->withInput()->withErrors([
                    'nisn' => 'Nilai untuk siswa ini pada mata pelajaran, semester, dan tahun ajaran tersebut sudah pernah diinput.',
                ]);
            }

            throw $e;
        }

        return redirect()
            ->route('academic.nilai.index')
            ->with('status', 'Nilai berhasil disimpan.');
    }
}
