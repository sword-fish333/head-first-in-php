<x-section_title class="mt-5" title="Cum implementează Laravel DIP:"/>
<p>Întreaga arhitectură a Laravel-ului e construită în jurul la <b>DIP</b> prin Service Container-ul său.</p>
<x-code_snippet>
    // Laravel's Service Container is a powerful DIP implementation

    // In a Service Provider
    class AppServiceProvider extends ServiceProvider {
    public function register() {
    // Bind interface to implementation
    $this->app->bind(
    PaymentGatewayInterface::class,
    StripePaymentGateway::class
    );

    // Or bind with configuration
    $this->app->singleton(DatabaseInterface::class, function ($app) {
    $driver = config('database.default');

    return match($driver) {
    'mysql' => new MySQLDatabase(config('database.connections.mysql')),
    'pgsql' => new PostgreSQLDatabase(config('database.connections.pgsql')),
    'mongodb' => new MongoDatabase(config('database.connections.mongodb')),
    default => throw new Exception("Unknown database driver: {$driver}")
    };
    });
    }
    }

    // Controller depends on abstraction
    class PaymentController extends Controller {
    public function __construct(
    private PaymentGatewayInterface $paymentGateway
    ) {}

    public function process(Request $request) {
    // Controller doesn't know or care about the specific implementation
    $result = $this->paymentGateway->charge(
    $request->input('amount'),
    $request->input('token')
    );

    return response()->json(['success' => $result]);
    }
    }

    // Laravel automatically injects the correct implementation
    // based on the Service Container bindings
</x-code_snippet>
