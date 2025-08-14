<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesAndLibrariesController extends Controller
{
    public function rabbitMq()
    {
        view()->share('sections', [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],

        ]);
        return view('rabbitmq.index');
    }
}
