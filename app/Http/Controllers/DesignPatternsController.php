<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignPatternsController extends Controller
{
    public function index()
    {
        view()->share('sections', [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'benefits', 'section_name' => 'Beneficii ale utilizărilor de design patterns'],
            ['section_id' => 'factory_design_patter', 'section_name' => 'Pattern-ul factory'],
            ['section_id' => 'singleton_design_pattern', 'section_name' => 'Pattern-ul singleton'],
        ]);
        return view('design_patterns.index');
    }
}
