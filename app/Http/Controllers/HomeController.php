<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        [$tabs,$activeTab]=$this->tabsDetails();
        return view('welcome',compact('tabs','activeTab'));
    }


    private function tabsDetails(): array
    {
        $tabs = [
            [
                'name' => 'PHP fundamentals',
                'links' => [
                    ['link' => 'oop-foundation', 'page' => 'Concepte fundamentale în OOP'],
                    ['link' => 'deep-dive-procedural', 'page' => 'Deep dive în programare procedurală'],
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
                    ['link' => '/solid-principles', 'page' => 'SOLID Principles'],
                    ['link' => '/solid-examples', 'page' => 'SOLID Examples'],
                ]
            ],
            [
                'name' => 'Design patterns',
                'links' => [
                    ['link' => '/creational-patterns', 'page' => 'Creational Patterns'],
                    ['link' => '/structural-patterns', 'page' => 'Structural Patterns'],
                ]
            ],
        ];
        $activeTab = 0; // Default active tab
        return [$tabs,$activeTab];
    }
}
