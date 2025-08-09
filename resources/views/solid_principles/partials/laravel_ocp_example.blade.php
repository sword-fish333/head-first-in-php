<x-section_title class="mt-5" title="Cum implementează Laravel OCP:"/>
<p>Laravel folosește pe scară largă principiul OCP în <b>service providers</b>, <b>middleware
        pipeline</b> și diversele clase de servicii.</p>
<x-code_snippet>
    // Laravel's Cache Manager is a perfect example
    // You can add new cache drivers without modifying the core

    // In a service provider
    class CustomCacheServiceProvider extends ServiceProvider {
    public function boot() {
    Cache::extend('mongodb', function ($app) {
    return Cache::repository(new MongoDBStore());
    });
    }
    }

    // Custom cache store implementation
    class MongoDBStore implements Store {
    public function get($key) {
    // MongoDB specific implementation
    }

    public function put($key, $value, $seconds) {
    // MongoDB specific implementation
    }

    // Other required methods...
    }

    // Now you can use it without modifying Laravel's core
    Cache::store('mongodb')->put('key', 'value', 3600);
</x-code_snippet>
