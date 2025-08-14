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
            ['section_id' => 'laravel_implementation', 'section_name' => 'Implementarea sofisticată a design patternurilor din Laravel'],
            ['section_id' => 'balancing_benefits_and_tradeoffs', 'section_name' => 'Beneficii și compromisuri'],
            ['section_id' => 'design_patterns_in_mature_php', 'section_name' => 'Importanța design patternuri-lor în maturizarea PHP-ului'],
            ['section_id' => 'conclusion', 'section_name' => 'Concluzie'],

        ]);
        return view('design_patterns.index');
    }
}
