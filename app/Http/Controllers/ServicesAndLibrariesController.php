<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesAndLibrariesController extends Controller
{
    public function rabbitMq()
    {
        view()->share('sections', [
            ['section_id' => 'introduction', 'section_name' => 'Introducere'],
            ['section_id' => 'history', 'section_name' => 'Istoric'],
            ['section_id' => 'internal_architecture', 'section_name' => 'Arhitectură Internă'],
            ['section_id' => 'exchange_types', 'section_name' => 'Tipuri de exchange-uri'],
            ['section_id' => 'php_implementation_pattern', 'section_name' => 'Implementări specifice în PHP'],

        ]);
        return view('rabbitmq.index');
    }
}
