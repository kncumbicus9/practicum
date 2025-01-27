<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Muestra una vista donde estarán las opciones del sistema
        return view('home');
    }
}
