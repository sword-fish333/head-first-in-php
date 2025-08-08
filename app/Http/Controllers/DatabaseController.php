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
            ['section_id' => 'interview_questions', 'section_name' => 'Întrebări de interviu'],
        ];
        view()->share('sections', $sections);
        return view('acid.index');
    }

    public function capTheorem()
    {
        $sections = [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'consistency', 'section_name' => 'Consistență - Toată lumea vede același lucru'],
            ['section_id' => 'availability', 'section_name' => 'Disponibilitate - Sistemul răspunde întotdeauna'],
            ['section_id' => 'partition_tolerance', 'section_name' => 'Toleranța la partiție - Sistemul distribuit robust'],
            ['section_id' => 'fundamental_tradeoff', 'section_name' => 'Compromisul fundamental'],
            ['section_id' => 'practical_implementation', 'section_name' => 'Exemplu de implementare în PHP'],
            ['section_id' => 'additional_notes', 'section_name' => 'Detalii adiționale'],

        ];
        return view('cap_theorem.index', compact('sections'));
    }
}
