<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OopFoundationController;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class,'index']);
Route::get('oop-foundation',[OopFoundationController::class,'index']);
Route::get('deep-dive-procedural',[OopFoundationController::class,'deepDiveProcedural']);
Route::get('oop-example',[OopFoundationController::class,'oopExample']);
