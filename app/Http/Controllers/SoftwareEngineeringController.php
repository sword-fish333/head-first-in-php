<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoftwareEngineeringController extends Controller
{
    public function index()
    {
        view()->share('sections', [
            ['section_id' => 'random-quotes', 'section_name' => 'Citate utile'],

        ]);
        return view('software_engineering.index');
    }
}
