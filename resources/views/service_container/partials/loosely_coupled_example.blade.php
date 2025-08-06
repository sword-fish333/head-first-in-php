<section id="loosely_coupled_example" class="mt-10">
    <x-subtitle title="Exemplu de implementare cu dependențe strânse:"
                class="mt-5 mb-2"/>
    <x-code_snippet>
        // BEFORE: Tightly coupled, hard to test
        class UserController
        {
        public function register(array $userData): void
        {
        $logger = new FileLogger('/var/log/app.log');
        $validator = new UserValidator();
        $database = new MySQLConnection('localhost', 'root', 'password');

        // Direct instantiation creates tight coupling
        $logger->log('User registration started');

        if (!$validator->validate($userData)) {
        throw new InvalidArgumentException('Invalid user data');
        }

        $database->insert('users', $userData);
        }
        }
    </x-code_snippet>
    <x-subtitle title="Exemplu de implementare cu dependențe slabe, bazându-se pe containerul de servicii:"
                class="mt-5 mb-2"/>
    <x-code_snippet>
        // AFTER: Using service container
        class UserController
        {
        public function __construct(
        private LoggerInterface $logger,
        private ValidatorInterface $validator,
        private DatabaseInterface $database
        ) {}

        public function register(array $userData): void
        {
        $this->logger->log('User registration started');

        if (!$this->validator->validate($userData)) {
        throw new InvalidArgumentException('Invalid user data');
        }

        $this->database->insert('users', $userData);
        }
        }
    </x-code_snippet>
    <x-important_box>
        Transformarea arată cum injecția de dependențe elimină <b>dependențele strânse(tight coupling)</b> permițând în același timp testarea
        ușoară prin injectarea de mock-uri. Asta se realizează pe baza principiului
        inversării dependențelor, unde modulele de nivel înalt depind de abstracții mai degrabă decât de implementări
        concrete - <b>Code to a contract not a concrete implementation.</b>
    </x-important_box>
</section>
