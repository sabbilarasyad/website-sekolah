<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index(): View
    {
        $guruList = Guru::query()
            ->orderBy('nama_lengkap_guru')
            ->get();

        return view('academic.guru.index', compact('guruList'));
    }
}
