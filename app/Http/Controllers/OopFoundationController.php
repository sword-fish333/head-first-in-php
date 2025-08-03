<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OopFoundationController extends Controller
{
    public function index()
    {
        return view('oop_fundamentals');
    }

    public function deepDiveProcedural()
    {
        return view('deep_dive_procedural/index');
    }
}
