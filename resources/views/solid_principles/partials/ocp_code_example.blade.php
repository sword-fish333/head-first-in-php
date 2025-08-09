<p class="font-semibold mt-4">vanilla PHP - exemplu greșit:</p>
<x-code_snippet>
    // BAD: We need to modify the class every time we add a new payment method
    class PaymentProcessor {
    public function processPayment($amount, $type) {
    if ($type === 'credit_card') {
    // Credit card processing logic
    echo "Processing $amount via Credit Card\n";
    // API calls to credit card processor
    return true;
    } elseif ($type === 'paypal') {
    // PayPal processing logic
    echo "Processing $amount via PayPal\n";
    // API calls to PayPal
    return true;
    } elseif ($type === 'stripe') {
    // Stripe processing logic
    echo "Processing $amount via Stripe\n";
    // API calls to Stripe
    return true;
    }
    // Every new payment method requires modifying this method!

    throw new Exception("Unknown payment type");
    }
    }
</x-code_snippet>
<p class="font-semibold mt-4">Vanilla PHP - exemplu corect:</p>
<x-code_snippet>
    // GOOD: We can add new payment methods without modifying existing code

    // Define a contract that all payment methods must follow
    interface PaymentMethodInterface {
    public function process($amount);
    public function getName();
    }

    // Each payment method implements the interface
    class CreditCardPayment implements PaymentMethodInterface {
    public function process($amount) {
    echo "Processing $amount via Credit Card\n";
    // Credit card specific logic
    return true;
    }

    public function getName() {
    return 'credit_card';
    }
    }

    class PayPalPayment implements PaymentMethodInterface {
    public function process($amount) {
    echo "Processing $amount via PayPal\n";
    // PayPal specific logic
    return true;
    }

    public function getName() {
    return 'paypal';
    }
    }

    class StripePayment implements PaymentMethodInterface {
    public function process($amount) {
    echo "Processing $amount via Stripe\n";
    // Stripe specific logic
    return true;
    }

    public function getName() {
    return 'stripe';
    }
    }

    // The processor is now closed for modification but open for extension
    class PaymentProcessor {
    private $paymentMethods = [];

    // Register payment methods dynamically
    public function registerPaymentMethod(PaymentMethodInterface $method) {
    $this->paymentMethods[$method->getName()] = $method;
    }

    public function processPayment($amount, $type) {
    if (!isset($this->paymentMethods[$type])) {
    throw new Exception("Unknown payment type: $type");
    }

    return $this->paymentMethods[$type]->process($amount);
    }
    }

    // Usage - adding new payment methods without modifying PaymentProcessor
    $processor = new PaymentProcessor();
    $processor->registerPaymentMethod(new CreditCardPayment());
    $processor->registerPaymentMethod(new PayPalPayment());
    $processor->registerPaymentMethod(new StripePayment());

    // Later, we can add new payment methods without changing existing code
    class BitcoinPayment implements PaymentMethodInterface {
    public function process($amount) {
    echo "Processing $amount via Bitcoin\n";
    return true;
    }

    public function getName() {
    return 'bitcoin';
    }
    }

    $processor->registerPaymentMethod(new BitcoinPayment());
    $processor->processPayment(100, 'bitcoin'); // Works without modifying PaymentProcessor!
</x-code_snippet>
