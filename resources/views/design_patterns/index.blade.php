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
                <p class="font-semibold mt-4">Exemplu:</p>

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
                <p>Introducerea <b>Composer și a autoloading-ului PSR-4</b> a îmbunătățit semnificativ gestionarea
                    dependențelor, făcând
                    implementările de pattern-uri ușor de împărtășit și de întreținut. Developerii PHP moderni pot acum
                    implementa design pattern-uri sofisticate cu aceeași eleganță găsită în limbajele tradițional
                    orientate pe obiecte.</p>
            </x-info_box>
        </section>
    </div>

</x-layout>
