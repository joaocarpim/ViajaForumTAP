<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    // Exige que o usuário esteja autenticado e seja moderador ou admin
    public function __construct()
    {
        $this->middleware(['auth', 'moderator']);
    }

    public function index()
    {
        return view('moderator.dashboard'); // Precisa criar esta view
    }
}
