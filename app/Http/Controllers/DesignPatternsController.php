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
            ['section_id' => 'origins', 'section_name' => 'Originile design patternurilor'],
            ['section_id' => 'php_integration', 'section_name' => 'Cum a integrat PHP design patternuri'],
        ]);
        return view('design_patterns.index');
    }
}
