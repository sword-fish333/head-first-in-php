<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreationalDesignPatternsController extends Controller
{
    public function factoryPattern()
    {
        view()->share('sections', [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'example', 'section_name' => 'Exemplu'],
        ]);
        return view('design_patterns.factory_pattern');
    }

    public function singletonPattern()
    {
        view()->share('sections', [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'example', 'section_name' => 'Exemplu'],
        ]);
        return view('design_patterns.singleton_pattern');
    }
}
