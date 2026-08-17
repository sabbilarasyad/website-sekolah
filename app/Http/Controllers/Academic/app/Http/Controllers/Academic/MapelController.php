<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\View\View;

class MapelController extends Controller
{
    public function index(): View
    {
        $mapelList = Mapel::query()
            ->with('guru')
            ->orderBy('nama_mapel')
            ->get();

        return view('academic.mapel.index', compact('mapelList'));
    }
}
