<?php

namespace App\Services;

class ConcreteImplementation1 implements AbstractContractInterface
{
    public function handle()
    {
        dd('ConcreteImplementation1');
    }
}
