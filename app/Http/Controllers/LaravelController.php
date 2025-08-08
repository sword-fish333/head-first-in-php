<?php

namespace App\Http\Controllers;

use App\Services\AsdfService;
use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function serviceContainer(AsdfService $service) //example of automatic dependency resolution
    {

        $sections = [
            ['section_id' => 'definition', 'section_name' => 'Definiție'],
            ['section_id' => 'first_principles', 'section_name' => 'First principles'],
            ['section_id' => 'basic_service_container_example', 'section_name' => 'Exemplu de service container de la zero'],
            ['section_id' => 'loosely_coupled_example', 'section_name' => 'Exemplu de dependențe slabe'],
            ['section_id' => 'laravel', 'section_name' => 'Containerul de servicii în laravel'],
            ['section_id' => 'dependency_injection_example', 'section_name' => 'Exemplu de definire a dependențelor'],
            ['section_id' => 'advanced_implementation', 'section_name' => 'Implementare avansată'],
            ['section_id' => 'performance_optimisation', 'section_name' => 'Optimizarea de performanțe'],

        ];
        view()->share('sections', $sections);
        return view('service_container.index');
    }
}
