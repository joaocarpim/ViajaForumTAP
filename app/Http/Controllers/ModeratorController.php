<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'moderator']);
    }

    public function index()
    {
        return view('moderator.dashboard'); 
    }
}
