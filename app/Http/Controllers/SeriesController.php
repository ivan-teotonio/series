<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        return view('series.index');
    }

    public function create()
    {
        return view('series.create');
    }
}