<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SOLIDController extends Controller
{
    public function index()
    {

        view()->share('sections', [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],

        ]);
        return view('solid_principles.index');
    }
}
