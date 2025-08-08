<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OopFoundationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\DatabaseController;

Route::get('/', [HomeController::class, 'index']);
Route::get('oop-foundation', [OopFoundationController::class, 'index']);
Route::get('deep-dive-procedural', [OopFoundationController::class, 'deepDiveProcedural']);
Route::get('oop-example', [OopFoundationController::class, 'oopExample']);
Route::get('service-container', [LaravelController::class, 'serviceContainer']);
Route::get('acid', [DatabaseController::class, 'acid']);
Route::get('cap-theorem',[DatabaseController::class,'capTheorem']);
Route::get('concrete-implementation-1', function (\App\Services\AbstractContractInterface $binding) {
    dd($binding->handle());
});
Route::get('concrete-implementation-2', function (\App\Services\AbstractContractInterface $binding) {

    dd($binding->handle());
});
