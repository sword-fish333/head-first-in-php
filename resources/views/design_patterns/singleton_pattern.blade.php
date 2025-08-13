<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Factory pattern"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <x-definition>
                    Singleton este un pattern de <b>design creațional</b> care se bazează pe o
                    singură instanță a unei clase pe tot parcursul unui lifecycle request, oferind în același timp un <b>punct de acces global</b> la această instanță.
                </x-definition>
                <x-line/>
                <x-important_info class="mb-3">
                    Este considerat anti-pattern în php ul modern fiindcă este dificl de testat.
                </x-important_info>
                <p><b>Singleton rezolvă 2 probleme în același timp:&nbsp;</b>Asigură o clasă are o singură instanță. De ce ar vrea cineva să controleze câte instanțe are o
                    clasă? Cel mai des întâlnit motiv pentru aceasta este controlarea accesului la o resursă partajată —
                    de exemplu, o bază de date sau un fișier.</p>
            </x-info_box>
        </section>
        <section id="example" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mt-4" title="Exemplu de implementare a patternului factory:"/>
                <x-code_snippet class="mt-5">
                    class ConfigManager {
                    private static ?self $instance = null;
                    private array $config = [];

                    final private function __construct() {
                    $this->config = $this->loadConfiguration();
                    }

                    public static function getInstance(): self {
                    if (self::$instance === null) {
                    self::$instance = new self();
                    }
                    return self::$instance;
                    }

                    public function get(string $key): mixed {
                    return $this->config[$key] ?? null;
                    }
                    }
                </x-code_snippet>
            </x-info_box>
        </section>
    </div>
</x-layout>
