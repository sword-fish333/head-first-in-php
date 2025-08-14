<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Introducere în Design patterns"/>


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
                <p>Ele ajută developeri să creeze arhitectură software flexibilă. ușor de extins. În timp ce păstreză un
                    base code lizibil.</p>
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
        <section id="origins" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mt-4" title="Originile design patternurilor:"/>
                <p class="indent-5">Design patternurile în ingineria software își au originea în lucrarea revoluționară
                    a lui
                    Christopher Alexander din 1977, „A Pattern Language: Towns, Buildings, Construction". Această
                    lucrare de arhitectură a introdus conceptul revoluționar de captura soluții de proiectare
                    recurente sub formă de tipare reutilizabile — un cadru care avea să transforme ulterior practicile
                    de dezvoltare software la nivel mondial.</p>
                <p class="indent-5">Lucrarea lui Alexander a stabilit structura fundamentală a unui design pattern: o
                    formulare a problemei,
                    circumstanțele care creează problema, o soluție care funcționează în acele circumstanțe și legături
                    către tipare înrudite. Această filozofie arhitecturală a „limbajului tiparelor” — în care tiparele
                    formează un vocabular interconectat — a influențat direct pionierii timpurii ai informaticii, Ward
                    Cunningham și Kent Beck, care au început să experimenteze aplicarea acestor concepte în programare
                    în 1987.</p>
                <x-line/>
                <p class="indent-5">Tranziția formală către ingineria software s-a realizat odată cu publicarea
                    <b>„Design Patterns:
                        Elements of Reusable Object-Oriented Software"</b> pe 21 octombrie 1994. Scrisă de <b>„Gang of
                        four"
                        (Erich Gamma, Richard Helm, Ralph Johnson și John Vlissides)</b>, această lucrare fundamentală a
                    catalogat <b>23 de design patternuri</b> de proiectare clasice organizate în categorii creaționale,
                    structurale și
                    comportamentale. Cartea a devenit o piatră de temelie a proiectării orientate pe
                    obiecte, vânzându-se în peste 500.000 de exemplare și câștigând Premiul ACM SIGPLAN pentru Realizări
                    în Limbaje de Programare în 2005.</p>
                <p class="indent-5">Aceste modele de design software oferă un vocabular comun între developeri,
                    permițând comunicarea eficientă despre
                    decizii complexe de proiectare software. În loc să explice relații arhitecturale complicate,
                    echipele pot pur
                    și simplu să facă referire la tiparele „Factory" sau „Observer" pentru a transmite instantaneu
                    concepte sofisticate de proiectare. Acest limbaj comun a devenit esențial pentru dezvoltarea modernă
                    de software, în special în mediile colaborative.</p>
            </x-info_box>
        </section>
        <section id="php_integration" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mt-4" title="Design patternuri in PHP:"/>
                <p class="indent-5">Transformarea PHP de la un simplu limbaj procedural la un limbaj de programare
                    robust orientat
                    pe obiect a schimbat fundamental modul în care developerii implementează design pattern-uri.
                    Limbajul a apărut în 1994 ca "Personal Home Page Tools"—binare CGI de bază pentru
                    a urmări traficul pe pagini web. PHP nu avea absolut nicio capabilitate orientată pe obiect.</p>
                <p class="indent-5">Punctul de cotitură a venit cu <b>PHP 5.0 în 2004</b>, care a introdus programarea
                    orientată pe obiecte prin intermediul Zend Engine 2.0. Această versiune a
                    adus încapsularea corespunzătoare cu <span class="extra-info"
                                                               data-info='Access modifiers (modificatori de acces) sunt cuvinte cheie care
                                                               controlează vizibilitatea proprietăților și metodelor unei clase.
                                                               Ei sunt:
public - Accesibil de oriunde: din interiorul clasei, din clasele derivate și din exterior,
protected - Accesibil din clasa curentă și din clasele care o extind (moștenire),
private - Accesibil doar din interiorul clasei care l-a definit.'>modificatori de vizibilitate(access modifiers)</span>,
                    clase
                    abstracte, interfețe și
                    gestionarea excepțiilor(error handling). Această implementare de OOP corespunzătoare a reprezentat
                    fundația necesară pentru implementarea eficientă a design pattern-urilor. Anterior, developerii PHP
                    erau limitați la abordări procedurale care făceau
                    pattern-urile arhitecturale sofisticate aproape imposibile.</p>
                <p class="indent-5">Aceste modele de design software oferă un vocabular comun între developeri,
                    permițând comunicarea eficientă despre
                    decizii complexe de proiectare software. În loc să explice relații arhitecturale complicate,
                    echipele pot pur
                    și simplu să facă referire la tiparele „Factory" sau „Observer" pentru a transmite instantaneu
                    concepte sofisticate de proiectare. Acest limbaj comun a devenit esențial pentru dezvoltarea modernă
                    de software, în special în mediile colaborative.</p>
                <x-section_title class="mt-5"
                                 title="Caracteristicile moderne ale PHP 7 și 8 au permis implementarea de design pattern-uri mult mai eficientă:"/>

                <x-list>
                    <li><b>Namespace-urile (PHP 5.3)</b> au eliminat conflictele de denumire și au permis organizarea
                        eficientă și clară a
                        pattern-urilor.
                    </li>
                    <li><b>Trait-urile (PHP 5.4)</b> permit reutilizarea codului pe orizontală și rezolvarea
                        <span class="extra-info"
                              data-info='Cross-cutting concerns sunt aspecte
                              ale arhitecturii unui sistem software care afectează multiple module neînrudite între ele. Aceste module nu au nici o relație între ele și nu comunică direct.'>funcționalităților
                        transversale(cross-cutting concerns)</span>.
                    </li>
                    <li><b>Declarațiile de tip(Type declarations) (PHP 7.0)</b> impun contracte în pattern-urile
                        Strategy și Template Method.
                    </li>
                    <li>Atributele (PHP 8.0) permit injecția de dependențe bazată pe adnotări(annotation-driven
                        dependency injection) și implementări spefice de OOP.
                    </li>
                </x-list>
                <x-list_title title="Exemplu:"/>
                <x-code_snippet>
                    // PHP 8 constructor property promotion reduces boilerplate
                    class OrderService {
                    public function __construct(
                    private PaymentProcessor $paymentProcessor,
                    private EmailService $emailService,
                    private LoggerInterface $logger
                    ) {}

                    public function processOrder(Order $order): OrderResult {
                    try {
                    $result = $this->paymentProcessor->process($order->getPayment());
                    $this->emailService->sendConfirmation($order);
                    return new OrderResult(true, 'Order processed successfully');
                    } catch (PaymentException $e) {
                    $this->logger->error('Payment failed', ['error' => $e->getMessage()]);
                    return new OrderResult(false, $e->getMessage());
                    }
                    }
                    }
                </x-code_snippet>
                <x-line/>
                <p class="indent-5">Introducerea <b>Composerului și a autoloading-ului PSR-4</b> a îmbunătățit
                    semnificativ gestionarea
                    dependențelor, făcând
                    implementările de pattern-uri ușor de dat la alți developeri și de întreținut. Developerii PHP
                    moderni pot acum
                    implementa design pattern-uri sofisticate cu aceeași eleganță găsită în limbajele tradițional
                    orientate pe obiecte.</p>
            </x-info_box>
        </section>
        <section id="laravel_implementation">
            <x-info_box>

                <x-main_title class="mt-4" title="Implementarea sofisticată a design patternurilor din Laravel"/>
                <p class="indent-5">Laravel demonstrează aplicarea eficientă a design patternurilor, combinând modelele
                    tradiționale GoF cu
                    nevoile moderne de dezvoltare web. Arhitectura framework-ului arată cum design patternurile pot fi
                    adaptate și
                    extinse pentru dezvoltarea optimă a aplicațiilor web.</p>
                <x-line/>
                <p><b>Containerul de Servicii</b> din Laravel reprezintă o implementare sofisticată a
                    modului în care se realizează injecția de dependențe, rezolvând automat dependențele claselor prin
                    <span class="extra-info"
                          data-info='Reflecția în PHP este un mecanism nativ, încorporat care permite examinarea și manipularea de elemente ale codului (clase, metode, proprietăți, funcții) la runtime.'>reflecție</span>
                    în timp ce suportă diverse
                    strategii de relaționare între clase.</p>
                <x-list_title class="mt-1" title="Exemplu:"/>
                <x-code_snippet>
                    // Automatic dependency injection
                    class UserController extends Controller {
                    public function __construct(
                    protected UserService $userService,
                    protected EmailService $emailService
                    ) {}
                    }

                    // Custom binding in service provider
                    $this->app->bind(PaymentProcessor::class, StripePaymentProcessor::class);

                    // Singleton binding for expensive services
                    $this->app->singleton(CacheManager::class, function (Application $app) {
                    return new CacheManager($app->make('redis'));
                    });
                </x-code_snippet>
                <x-line/>
                <p><b>Facades</b> în Laravel oferă o abordare unică a implementării design patternului
                    facades. În loc să
                    încapsuleze logică complexă pur și simplu, Facades în Laravel acționează ca <span class="extra-info"
                                                                                                      data-info='Proxy-urile statice sunt obiecte care oferă o interfață statică pentru funcționalități "non-statice",
                                                                                                  permițând apelarea de metode ca și cum ar fi statice, când de fapt apelează metode ale instanței unei clase. Proxy-urile statice fac legătura dintre sintaxa statică convențională și designul flexibil din OOP.'>"proxy-uri statice(static proxies)"</span>
                    la
                    instanțe de servicii din <b>service container</b>, păstrând sintaxa asemănătoare metodelor statice
                    și
                    optimizând în același timp testabilitatea.</p>
                <x-list_title class="mt-1" title="Exemplu:"/>
                <x-code_snippet>
                    class Cache extends Facade {
                    protected static function getFacadeAccessor(): string {
                    return 'cache';
                    }
                    }

                    // Usage looks static but resolves to container instance
                    Cache::get('user.123'); // Fully mockable and testable
                </x-code_snippet>
                <x-line/>
                <p>Sistemul de evenimente din Laravel implementează design patternul <b>Observer</b> pentru
                    comunicarea decuplată între componentele aplicației.</p>
                <x-list_title class="mt-1" title="Exemplu:"/>
                <x-code_snippet>
                    // Event class
                    class UserRegistered {
                    use Dispatchable, SerializesModels;

                    public function __construct(public User $user) {}
                    }

                    // Multiple listeners can observe the same event
                    class SendWelcomeEmail {
                    public function handle(UserRegistered $event): void {
                    Mail::to($event->user)->send(new WelcomeEmail($event->user));
                    }
                    }

                    class UpdateAnalytics {
                    public function handle(UserRegistered $event): void {
                    Analytics::track('user_registered', $event->user->toArray());
                    }
                    }
                </x-code_snippet>
                <x-line/>
                <p>Modelele Factory din Laravel implementează design patternul Factory pentru generarea de
                    date de testare, integrându-se cu biblioteca Faker pentru date realiste.</p>
                <x-list_title class="mt-1" title="Exemplu:"/>
                <x-code_snippet>
                    class UserFactory extends Factory {
                    protected $model = User::class;

                    public function definition(): array {
                    return [
                    'name' => fake()->name(),
                    'email' => fake()->unique()->safeEmail(),
                    'password' => Hash::make('password'),
                    ];
                    }

                    public function admin(): Factory {
                    return $this->state(fn (array $attributes) => [
                    'is_admin' => true,
                    ]);
                    }
                    }

                    // Usage
                    User::factory()->count(50)->create();
                    User::factory()->admin()->create();
                </x-code_snippet>
            </x-info_box>
        </section>
        <section id="balancing_benefits_and_tradeoffs">
            <x-info_box>
                <x-main_title class="mt-4" title="Beneficii și compromisuri în utilizarea design patternurilor"/>
                <p class="indent-5 mt-3">Design patternurile oferă avantaje convingătoare, dar necesită aplicare
                    judicioasă. Beneficiile
                    principale includ îmbunătățirea reutilizabilității codului, mentenabilitatea sporită și colaborarea
                    mai bună în echipă prin vocabularul comun. Modelele promovează separarea preocupărilor, făcând
                    sistemele complexe mai ușor de gestionat și reducând cuplarea între componente.</p>
                <p class="indent-5">Beneficiile colaborative sunt deosebit de semnificative. Când developerii
                    menționează „Factory" sau
                    „Observer", echipele înțeleg imediat structura arhitecturală, reducând costurile de comunicare și
                    accelerând revizuirile de cod. Pattern-urile servesc ca documentație implicită, făcând deciziile
                    arhitecturale clare pentru viitorii developeri.</p>
                <p class="indent-5">Beneficiile colaborative sunt deosebit de semnificative. Când developerii
                    menționează „Factory" sau
                    „Observer", echipele înțeleg imediat structura arhitecturală, reducând costurile de comunicare și
                    accelerând revizuirile de cod. Pattern-urile servesc ca documentație implicită, făcând deciziile
                    arhitecturale clare pentru viitorii developeri.</p>
                <p class="indent-5">Cu toate acestea, pattern-urile vin cu compromisuri semnificative. <b>"Over-engineering"</b>
                    reprezintă cea mai
                    comună capcană. Adică aplicarea unor pattern-uri sofisticate la probleme simple creează complexitate
                    inutilă. Însuși Gang of Four au avertizat împotriva dogmatizării design pattern-urilor, subliniind
                    că
                    pattern-urile ar trebui să rezolve probleme reale, nu să demonstreze cunoștințe tehnice.</p>
                <x-list_title class="mt-3" title="Indicații esențiale pentru utilizarea design patternurilor:"/>
                <x-list>
                    <li>Design patternurile trebuie folosite când complixitatea justifică abstracția</li>
                    <li>Evitați design patterns pentru funcționalități simple și directe</li>
                    <li>Luați în considerare expertiza echipei - nu implementați modele pe care echipa nu le înțelege
                    </li>
                    <li>Prioritizează codul clar și ușor de întreținut în detrimentul purității modelului</li>
                    <li>Evaluarea implicațiilor de performanță în implementările de cod critice</li>
                </x-list>
                <x-important_info>
                    PHP-ul modern s-a orientat către injecția de dependențe în locul
                    Singleton-urilor, sisteme de evenimente în locul implementărilor directe de Observer și abstracții
                    furnizate de framework-uri în locul implementărilor customizate de pattern-uri."
                </x-important_info>
            </x-info_box>
        </section>
        <section id="design_patterns_in_mature_php">
            <x-info_box>
                <x-main_title class="mt-4" title="Importanța design patternuri-lor în maturizarea PHP-ului"/>
                <p class="indent-5">
                    Evoluția PHP-ului de la programare procedurală la programare orientată pe obiecte a creat atât
                    oportunități, cât și necesitate pentru adoptarea pattern-urilor de design. PHP-ul timpuriu nu avea
                    caracteristicile de limbaj necesare pentru pattern-uri arhitecturale sofisticate. Îi lipsea
                    încapsulare
                    corespunzătoare, era fără interfețe și cu mecanisme limitate de reutilizare a funcționalităților.
                </p>
                <p class="indent-5">
                    Pe măsură ce aplicațiile PHP au crescut în complexitate și au depășit simpla fază de scripturi
                    pentru website-uri către sisteme la nivel enterprise, dezvoltatorii au avut nevoie de abordări
                    arhitecturale mai bune. Introducerea OOP-ului corespunzător în PHP 5.0 a coincis cu cererea
                    crescândă pentru aplicații PHP ușor de întreținut și scalabile.
                </p>
                <p class="indent-5">Framework-urile PHP au condus adoptarea pattern-urilor demonstrând implementări
                    elegante. Symfony a
                    fost pionier în implementarea <b>dependency injection containers</b>, Laravel a popularizat
                    pattern-urile facade
                    expresive, iar Doctrine a introdus pattern-uri ORM sofisticate. Aceste framework-uri au
                    arătat developerilor PHP cum pattern-urile pot rezolva probleme din lumea reală menținând în
                    același timp un code base lizibil și "developer friendly".</p>
                <x-line/>

                <p class="indent-5">
                    <b>Ecosistemul Composer</b> a accelerat standardizarea pattern-urilor prin interfețele PSR (PHP
                    Standards
                    Recommendation). PSR-11 a standardizat interfețele containerelor, PSR-3 a definit interfețele de
                    logging, iar PSR-7 a stabilit interfețele pentru mesaje HTTP. Aceste standarde au permis
                    implementări de pattern-uri interoperabile între diferite framework-uri și biblioteci.
                </p>
                <p class="indent-5">
                    <span class="extra-info"
                          data-info='Sistemul de tipuri PHP definește modul în care variabilele stochează și interacționează cu diferite tipuri de date. Acesta a evoluat semnificativ de la tipuri de date implicite, dinamice, la tipuri de date statice explicite.'>Sistemul de tipuri(type system) al PHP-ului</span>
                    modern permite implementări de pattern-uri care anterior erau
                    imposibile sau nesigure. <b>Promovarea proprietăților în constructor(Constructor property
                        promotion)</b> reduce codul boilerplate,
                    atributele permit pattern-uri conduse de metadate, iar tipurile union oferă API-uri flexibile.
                    Aceste caracteristici fac implementarea pattern-urilor mai naturală și mai ușor de întreținut ca
                    niciodată.
                </p>
            </x-info_box>
        </section>
        <section id="conclusion">
            <x-info_box>
                <x-main_title class="mt-4" title="Concluzie"/>
                <p class="indent-5">Pattern-urile de design au evoluat de la perspectivele arhitecturale ale lui
                    Christopher Alexander în instrumente esențiale pentru dezvoltarea PHP modernă.
                    Implementările sofisticate de pattern-uri din Laravel demonstrează cum conceptele tradiționale de
                    inginerie software pot fi adaptate pentru aplicațiile web contemporane, oferind atât eleganță
                    structurală, cât și soluții practice.</p>
                <p class="indent-5">Transformarea PHP de la scripturi procedurale la un limbaj care suportă OOP robust a permis
                    această revoluție a pattern-urilor. Caracteristicile moderne ale limbajului precum <b>namespace-urile</b>,
                    <b>trait-urile</b>, <b>declarațiile de tip(type declarations)</b> și atributele oferă fundația
                    pentru implementări elegante de
                    pattern-uri care erau imposibile în versiunile timpurii de PHP.</p>
                <x-line/>
                <p class="indent-5">Înțelegerea pattern-urilor de design, originile lor, beneficiile, compromisurile și
                    aplicațiile adecvate—a devenit esențială pentru developerii PHP care vor să construiască aplicații ușor de
                    întreținut. Succesul Laravel-ului arată cum aplicarea atentă a pattern-urilor poate crea framework-uri
                    prietenoase pentru developeri care scalează de la website-uri simple la aplicații enterprise.</p>
                <p class="indent-5">
                    Perspectiva cheie este că pattern-urile sunt instrumente, nu scopuri în sine. Aplicate cu
                    discernământ
                    pentru a rezolva probleme reale, care îmbunătățesc calitatea codului și colaborarea în echipă.
                    Aplicate dogmatic sau prematur, ele creează complexitate inutilă. Cei mai buni dvevoperi PHP
                    înțeleg atât când să folosească pattern-uri, cât și când soluțiile mai simple sunt suficiente. Ei
                    valorifică bogatul ecosistem de pattern-uri pe care PHP-ul modern și framework-urile precum
                    Laravel îl oferă, menținând în același timp focusul pe cod practic și mentenabil care satisface nevoile clienților.
                </p>
            </x-info_box>
        </section>
    </div>

</x-layout>
