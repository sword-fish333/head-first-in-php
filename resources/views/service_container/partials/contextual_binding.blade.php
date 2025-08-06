<p>Binding-ul contextual(Contextual binding) permite
    diferitelor clase să primească implementări diferite ale aceleiași interfețe bazate pe nevoile lor
    specifice:</p>
<x-code_snippet>
    // Different controllers need different filesystem implementations
    $this->app->when(PhotoController::class)
    ->needs(Filesystem::class)
    ->give(function () {
    return Storage::disk('local');
    });

    $this->app->when([VideoController::class, UploadController::class])
    ->needs(Filesystem::class)
    ->give(function () {
    return Storage::disk('s3');
    });

    // Contextual primitive value injection
    $this->app->when(ReportController::class)
    ->needs('$cacheTime')
    ->give(3600);

    // Configuration-based contextual binding
    $this->app->when(EmailService::class)
    ->needs('$apiKey')
    ->giveConfig('services.mailgun.key');
</x-code_snippet>
<p class="mt-5"><b>Container tagging</b> permite integrarea de plugin-uri și utilizarea în serie a serviciilor, fiind
    deosebit de util pentru sisteme care necesită implementări multiple ale unor interfețe similare:</p>
<x-code_snippet>
    // Register and tag multiple services
    $this->app->bind(CpuReport::class, function () { /* ... */ });
    $this->app->bind(MemoryReport::class, function () { /* ... */ });
    $this->app->tag([CpuReport::class, MemoryReport::class], 'reports');

    // Resolve all tagged services
    $this->app->bind(ReportAnalyzer::class, function (Application $app) {
    return new ReportAnalyzer($app->tagged('reports'));
    });

    // Real-world example: OCR plugin system
    $this->app->tag([
    GoogleVision::class,
    AmazonTextract::class,
    Tesseract::class
    ], 'ocr-engines');

    $this->app->bind(DocumentProcessor::class, function ($app) {
    return new DocumentProcessor(...$app->tagged('ocr-engines'));
    });
</x-code_snippet>
<x-important_info class="mt-3">
    <h4 class="text-xl">Ce este Container Tagging?</h4>
    <p>Tagging-ul container-ului permite gruparea mai multor binding-uri de servicii sub un tag comun, apoi
        utilizarea acestora ca o colecție.</p>
    <p class="mt-5">Exemplu:</p>
    <x-code_snippet>
        // Register services normally
        $this->app->bind(EmailNotifier::class);
        $this->app->bind(SmsNotifier::class);
        $this->app->bind(SlackNotifier::class);

        // Tag them together
        $this->app->tag([
        EmailNotifier::class,
        SmsNotifier::class,
        SlackNotifier::class
        ], 'notifiers');

        // Resolve all tagged services at once
        $notifiers = $this->app->tagged('notifiers');
        // Returns an array containing instances of all three classes
    </x-code_snippet>
</x-important_info>
<p class="mt-5">Declanșarea de eventuri în container și extinderea lor oferă hook-uri puternice pentru <b>cross-cutting concerns</b>
    și <b>service decoration</b>:</p>
<x-code_snippet>
    // Listen to service resolution
    $this->app->resolving(UserService::class, function (UserService $service, Application $app) {
    $service->setLogger($app->make(LoggerInterface::class));
    });

    // Listen to all resolutions for cross-cutting concerns
    $this->app->resolving(function (mixed $object, Application $app) {
    if ($object instanceof AuditableInterface) {
    $object->setAuditor($app[AuditService::class]);
    }
    });

    // Extend existing services with decorators
    $this->app->extend(PaymentGateway::class, function ($gateway, $app) {
    return new MonitoredPaymentGateway(
    $gateway,
    $app[MetricsCollector::class]
    );
    });
</x-code_snippet>
