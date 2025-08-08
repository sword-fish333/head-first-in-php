<x-layout>
    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Service container"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-important_box>
                În php un <b>container de servicii</b> e un obiect care gestionează dependențele în o aplicație. Se
                mai numește și container de <b>injecție a dependențelor</b>.
                <x-list_title title="Scopul său:"/>
                <x-list>
                    <li>face bind în contextul global al aplicației la dependențe
                    </li>
                    <li>Rezolvă și injectează dependențele automat.</li>
                    <li>Ajută la centralizarea și gestionarea datelor.</li>
                </x-list>
                Service containerul rezolvă problema fundamentală în administrarea manuală a dependențelor claselor prin
                <b>centralizarea creării de obiecte</b> și eliminarea <b>dependențelor strânse(tight coupling)</b>
                dintre clase.
                Implementează <b>Principiul inversării dependențelor(Dependency Inversion Principle)</b> prin faptul că
                permite ca modulele superioare să depindă de abstracții(interfețe) și nu de implementări concrete. Asta
                face ca
                aplicațiile să fie mai flexibile și mai ușor de testat.
                <x-important_info class="mt-3">
                    Containerul de servicii în Laravel merge dincolo de implementarea sa de bază oferind <b>zero-configuration
                        resolution</b>, <b>binding
                        contextual</b> și funcționalități sofisticate precum service providers și tagging.
                </x-important_info>
            </x-important_box>
        </section>
        <section id="first_principles">
            <x-important_box>

                <x-subtitle title="Înțelegerea service container-elor din principiile fundamentale" class="mb-3"/>
                <p>Containerul de servicii (care mai este numit și IoC container sau DI Container) e un <b>design
                        pattern</b>. El gestionează crearea de obiecte, durata lor de viață și <b>rezolvarea
                        dependențelor(dependency
                        resolution)</b>.</p>
                <p>Acesta acționează ca un <b>registru centralizat</b> care controlează cum sunt create, configurate și
                    injectate dependențele în clase, eliminând necesitatea conectării manuale a dependențelor și
                    promovând o arhitectură în care dependențele dintre clase sunt slabe.</p>
                <x-list_title title="Problemele fundamentale pe care le rezolvă service container-ul:"/>
                <x-list>
                    <li>dependențele nu mai trebuiesc definite manual pentru fiecare clasă. Ele fiind definite la nivel
                        global.
                    </li>
                    <li>Se reduc substanțial dependențele strânse dintre clase.</li>
                    <li>Clasele sunt mai ușor de testat și au o structură mai clară. Controllerele nu mai sunt atât de
                        <b>"bloated"</b>.
                    </li>
                    <li>Prin <b>inversarea controlului creării dependențelor</b> responsabilitate fiind pasată la
                        container în loc de clase, aplicațiile devin mai ușor de întreținut, mai scalabile și mai ușor
                        de testat.
                    </li>
                </x-list>
            </x-important_box>
        </section>
        @include('service_container.partials.basic_example')
        @include('service_container.partials.loosely_coupled_example')

        <section id="laravel">
            <x-important_box>
                <x-subtitle title="Container de servicii în Laravel" class="mb-3"/>
                <x-important_info>
                    Service container-ul în Laravel este sistemul fundamental de <b>definire a dependențelor</b> care
                    gestionează crearea și conectarea obiectelor, servind ca concept esențial arhitectural ce permite
                    <b>loose coupling</b>, tastare eficientă și cod ușor de întreținut prin rezolvarea automată a
                    dependențelor.
                </x-important_info>
                <x-important_info class="mt-4">
                    Laravel face automat bind la dependențe în containerul de servicii astfel că dependențele unei clase
                    nu trebuie definite explicit la runtime. Ele sunt rezolvate automat prin service container. Asta se
                    numește <b>dependențe cu configurare zero(zero configuration dependency)</b> și ajută la păstrarea
                    unui profil "aerisit" al claselor care să nu fie <b>bloated</b>.
                </x-important_info>
            </x-important_box>
            <x-important_box>
                <x-subtitle title="Implementarea containerului de servicii în laravel și arhitectura sa" class="mb-3"/>
                <p>Service container-ul în Laravel servește ca sistemul nervos central al framework-ului, gestionând
                    dependențele claselor și efectuând injecția de dependențe automat pe parcursul ciclului de viață al
                    aplicației. Containerul de servicii permite „magia" Laravel-ui oferind <b>"zero-configuration
                        resolution"</b>, unde
                    astfel că dependențele claselor sunt definite prin <b>type-hint</b> și sunt rezolvate automat fără
                    configurație explicită de binding.
                </p>
                <p>Container-ul de servicii este o parte semnificativă a arhitecturii frameworkului și este integrat
                    prin <b>service
                        providers</b>, care inițializează toate dependențele definite de fiecare dată când un request
                    este
                    procesat de aplicație <b>bootstrapping</b>. Laravel oferă mai multe metode de "binding", fiecare
                    având un rol specific</p>
            </x-important_box>
        </section>
        <section id="dependency_injection_example">
            @include('service_container.partials.dependency_injection_examples')
        </section>
        <section id="advanced_implementation">
            <x-subtitle title="Funcționalități avansate ale container-ului și pattern-uri arhitecturale"
                        class="mt-10 mb-3"/>

            @include('service_container.partials.contextual_binding')
        </section>
        <section id="performance_optimisation">
            <x-important_box>
                <p>Optimizarea performanței necesită înțelegerea când să folosiți diferite tipuri de binding. Folosiți
                    singleton-uri pentru servicii costisitoare de creat, stare partajată sau servicii stateless care nu
                    beneficiază de instanțe multiple. Folosiți binding-uri tranziente pentru <b>state specific
                        requestului(request specific state)</b>, <b>lightweight objects</b>, sau
                    <b>value objects</b>. Totodata se poate folosi <b>dependențe pe bază de domeniu(scoped bindings)</b>
                    pentru atunci când
                    <b>request-lifecycle services</b> trebuie să fie folosite pe parcursul unui singur request și
                    eliberate
                    între requesturi multiple.
                </p>
                <p class="mt-5">Testarea strategiilor în containerul de servicii implică mocking. Exemplu:</p>
                <x-code_snippet>
                    // Mock services in tests
                    public function test_payment_processing()
                    {
                    $mock = $this->mock(PaymentGateway::class, function (MockInterface $mock) {
                    $mock->shouldReceive('charge')
                    ->once()
                    ->with(100)
                    ->andReturn(['status' => 'success']);
                    });

                    $response = $this->post('/charge', ['amount' => 100]);
                    $response->assertStatus(200);
                    }

                    // Instance binding for test doubles
                    public function setUp(): void
                    {
                    parent::setUp();

                    $this->instance(
                    ExternalApiService::class,
                    new FakeExternalApiService()
                    );
                    }
                </x-code_snippet>
            </x-important_box>

        </section>
    </div>

</x-layout>

