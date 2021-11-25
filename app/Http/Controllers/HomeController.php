<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
