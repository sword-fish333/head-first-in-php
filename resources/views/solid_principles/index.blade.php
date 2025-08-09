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

                @include('solid_principles.partials.srp_code_example')
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
        <section id="open_close_principle" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Principiul Închis/Deschis(OCP)"/>
                <x-definition>
                    O entitate software (clasă, modul, funcție) ar trebui să fie deschisă la <b>extindere</b>, dar
                    închisă
                    la <b>modificare</b>.
                </x-definition>
                <x-line/>
                <p>În arhitectura software, principiul Open/Closed stabilește că structurile de cod existente trebuie să
                    poată primi funcționalități noi fără a fi nevoie să fie <b>modificate în interior</b>. Extinderea se
                    realizează prin mecanisme precum moștenire, compoziție, polimorfism sau introducerea de noi
                    clase/strategii, astfel încât comportamentul existent să rămână stabil și neafectat.</p>
                <x-example class="mt-5">
                    Imaginează-ți că ai un modul bine testat și gata pentru producție. Nu ar trebui să fie nevoie să îi
                    modifici codul sursă de fiecare dată când trebuie să adaugi <b>funcționalități noi</b>. În schimb,
                    ar
                    trebui să poți să îl extinzi. E ca și cum ai adăuga aplicații noi pe telefon fără să modifici
                    sistemul de operare în sine.
                </x-example>
                <x-list_title title="Scopul OCP:"/>
                <x-list>
                    <li>Să reducă riscul de a introduce erori în cod deja testat.</li>
                    <li>Să permită evoluția sistemului fără a crea instabilitate.</li>
                    <li>Să sprijine principiile <b>low coupling și high cohesion.</b></li>
                </x-list>
                @include('solid_principles.partials.ocp_code_example')
                <hr>
                <x-section_title class="mt-5" title="Cum implementează Laravel OCP:"/>
                <p>Laravel folosește pe scară largă principiul OCP prin sistemul său de furnizori de servicii, fluxul de
                    middleware și diversele clase manager.</p>
                <x-code>
                    // Laravel's Cache Manager is a perfect example
                    // You can add new cache drivers without modifying the core

                    // In a service provider
                    class CustomCacheServiceProvider extends ServiceProvider {
                    public function boot() {
                    Cache::extend('mongodb', function ($app) {
                    return Cache::repository(new MongoDBStore());
                    });
                    }
                    }

                    // Custom cache store implementation
                    class MongoDBStore implements Store {
                    public function get($key) {
                    // MongoDB specific implementation
                    }

                    public function put($key, $value, $seconds) {
                    // MongoDB specific implementation
                    }

                    // Other required methods...
                    }

                    // Now you can use it without modifying Laravel's core
                    Cache::store('mongodb')->put('key', 'value', 3600);
                </x-code>
            </x-info_box>
        </section>
    </div>

    <!-- PHP Playground Modal -->
    <x-php-playground-modal/>

</x-layout>
