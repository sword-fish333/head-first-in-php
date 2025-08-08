<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OopFoundationController extends Controller
{
    public function index()
    {

        view()->share('sections', [
            ['section_id' => 'intro', 'section_name' => 'Introducere în OOP'],
            ['section_id' => 'differences', 'section_name' => 'Diferențe conceptuale'],
            ['section_id' => 'advantages', 'section_name' => 'Avantaje'],
            ['section_id' => 'disadvantages', 'section_name' => 'Dezavantaje'],
            ['section_id' => 'conclusion', 'section_name' => 'Concluzii'],

        ]);
        return view('oop_fundamentals');
    }

    public function deepDiveProcedural()
    {
        $sections = [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
        ];
        view()->share('sections', $sections);
        return view('deep_dive_procedural/index');
    }


}
