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

        ]);
        return view('rabbitmq.index');
    }
}
