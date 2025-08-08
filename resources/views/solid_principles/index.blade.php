<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="SOLID"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <p><b>SOLID</b> este un acronim care reprezintă cinci reguli fundamentale ale programării orientate pe
                    obiect
                    care ajută la crearea unui software mai ușor de întreținut, mai flexibil și mai scalabil. Aceste
                    principii au fost introduse de Robert C. Martin (Uncle Bob) și au devenit fundamentale pentru o
                    arhitectură software bună. Sunt principii care ajută la evitarea erorilor
                    comune în designul software, previne <b>"spaghetti code"</b> și ajută la dezvoltarea unui software
                    robust și scalabil.</p>
                <x-definition class="mt-5">
                    Principiile SOLID reprezintă un set de cinci reguli fundamentale de <b>software orientat pe
                        obiect</b>,
                    formulate de Robert C. Martin (Uncle Bob), care au ca scop îmbunătățirea lizibilității,
                    mentenabilității, scalabilității și robusteței arhitecturii software. Ele definesc bune practici
                    pentru structurarea claselor și interacțiunilor dintre componente, astfel încât sistemele software
                    să fie ușor de înțeles, extins și modificat, cu impact minim asupra <b>codului existent(base
                        code-ului)</b>.
                </x-definition>
            </x-info_box>
        </section>
        <x-main_title class="mt-4" title="Cele 5 concepte fundamentale:"/>

        <section id="single_responsibility" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Principiul responsabilității unice(SRP)"/>
                <x-definition>
                    O clasă ar trebui să aibă un singur motiv de a se schimba. Cu alte cuvinte, fiecare clasă ar trebui
                    să se ocupe exact de o singură responsabilitate funcțională.
                </x-definition>
                <x-line/>
                <p>Gândește-te la asta ca la o bucătărie de restaurant – nu ai vrea ca aceeași persoană să fie și
                    bucătar, și chelner, și contabil în același timp. Fiecare rol are responsabilități specifice, ceea
                    ce face ca întreaga operațiune să fie mai eficientă și mai ușor de gestionat.</p>

                <p class="font-semibold mt-4">Vanilla PHP - exemplu greșit:</p>
                <x-code_snippet>
                    // BAD: This class has multiple responsibilities
                    class User {
                    private $name;
                    private $email;
                    private $db;

                    public function __construct($name, $email) {
                    $this->name = $name;
                    $this->email = $email;
                    $this->db = new PDO('mysql:host=localhost;dbname=app', 'root', '');
                    }

                    // Responsibility 1: Business logic
                    public function isValidEmail() {
                    return filter_var($this->email, FILTER_VALIDATE_EMAIL);
                    }

                    // Responsibility 2: Database operations
                    public function save() {
                    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([$this->name, $this->email]);
                    }

                    // Responsibility 3: Email sending
                    public function sendWelcomeEmail() {
                    $subject = "Welcome!";
                    $message = "Hello {$this->name}, welcome to our platform!";
                    mail($this->email, $subject, $message);
                    }

                    // Responsibility 4: Logging
                    public function logActivity($action) {
                    $log = date('Y-m-d H:i:s') . " - User {$this->name} performed: {$action}\n";
                    file_put_contents('activity.log', $log, FILE_APPEND);
                    }
                    }
                </x-code_snippet>
                <p class="font-semibold mt-5">Vanilla PHP - exemplu corect:</p>
                <x-code_snippet>
                    // GOOD: Each class has a single responsibility

                    // User entity - only holds user data and business rules
                    class User {
                    private $name;
                    private $email;

                    public function __construct($name, $email) {
                    $this->name = $name;
                    $this->email = $email;
                    }

                    public function getName() {
                    return $this->name;
                    }

                    public function getEmail() {
                    return $this->email;
                    }

                    // Business logic related to the user entity
                    public function isValidEmail() {
                    return filter_var($this->email, FILTER_VALIDATE_EMAIL);
                    }
                    }

                    // Repository - handles database operations
                    class UserRepository {
                    private $db;

                    public function __construct(PDO $db) {
                    $this->db = $db;
                    }

                    public function save(User $user) {
                    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([$user->getName(), $user->getEmail()]);
                    }

                    public function findById($id) {
                    // Retrieval logic here
                    }
                    }

                    // Email service - handles email sending
                    class EmailService {
                    public function sendWelcomeEmail(User $user) {
                    $subject = "Welcome!";
                    $message = "Hello {$user->getName()}, welcome to our platform!";
                    mail($user->getEmail(), $subject, $message);
                    }
                    }

                    // Logger - handles logging
                    class ActivityLogger {
                    private $logFile;

                    public function __construct($logFile = 'activity.log') {
                    $this->logFile = $logFile;
                    }

                    public function log(User $user, $action) {
                    $log = date('Y-m-d H:i:s') . " - User {$user->getName()} performed: {$action}\n";
                    file_put_contents($this->logFile, $log, FILE_APPEND);
                    }
                    }

                    // Usage - notice how clean and organized this is
                    $db = new PDO('mysql:host=localhost;dbname=app', 'root', '');
                    $user = new User('John Doe', 'john@example.com');

                    if ($user->isValidEmail()) {
                    $repository = new UserRepository($db);
                    $repository->save($user);

                    $emailService = new EmailService();
                    $emailService->sendWelcomeEmail($user);

                    $logger = new ActivityLogger();
                    $logger->log($user, 'registration');
                    }
                </x-code_snippet>
                <x-section_title class="mt-5" title="Cum implementează Laravel SRP:"/>
                <p>Laravel implementează în mod elegant principiul SRP prin arhitectura sa. Fiecare componentă are un
                    scop clar și bine definit:</p>
                <x-list>
                    <li><b>Modelele:</b>&nbsp;Se ocupă de reprezentarea datelor și logica de business(data
                        representation and business logic)
                    </li>
                    <li><b>Controllerele:</b>&nbsp;Gestionează cererile și răspunsurile HTTP</li>
                    <li><b>Repositories:</b>&nbsp;Se ocupă de logica de acces la date (atunci când sunt utilizate)</li>
                    <li><b>Serviciile(Service classes):</b>&nbsp;Conțin logică de business complexă</li>
                    <li><b>Serviciile(Service classes):</b>&nbsp;Conțin logică de business complexă</li>
                    <li><b>Requests(Obiectul request):</b>&nbsp;Se ocupă de validare</li>
                    <li><b>Middleware-urile:</b>&nbsp;Gestionează <b>preocupări transversale(cross-cutting concerns)</b>,
                        cum ar fi autentificarea
                    </li>
                    <li><b>Job-urile:</b>&nbsp;Se ocupă de procesarea în fundal(background processes)</li>
                </x-list>
            </x-info_box>
        </section>
    </div>

</x-layout>
