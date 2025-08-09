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
            ['section_id' => 'liskov_substitution', 'section_name' => 'Liskov Substitution Principle (LSP)'],
            ['section_id' => 'interface_segregation', 'section_name' => 'Principiul separării Interfețelor'],
            ['section_id' => 'dependency_inversion', 'section_name' => 'Principiul Dependenței inverse'],
        ]);
        return view('solid_principles.index');
    }
}
