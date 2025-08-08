<?php

namespace App\Providers;

use App\Services\AbstractContractInterface;
use App\Services\ConcreteImplementation1;
use App\Services\ConcreteImplementation2;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AbstractContractInterface::class, function () {
            return match(request()->path()) {
                'concrete-implementation-1' => new ConcreteImplementation1(),
                'concrete-implementation-2' => new ConcreteImplementation2('some_data'),
                default => throw new InvalidArgumentException('Unknown implementation')
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
