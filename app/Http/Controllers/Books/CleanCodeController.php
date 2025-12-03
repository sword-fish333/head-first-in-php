<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CleanCodeController extends Controller
{
    public function index()
    {
        view()->share('sections', [
            ['section_id' => 'initial_notes', 'section_name' => 'Incipit'],
            ['section_id' => 'total_productive_maintenance', 'section_name' => 'Mentenanță totală productivă - TPM'],
            ['section_id' => 'chapter_1', 'section_name' => 'Capitolul 1- Clean code'],
            ['section_id' => 'chapter_2', 'section_name' => 'Denumiri de proprietăți cu sens'],
            ['section_id' => 'chapter_3', 'section_name' => 'Funcții'],
            ['section_id' => 'chapter_4', 'section_name' => 'Comentarii'],
            ['section_id' => 'chapter_5', 'section_name' => 'Formatare'],
            ['section_id' => 'chapter_6', 'section_name' => 'Obiecte și structuri de date'],

            ]);
        return view('clean_code.index');
    }
}
