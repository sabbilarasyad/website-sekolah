<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.home');
    }

    public function profil()
    {
        return view('public.profil');
    }

    public function berita()
    {
        return view('public.berita');
    }

    public function hubin()
    {
        return view('public.hubin');
    }
    public function showLoginForm()
    {
    return view('auth.login');
    }
}