<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SOLIDController extends Controller
{
    public function index()
    {

        view()->share('sections', [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'single_responsibility', 'section_name' => 'Principiul responsabilității unice(SRP)'],
            ['section_id' => 'open_close_principle', 'section_name' => 'Principiul Închis/Deschis(OCP)'],
        ]);
        return view('solid_principles.index');
    }
}
