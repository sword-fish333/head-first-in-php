<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function acid()
    {
        $sections = [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'atomicity', 'section_name' => 'Atomicitate - Principiul "Totul sau nimic"'],
            ['section_id' => 'consistency', 'section_name' => 'Consistență - "Regulile nu sunt niciodată încălcate"'],
            ['section_id' => 'isolation', 'section_name' => 'Izolare - Principiul "spațiului de lucru privat"'],
            ['section_id' => 'durability', 'section_name' => 'Durabilitate - Principiul "Intrării permanente"'],

        ];

        return view('acid.index', compact('sections'));
    }
}
