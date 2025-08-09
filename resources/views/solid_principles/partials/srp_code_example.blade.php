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
