<?php

namespace App\Services;

readonly class ConcreteImplementation2 implements AbstractContractInterface
{
    public function __construct(private string $constructor_data)
    {
    }

    public function handle()
    {
        dd('ConcreteImplementation 2!',['constructor_data'=>$this->constructor_data]);
    }
}
