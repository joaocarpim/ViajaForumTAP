<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Exige que o usuário esteja autenticado e seja admin
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // Função para exibir o painel de admin
    public function index()
    {
        return view('admin.dashboard'); // Precisa criar esta view
    }
}
