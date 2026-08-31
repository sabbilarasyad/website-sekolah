<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use Illuminate\View\View;

class MuridController extends Controller
{
    public function index(): View
    {
        $muridList = Murid::query()
            ->select(['NISN', 'Nama_Lengkap_Murid', 'Status'])
            ->orderBy('Nama_Lengkap_Murid')
            ->get();

        return view('academic.murid.index', compact('muridList'));
    }
}
