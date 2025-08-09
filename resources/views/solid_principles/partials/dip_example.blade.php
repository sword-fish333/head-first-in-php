<p class="font-semibold mt-4">vanilla PHP - exemplu greșit:</p>
<x-code_snippet>
    // BAD: High-level class directly depends on low-level implementation

    // Low-level module (concrete implementation)
    class MySQLDatabase {
    public function connect() {
    return new PDO('mysql:host=localhost;dbname=app', 'root', '');
    }

    public function query($sql) {
    $pdo = $this->connect();
    return $pdo->query($sql);
    }
    }

    // High-level module directly depends on MySQLDatabase
    class UserService {
    private $database;

    public function __construct() {
    // Direct dependency on concrete implementation!
    $this->database = new MySQLDatabase();
    }

    public function getUsers() {
    // Tightly coupled to MySQL
    return $this->database->query("SELECT * FROM users")->fetchAll();
    }

    public function createUser($name, $email) {
    // What if we want to switch to PostgreSQL or MongoDB?
    // We'd have to modify this entire class!
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    return $this->database->query($sql);
    }
    }
</x-code_snippet>
<p class="font-semibold mt-4">Vanilla PHP - exemplu corect:</p>
<x-code_snippet>
    // GOOD: Both high-level and low-level depend on abstraction

    // Abstraction (interface)
    interface DatabaseInterface {
    public function find($table, $id);
    public function findAll($table);
    public function create($table, array $data);
    public function update($table, $id, array $data);
    public function delete($table, $id);
    }

    // Low-level module implements the interface
    class MySQLDatabase implements DatabaseInterface {
    private $pdo;

    public function __construct($host, $dbname, $user, $pass) {
    $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }

    public function find($table, $id) {
    $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll($table) {
    $stmt = $this->pdo->query("SELECT * FROM $table");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($table, array $data) {
    $columns = implode(',', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($data);
    }

    public function update($table, $id, array $data) {
    $setClause = [];
    foreach ($data as $key => $value) {
    $setClause[] = "$key = :$key";
    }
    $setClause = implode(', ', $setClause);

    $sql = "UPDATE $table SET $setClause WHERE id = :id";
    $data['id'] = $id;

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($data);
    }

    public function delete($table, $id) {
    $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = ?");
    return $stmt->execute([$id]);
    }
    }

    // Another low-level implementation
    class MongoDatabase implements DatabaseInterface {
    private $collection;

    public function __construct($connectionString, $database, $collection) {
    $client = new MongoDB\Client($connectionString);
    $this->collection = $client->$database->$collection;
    }

    public function find($table, $id) {
    return $this->collection->findOne(['_id' => $id]);
    }

    public function findAll($table) {
    return $this->collection->find()->toArray();
    }

    public function create($table, array $data) {
    return $this->collection->insertOne($data);
    }

    public function update($table, $id, array $data) {
    return $this->collection->updateOne(
    ['_id' => $id],
    ['$set' => $data]
    );
    }

    public function delete($table, $id) {
    return $this->collection->deleteOne(['_id' => $id]);
    }
    }

    // High-level module depends on abstraction
    class UserService {
    private DatabaseInterface $database;

    // Dependency injection - we inject the abstraction
    public function __construct(DatabaseInterface $database) {
    $this->database = $database;
    }

    public function getUsers() {
    return $this->database->findAll('users');
    }

    public function getUser($id) {
    return $this->database->find('users', $id);
    }

    public function createUser($name, $email) {
    return $this->database->create('users', [
    'name' => $name,
    'email' => $email
    ]);
    }

    public function updateUser($id, $data) {
    return $this->database->update('users', $id, $data);
    }
    }

    // Dependency Injection Container (simple version)
    class Container {
    private $bindings = [];

    public function bind($abstract, $concrete) {
    $this->bindings[$abstract] = $concrete;
    }

    public function resolve($abstract) {
    if (isset($this->bindings[$abstract])) {
    return $this->bindings[$abstract]();
    }
    throw new Exception("No binding found for {$abstract}");
    }
    }

    // Configuration and usage
    $container = new Container();

    // Bind the interface to a concrete implementation
    $container->bind(DatabaseInterface::class, function() {
    return new MySQLDatabase('localhost', 'app', 'root', 'password');
    });

    // Or switch to MongoDB without changing UserService!
    // $container->bind(DatabaseInterface::class, function() {
    // return new MongoDatabase('mongodb://localhost:27017', 'app', 'users');
    // });

    // Resolve dependencies
    $database = $container->resolve(DatabaseInterface::class);
    $userService = new UserService($database);

    // Use the service - it doesn't care about the database implementation
    $users = $userService->getUsers();
    $userService->createUser('John Doe', 'john@example.com');
</x-code_snippet>
