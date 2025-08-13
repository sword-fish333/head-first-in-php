<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Factory pattern"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <x-definition>
                    Metoda Factory este un <b>pattern de design creațional</b> care rezolvă problema creării obiectelor
                    fără a specifica clasele lor concrete. (code to a contract not a concrete implementation)
                </x-definition>
                <x-line/>
                <p>
                    Design patternul factory susține <span class="font-bold underline cursor-pointer"
                                                           onclick="navigateToSection('solid-principles','open_close_principle')">principiul Deschis/Închis&nbsp;<span
                            class="material-symbols-outlined">
ios_share
</span></span> prin faptul că permite ca noi
                    tipuri de
                    obiecte
                    să fie <b>adăugate</b> fără a <b>modifica</b> codul actual de creare de obiecte.
                </p>
                <x-line/>
                <x-important_info>
                    Metoda Factory definește o metodă care ar trebui folosită pentru crearea obiectelor în locul
                    apelului direct al constructorului (operatorul <b>new</b>). Subclasele pot suprascrie această metodă
                    pentru
                    a schimba clasa obiectelor care vor fi create.
                </x-important_info>

            </x-info_box>
        </section>
        <section id="example" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mt-4" title="Exemplu de implementare a patternului factory:"/>
                <x-code_snippet class="mt-5">
                    interface PaymentProcessor {
                    public function process(float $amount): bool;
                    }

                    class CreditCardProcessor implements PaymentProcessor {
                    public function process(float $amount): bool {
                    return $this->chargeCreditCard($amount);
                    }
                    }

                    class PayPalProcessor implements PaymentProcessor {
                    public function process(float $amount): bool {
                    return $this->chargePayPal($amount);
                    }
                    }

                    class PaymentFactory {
                    public static function create(string $type): PaymentProcessor {
                    return match($type) {
                    'credit_card' => new CreditCardProcessor(),
                    'paypal' => new PayPalProcessor(),
                    'bank_transfer' => new BankTransferProcessor(),
                    default => throw new InvalidArgumentException("Unknown payment type: {$type}")
                    };
                    }
                    }
                </x-code_snippet>
            </x-info_box>
        </section>
    </div>
</x-layout>
