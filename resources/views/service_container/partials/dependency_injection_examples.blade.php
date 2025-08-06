<section id="basic_service_container_example">
    <x-subtitle title="Exemplu de definire a dependențelor în constructorul claselor:"
                class="mt-5"/>
    <x-code_snippet>
        class OrderController extends Controller
        {
        public function __construct(
        protected PaymentService $paymentService,
        protected InventoryService $inventoryService,
        protected NotificationService $notificationService
        ) {}

        public function process(Request $request)
        {
        // Dependencies automatically injected by container
        $payment = $this->paymentService->charge($request->amount);
        $this->inventoryService->reserve($request->items);
        $this->notificationService->sendConfirmation($request->user);
        }
        }
    </x-code_snippet>
    <x-subtitle title="Definirea dependențelor la nivel de metodă:"
                class="mt-5"/>
    <x-code_snippet>
        class ReportController extends Controller
        {
        // Method injection - dependencies resolved automatically
        public function generate(ReportService $reportService, Request $request)
        {
        $data = $request->validated();
        return $reportService->generateReport($data);
        }

        // Route model binding works with method injection
        public function show(User $user, UserService $userService)
        {
        return $userService->getProfile($user);
        }
        }
    </x-code_snippet>
    <x-subtitle title="Binding-ul de interfețe permite implementarea pattern-ului Strategy:"
                class="mt-5"/>
    <x-code_snippet>
        // Interface definition
        interface PaymentGatewayInterface
        {
        public function charge(float $amount): bool;
        }

        // Service Provider binding
        public function register()
        {
        $this->app->bind(PaymentGatewayInterface::class, function ($app) {
        return match(config('payment.default')) {
        'stripe' => new StripeGateway(config('services.stripe')),
        'paypal' => new PayPalGateway(config('services.paypal')),
        default => throw new InvalidArgumentException('Unknown payment gateway')
        };
        });
        }

        // Usage - automatically resolves to configured implementation
        class PaymentController extends Controller
        {
        public function __construct(
        private PaymentGatewayInterface $gateway
        ) {}
        }
    </x-code_snippet>
</section>
