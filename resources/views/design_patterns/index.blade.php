<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Desigh patterns"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <x-definition>
                    Un design pattern (model de proiectare) este o soluție generală, testată și <b>reutilizabilă</b>
                    pentru o
                    problemă <b>recurentă</b> din dezvoltarea software.
                </x-definition>
                <x-line/>
                <p>Ele reprezintă cele mai bune practici evolute prin experiența colectivă a developerilor experți,
                    oferind un vocabular comun(nomenclatura) pentru discutarea soluțiilor arhitecturale și șabloane
                    dovedite pentru
                    rezolvarea provocărilor de proiectare.</p>
                <x-line/>
                <p>
                    În PHP, design pattern-urile contează fiindcă îndeamnă scrierea de <b>cod reutilizabil</b>, ușor de
                    întreținut, ușor de extins și nu în ultimul rând, comunicarea eficientă în cadrul echipei de
                    software
                    development.
                </p>
            </x-info_box>
        </section>
        <section id="benefits" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mt-4" title="Beneficii ale utilizării de design patterns:"/>
                <x-list>
                    <li><b>Reutilizare de cod:&nbsp;</b>permite folosirea acelorași soluții testate în mai multe locuri,
                        reducând duplicarea.
                    </li>
                    <li><b>Ușurință în mentenanță:&nbsp;</b>facilitează modificarea și extinderea codului fără efecte
                        secundare majore.
                    </li>
                    <li><b>Îmbunătățirea comunicării în echipă:&nbsp;</b>oferă un limbaj comun(<span class="extra-info"
                                                                                                     data-info='Este un set comun de termeni și expresii,
                                                                                                     definit și folosit consecvent de către developeri, analiști de business
                                                                                                     și experți de domeniu, pentru a descrie clar procesele, regulile și
                                                                                                     entitățile dintr-un anumit domeniu software.'>limbaj ubicuu</span>)
                        între dezvoltatori.
                    </li>
                    <li><b>Arhitectură flexibilă:&nbsp;</b>ajută la construirea unor sisteme care se pot adapta la
                        cerințe în schimbare.
                    </li>

                    <li><b>Cod lizibil și testabil:&nbsp;</b>separă responsabilitățile, facilitând scrierea de teste
                        unitare și funcționale.
                    </li>
                    <li><b>Respectarea bunelor practici din OOP:&nbsp;</b>aplică principii precum SOLID, DRY, KISS,
                        favorizând
                        calitatea codului.
                    </li>
                    <li><b>Compatibilitate cu framework-urile moderne:&nbsp;</b>Laravel, Symfony și alte framework-uri
                        PHP sunt construite în jurul pattern-urilor.
                    </li>
                    <li><b>Decizii arhitecturale informate:&nbsp;</b>cunoașterea pattern-urilor ajută la alegerea celei
                        mai bune structuri pentru un sistem.
                    </li>

                    <li><b>Reducerea timpului de dezvoltare:&nbsp;</b>evită reinventarea roții prin folosirea de soluții
                        consacrate.
                    </li>
                    <li><b>Scalabilitate:&nbsp;</b>facilitează dezvoltarea de aplicații care pot crește fără probleme
                        majore de cod.
                    </li>

                </x-list>
            </x-info_box>
        </section>
        <x-main_title class="mt-4" title="Deisgn patternuri creaționale: soluții pentru instanțierea obiectelor"/>

        <section id="factory_design_patter" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-3" title="Factory design pattern"/>
                <x-definition>
                    Metoda Factory este un pattern de design creațional care rezolvă problema creării obiectelor
                    fără a specifica clasele lor concrete.(code to a contract not a concrete implementation)
                </x-definition>
                <x-line/>
                <p>
                    Design patternul factory susține <b>principiul Deschis/Închis</b> prin faptul că permite ca noi
                    tipuri de
                    obiecte
                    să fie adăugate fără modificarea codului actual de creare de obiecte.
                </p>
                <x-line/>
                <x-important_info>
                    Metoda Factory definește o metodă care ar trebui folosită pentru crearea obiectelor în locul
                    apelului direct al constructorului (operatorul <b>new</b>). Subclasele pot suprascrie această metodă
                    pentru
                    a schimba clasa obiectelor care vor fi create.
                </x-important_info>
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
        <section id="singleton_design_pattern" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-3" title="Singleton Pattern"/>
                <x-definition>
                    Singleton este un pattern de design creațional care îți permite să te asiguri că o clasă are o
                    singură instanță, oferind în același timp un punct de acces global la această instanță.
                </x-definition>
                <x-line/>
                <x-important_info>
                    Este considerat anti-pattern în php ul modern fiindcă este dificl de testat.
                </x-important_info>
                <x-section_title class="my-3" title="Singleton rezolvă 2 probleme în același timp:"/>
                <p>Asigură-te că o clasă are o singură instanță. De ce ar vrea cineva să controleze câte instanțe are o
                    clasă? Cel mai des întâlnit motiv pentru aceasta este controlarea accesului la o resursă partajată —
                    de exemplu, o bază de date sau un fișier</p>
                <x-code_snippet class="mt-5">
                </x-code_snippet>
            </x-info_box>
        </section>
    </div>

    <!-- PHP Playground Modal -->
    <x-php-playground-modal/>

</x-layout>
