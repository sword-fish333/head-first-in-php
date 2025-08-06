<section id="basic_service_container_example">
    <x-subtitle title="Un exemplu de container de servicii în PHP realizat de la zero:"
                class="mt-5 mb-2"/>
    <x-code_snippet>
        class Container
        {
        private array $bindings = [];
        private array $instances = [];

        public function bind(string $id, callable $factory): void
        {
        $this->bindings[$id] = $factory;
        }

        public function singleton(string $id, callable $factory): void
        {
        $this->bind($id, function ($container) use ($factory) {
        static $instance = null;
        if ($instance === null) {
        $instance = $factory($container);
        }
        return $instance;
        });
        }

        public function get(string $id)
        {
        if (!isset($this->bindings[$id])) {
        return $this->build($id); // Auto-wiring
        }

        $factory = $this->bindings[$id];
        return $factory($this);
        }

        public function build(string $className)
        {
        $reflector = new ReflectionClass($className);

        if (!$reflector->isInstantiable()) {
        throw new Exception("Class $className is not instantiable");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
        return new $className;
        }

        $parameters = $constructor->getParameters();
        $dependencies = array_map(function (ReflectionParameter $param) {
        $type = $param->getType();

        if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
        return $this->get($type->getName());
        }

        throw new Exception("Cannot resolve primitive dependency");
        }, $parameters);

        return $reflector->newInstanceArgs($dependencies);
        }
        }

    </x-code_snippet>
    <x-important_box>
        Această implementare demonstrează <b>înregistrarea automată a dependențelor(automatic resolution)</b> folosind API-ul Reflection din PHP pentru a
        inspecta constructorii claselor și a rezolva recursiv dependențele. Container-ul menține
        array-uri separate pentru binding-uri (factories) și instanțe (singleton-uri), prezentând pattern-urile
        fundamentale folosite în container-ele de producție
    </x-important_box>
</section>
