<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Satu route /dashboard, tampilan berbeda per role.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        return match ($user->role) {
            'admin' => view('dashboard.admin', compact('user')),
            'guru' => view('dashboard.guru', compact('user')),
            'siswa' => view('dashboard.siswa', compact('user')),
            'ortu' => view('dashboard.ortu', compact('user')),
            default => abort(403, 'Role tidak dikenali.'),
        };
    }
}