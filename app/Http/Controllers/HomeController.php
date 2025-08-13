<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        [$tabs, $activeTab] = $this->tabsDetails();
        return view('welcome', compact('tabs', 'activeTab'));
    }


    private function tabsDetails(): array
    {
        $tabs = [
            [
                'name' => 'Paradigme de programare generale',
                'links' => [
                    ['link' => 'oop-foundation', 'page' => 'OOP'],
                    ['link' => 'deep-dive-procedural', 'page' => 'Programare procedurală'],
                ]
            ],
            [
                'name' => 'Laravel',
                'links' => [
                    ['link' => '/service-container', 'page' => 'Service container'],
                    ['link' => '/eloquent-orm', 'page' => 'Eloquent ORM'],
                ]
            ],
            [
                'name' => 'SOLID',
                'links' => [
                    ['link' => '/solid-principles', 'page' => 'principiile SOLID în detaliu'],
                    ['link' => '/solid-examples', 'page' => 'SOLID Examples'],
                ]
            ],
            [
                'name' => 'Design patterns',
                'links' => [
                    ['link' => '/design-patterns', 'page' => 'Introducere în design patterns'],
                ],
                'sections' => [
                    ['name' => 'Deisgn patternuri creaționale',
                        'links' => [
                            ['link' => '/factory-pattern', 'page' => 'Factory pattern'],
                            ['link' => 'singleton-pattern', 'page' => 'Singleton pattern'],
                        ]
                    ]
                ],
            ],
            [
                'name' => 'Baze de date',
                'links' => [
                    ['link' => '/acid', 'page' => 'Principiile ACID'],
                    ['link' => '/cap-theorem', 'page' => 'Teorema CAP'],
                ]
            ],
        ];
        $activeTab = 0; // Default active tab
        return [$tabs, $activeTab];
    }
}
