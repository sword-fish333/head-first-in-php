<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OopFoundationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\SOLIDController;
use App\Http\Controllers\CodeExecutionController;
use App\Http\Controllers\DesignPatternsController;
use App\Http\Controllers\CreationalDesignPatternsController;
use App\Http\Controllers\ServicesAndLibrariesController;
use App\Http\Middleware\LocalizationMiddleware;
Route::group(['middleware'=>LocalizationMiddleware::class],function (){
Route::get('/', [HomeController::class, 'index']);
    Route::get('change-lang', [HomeController::class, 'changeLang'])->name('change-lang');

Route::get('oop-foundation', [OopFoundationController::class, 'index']);
Route::get('deep-dive-procedural', [OopFoundationController::class, 'deepDiveProcedural']);
Route::get('oop-example', [OopFoundationController::class, 'oopExample']);
Route::get('service-container', [LaravelController::class, 'serviceContainer']);
Route::get('acid', [DatabaseController::class, 'acid']);
Route::get('cap-theorem',[DatabaseController::class,'capTheorem']);
Route::get('solid-principles',[SOLIDController::class,'index']);
Route::get('design-patterns',[DesignPatternsController::class,'index']);
Route::get('factory-pattern',[CreationalDesignPatternsController::class,'factoryPattern']);
Route::get('singleton-pattern',[CreationalDesignPatternsController::class,'singletonPattern']);
Route::get('rabbitmq',[ServicesAndLibrariesController::class,'rabbitMq']);
});
Route::get('concrete-implementation-1', function (\App\Services\AbstractContractInterface $binding) {
    dd($binding->handle());
});
Route::get('concrete-implementation-2', function (\App\Services\AbstractContractInterface $binding) {

    dd($binding->handle());
});

// PHP Playground API endpoint
Route::post('api/execute-code', [CodeExecutionController::class, 'execute']);

Route::get('functional-programming',function (){

    $arr=[
      1=>[
          'nested_array'=>[
              'nested_key'=>[
                  'value'=>3
              ]
          ]
      ]
    ];
    $arr2=&$arr;
    $arr2['nested_array']['nested_key']['value']=4;
    dd($arr2,$arr);
   $a=10;
   $b=function()use($a){
       return $a*10;
   };
    $counter = 0;
    $increment = function() use (&$counter) {
        return ++$counter;
    };
    $increment();

    $typed=fn(int $x):int=>$x*2;
   dd($typed(2));
});
Route::get('functional-programming-js',function (){
  return view('functional_programming_js');
});
