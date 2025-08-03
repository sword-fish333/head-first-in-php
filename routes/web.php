<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OopFoundationController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('oop-foundation',[OopFoundationController::class,'index']);
Route::get('deep-dive-procedural',[OopFoundationController::class,'deepDiveProcedural']);
Route::get('oop-example',[OopFoundationController::class,'oopExample']);
