<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        return view('biblioteca');
    }
}
