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
                    <b>robust și scalabil</b>.</p>
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
                <x-important_info class="mt-5">
                    Evită clase <span class="extra-info"
                                      data-info='Un "God object" este un obiect din cod care concentrează prea multe responsabilități și cunoștințe despre sistem, încălcând
                                      principiul Single Responsibility din SOLID. În PHP (și alte limbaje OOP), acesta apare când o singură clasă gestionează logică de domeniu,
                                      acces la date, validări, prezentare și alte funcții, devenind un punct central greu de întreținut și testat.'>„God Object”</span>
                    care fac prea multe lucruri, ceea ce duce la cod greu de testat și
                    întreținut.
                </x-important_info>
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
                <x-main_title class="mb-4" link_section="open_close_principle" title="Principiul Închis/Deschis(OCP)"/>
                <x-definition>
                    Entitățile software(clasă, modul, funcție) trebuie să fie deschise pentru <b>extindere</b>, dar
                    închise pentru <b>modificare</b>.
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
                    <li>Să adăugi funcționalități noi fără să modifici codul existent.</li>
                    <li>Să reducă riscul de a introduce erori în cod deja testat.</li>
                    <li>Să permită evoluția sistemului fără a crea instabilitate.</li>
                    <li>Să sprijine principiile <b>low coupling și high cohesion.</b></li>
                </x-list>
                @include('solid_principles.partials.ocp_code_example')
                <hr>
                @include('solid_principles.partials.laravel_ocp_example')
            </x-info_box>
        </section>
        <section id="liskov_substitution" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Principiul de substituție Liskov (LSP)"/>
                <x-definition>
                    Principiul de substituție Liskov afirmă că orice instanță a unei <b>clase derivate</b> trebuie să
                    poată
                    înlocui <b>instanța clasei sale de bază</b> fără a altera corectitudinea, comportamentul așteptat
                    sau
                    funcționalitatea programului.
                </x-definition>
                <x-line/>
                <x-important_info>
                    Cu alte cuvinte, dacă <b>S</b> este o <b>subclasă</b> a lui <b>T</b>, atunci obiectele de tip
                    <b>T</b> din
                    cod ar trebui să
                    poată fi înlocuite cu obiecte de tip <b>S</b> fără ca rezultatul să fie incorect, fără erori
                    neașteptate și
                    fără a încălca logica stabilită de tipul părinte.
                </x-important_info>
                <x-line/>
                <x-important_info>
                    Clasele derivate trebuie să păstreze contractul clasei părinte.
                </x-important_info>

                <x-example class="mt-5">
                    Gândește-te în felul următor: dacă ai o telecomandă care funcționează cu orice televizor, atunci
                    orice marcă specifică de televizor (Samsung, LG, Sony) ar trebui să funcționeze cu acea telecomandă
                    fără surprize. Un televizor Samsung nu ar trebui să îți ceară dintr-o dată să apeși butonul de volum
                    pentru a schimba canalele.
                </x-example>
                <x-example class="mt-5">
                    Dacă ai o clasă <b>Pasăre</b> cu metoda <b>zboară()</b>, orice subclasă (de exemplu Rândunică)
                    trebuie să poată fi
                    folosită în locul lui Pasăre fără ca programul să se comporte incorect. O subclasă Pinguin care nu
                    poate zbura ar încălca LSP dacă este folosită acolo unde se așteaptă ca toate păsările să zboare.
                </x-example>
                <x-list_title title="Scopul LSP:"/>
                <x-list>
                    <li><b>Respectarea contractului:</b>&nbsp;<b>clasele derivate</b> trebuie să îndeplinească
                        așteptările definite de clasa părinte.
                    </li>
                    <li><b>Menținerea comportamentului:</b>&nbsp;metodele suprascrise nu trebuie să modifice sensul sau
                        efectul așteptat al operațiilor.
                    </li>
                    <li><b>Evita efecte secundare neașteptate:</b>&nbsp;comportamentul derivatelor nu trebuie să rupă
                        logica codului client.
                    </li>
                    <li><b>Compatibilitate tipologică:</b>&nbsp;instanțele derivate trebuie să poată fi folosite în
                        locul celor părinte fără adaptări suplimentare.
                    </li>
                    <li><b>Îmbunătățirea extensibilității:</b>&nbsp;facilitează adăugarea de noi tipuri fără a afecta
                        codul existent.
                    </li>
                    <li><b>Reducerea riscului de erori:</b>&nbsp; previne comportamentele incorecte atunci când se
                        substituie tipurile.
                    </li>

                </x-list>
                @include('solid_principles.partials.lsp_example')
                <hr>
                @include('solid_principles.partials.laravel_lsp_example')
            </x-info_box>
        </section>
        <section id="interface_segregation" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Principiul separării interfețelor"/>
                <x-definition>
                    Clienții nu ar trebui să fie forțați să <b>depindă</b> de interfețe pe care nu le folosesc. Este mai
                    bine
                    să ai multe <b>interfețe specifice</b> decât o singură <b>interfață cu scop general</b>.
                </x-definition>
                <x-line/>
                <x-important_info>
                    Nici un client nu
                    trebuie forțat să implementeze <b>metode</b> pe care nu le folosește.
                </x-important_info>
                <x-example class="mt-5">
                    Gândește-te la asta ca la un cuțit elvețian versus unelte specializate. Deși un cuțit elvețian este
                    versatil, nu ai vrea să porți unul care are 100 de unelte când ai nevoie doar de o lamă și o
                    șurubelniță. În schimb, ai prefera unelte mai mici, focalizate.
                </x-example>
                <x-list_title title="Scopul ISP:"/>
                <x-list>
                    <li><b>Separarea responsabilităților: </b> fiecare interfață trebuie să definească un set restrâns
                        și coerent de funcționalități. Evită <span class="extra-info"
                                                                   data-info='O interfață „gremlin” (termen neoficial) este o interfață supradimensionată,
                                               cu prea multe metode, care forțează clasele implementatoare să
                                               definească funcționalități inutile sau necorelate, încălcând Interface Segregation Principle din SOLID.'>interfețe „gremline”</span>
                        cu prea multe metode.
                    </li>
                    <li><b>Reducerea dependențelor inutile: </b>clasele nu trebuie să fie obligate să implementeze
                        metode de care nu au nevoie.
                    </li>
                    <li><b>Creșterea clarității și lizibilității codului: </b> interfețele mici sunt mai ușor de înțeles
                        și întreținut.
                    </li>
                    <li><b>Facilitarea testării unitare: </b> interfețele specifice reduc complexitatea mock-urilor și
                        stub-urilor.
                    </li>
                    <li><b>Îmbunătățirea flexibilității arhitecturii: </b> modificările într-o interfață nu afectează
                        inutil implementările care nu sunt relevante.
                    </li>
                    <li><b>Susținerea principiului Single Responsibility: </b> fiecare interfață acoperă o singură zonă
                        funcțională.
                    </li>
                </x-list>
                @include('solid_principles.partials.isp_example')
                <hr>
                @include('solid_principles.partials.laravel_isp_example')
                <x-section_title class="mt-5" title="Cum implementează Laravel ISP:"/>
                <x-list>
                    <li>În loc să creeze o singură interfață mare("gremlin") pentru toate operațiile pe date, Laravel
                        folosește interfețe mici, fiecare având un scop clar.
                    </li>
                    <li>Creează mai multe interfețe mici (Repository, Caching, Logging) în loc de una „all-in-one”.</li>
                </x-list>

            </x-info_box>
        </section>
        <section id="dependency_inversion" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Principiul Dependenței inverse(DIP)"/>
                <x-definition>
                    Modulele de nivel <b>arhitectural superior</b> nu trebuie să depindă de cele de nivel inferior.
                    Ambele
                    trebuie să depindă de abstracții care, la rândul lor nu trebuie să depindă de detalii
                    (implementări concrete), detaliile trebuie să depindă de abstracții.
                </x-definition>
                <x-line/>
                <x-example>
                    Gândește-te ca la prizele electrice din casa ta. Laptopul tău (nivel înalt) nu se conectează direct
                    în sistemul electric al casei tale (nivel scăzut). În schimb, ambele depind de o interfață standard
                    - specificația prizei și a ștecherului. Poți conecta orice dispozitiv compatibil în orice priză
                    compatibilă.
                </x-example>
                <x-list_title title="Scopul DIP:"/>
                <x-list>
                    <li>Reduci coupling-ul și crești flexibilitatea.
                    </li>
                    <li><b>Reducerea dependențelor inutile: </b>clasele nu trebuie să fie obligate să implementeze
                        metode de care nu au nevoie.
                    </li>
                    <li><b>Creșterea clarității și lizibilității codului: </b> interfețele mici sunt mai ușor de înțeles
                        și întreținut.
                    </li>
                    <li><b>Facilitarea testării unitare: </b> interfețele specifice reduc complexitatea mock-urilor și
                        stub-urilor.
                    </li>
                    <li><b>Îmbunătățirea flexibilității arhitecturii: </b> modificările într-o interfață nu afectează
                        inutil implementările care nu sunt relevante.
                    </li>
                    <li><b>Susținerea principiului Single Responsibility: </b> fiecare interfață acoperă o singură zonă
                        funcțională.
                    </li>
                </x-list>
                @include('solid_principles.partials.dip_example')
                <hr>
                @include('solid_principles.partials.laravel_isp_example')
            </x-info_box>
        </section>
    </div>

    <!-- PHP Playground Modal -->
    <x-php-playground-modal/>

</x-layout>
