<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="RabbitMq"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Ce este RabbitMq?"/>

                <p class="indent-5">
                    RabbitMQ este un <b>broker de mesaje</b> open-source (middleware de mesaje) care inițial
                    implementa protocolul standard <b>AMQP (Advanced Message Queuing Protocol)</b> și, ulterior, a fost
                    extins
                    prin pluginuri pentru a suporta și protocoale precum MQTT sau STOMP. Serverul RabbitMQ este scris în
                    Erlang și utilizează platforma
                    <x-extra_info info="Open Telecom Platform (OTP) este un set de biblioteci, middlewares și tooluri realizate în limbajul de programare Erlang,
                        conceput inițial de
                        Ericsson pentru dezvoltarea de sisteme distribuite,
                        rezistente la erori și cu disponibilitate ridicată. Include
                        componente pentru gestionarea proceselor, comunicației între noduri
                        și actualizări fără oprire. Este folosit pe scară largă în
                        telecomunicații, mesagerie și servicii backend critice." concept="Open Telecom Platform (OTP)"/>
                    pentru
                    clustering și toleranță la erori, iar clienții pot fi conectați din aproape orice limbaj de
                    programare(este angnostic față de implementare).
                    În esență, RabbitMQ oferă un canal de comunicare rapid, fiabil și flexibil între componente
                    distribuite ale unei aplicații –
                    ideal pentru arhitecturi bazate pe microservicii, comunicare în timp real și sisteme scalabile.
                </p>
                <p class="indent-5">
                    RabbitMQ se poziționează drept cel mai versatil <b>broker de mesaje</b> pentru aplicații PHP,
                    oferind
                    fiabilitate de nivel enterprise cu capabilități sofisticate de rutare care depășesc alternativele în
                    arhitecturi complexe de microservicii.
                </p>
            </x-info_box>
        </section>
        <section id="history" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Istoric și context"/>

                <p class="indent-5">
                    RabbitMQ a apărut în contextul standardizării protocolului <b>AMQP</b>. În februarie 2007,
                    companiile
                    LShift și CohesiveFT (Rabbit Technologies Ltd.) au lansat oficial RabbitMQ ca “implementare
                    open-source completă a protocolului AMQP”
                    rabbitmq.com. AMQP a fost conceput pentru comunicare
                    <x-extra_info
                        info="mesajele să nu se piardă și să fie livrate o singură dată sau exact cum a fost configurat."
                        concept="fiabilă"/>
                    și
                    <x-extra_info
                        info="un client AMQP scris în Java să poată comunica cu un broker AMQP și cu un consumator scris în PHP, Python etc."
                        concept="interoperabilă"/>
                    între aplicații, iar
                    RabbitMQ a devenit rapid unul din cei mai primele implementări populare. După lansare, RabbitMQ a
                    fost achiziționat în
                    aprilie 2010 de SpringSource (divizie VMware) și apoi integrat în Pivotal Software în 2013. În 2019,
                    Pivotal a fost reintegrat în VMware, iar RabbitMQ a devenit parte din portofoliul VMware Tanzu. De
                    atunci,
                    proiectul este întreținut de comunitate și de echipa VMware, iar în jurul său s-a
                    dezvoltat un ecosistem robust de pluginuri și instrumente de suport.
                </p>
            </x-info_box>
        </section>
        <section id="internal_architecture" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4" title="Arhitectură internă"/>

                <p class="indent-5">
                    Arhitectura bazată pe Erlang a RabbitMQ utilizează procese "lightweight" pentru fiecare conexiune,
                    canal și
                    coadă, permițând procesarea în paralel(concurență) masivă, păstrând în același timp independența
                    canalelor.
                </p>
                <p class="indent-5">Secvența
                    de inițializare a brokerului de mesaje implică pași de bootare care configurează autentificarea,
                    validarea de politici și sistemele de plugin-uri în faze. Înțelegerea acestui aspect ajută la
                    depanarea
                    problemelor de conexiune și la optimizarea timpilor de pornire.</p>
                <p class="indent-5">
                    Arhitectura fluxului de mesaje funcționează prin procese specializate: procesele de citire
                    gestionează
                    <x-extra_info info="Pachetele logice AMQP citite din fluxul TCP de către procesele de citire."
                                  concept="pachetele de date TCP primite"/>
                    , procesele de canal gestionează comenzile AMQP, procesele de scriere
                    trimit răspunsuri, iar procesele individuale din coadă gestionează stocarea și livrarea mesajelor.
                    Acest design permite
                    <x-extra_info
                        info="folosirea mai multor procese, fiecare pe propriul nucleu de CPU, pentru a procesa în paralel sarcinile."
                        concept="scalarea orizontală"/>
                    prin distribuirea cozilor între nucleele CPU, deoarece
                    fiecare coadă rulează într-un singur proces.
                </p>
                <p class="indent-5">Gestionarea memoriei urmează un sistem sofisticat de paginare cu clasificări ale
                    mesajelor ALPHA,
                    BETA, GAMMA, DELTA bazate pe locația memoriei. Mesajele trec prin cozi interne Q1-Q4 cu
                    caracteristici de stocare diferite, în timp ce depozitul de mesaje oferă stocare partajată
                    cheie-valoare pentru corpuri de mesaje mari.
                    <x-extra_info
                        info="Watermarkul de 60% este pragul de memorie RAM folosit de RabbitMQ pentru a declanșa mecanisme de protecție. Când memoria ocupată ajunge la 60% din totalul disponibil, brokerul activează flow control — adică încetinește sau oprește temporar producătorii și începe să mute mesaje pe disc pentru a elibera RAM."
                        concept="Watermarkul implicit de memorie de 60%"/>
                    declanșează controlul fluxului, paginând mesajelor pe disc la încărcătură mare.
                </p>
                <p class="indent-5">
                    <x-extra_info
                        info="Protocol AMQP 0-9-1 este versiunea specifică a protocolului AMQP folosită de RabbitMQ, care definește exact regulile și formatele pentru schimbul de mesaje (cum sunt structurate, rutate, confirmate și transmise) între client și broker."
                        concept="Protocolul AMQP 0-9-1"/>
                    multiplexează canale multiple prin conexiuni TCP individuale, reducând
                    utilizarea resurselor și overhead-ul de conectare. Fiecare
                    <x-extra_info
                        info="Cadru de date al protocolului este pachetul elementar de date trimis prin conexiunea TCP, conform specificației AMQP. Fiecare frame conține informații pentru un anumit canal (marcat prin channel ID) și poate transporta comenzi, headere sau bucăți de mesaj."
                        concept="cadru de date al protocolului"/>
                    poartă un ID de canal pentru rutare, permițând izolarea completă între canale în timp ce se
                    partajează resursele de conexiune. Hosturile virtuale asigură separare logică cu
                    stocare de mesaje independente și tabele de rutare.
                </p>
            </x-info_box>
        </section>
        <section id="exchange_types" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4"
                              title="Tipurile de exchange-uri determină complexitatea de rutare și caracteristicile de performanță"/>
                <x-list>
                    <li><b>Exchange-uri directe</b>&nbsp;oferă performanță de căutare hash O(1) folosind potriviri
                        exacte ale cheii
                        de rutare, făcându-le optime pentru scenarii cu randament înalt de date. Schimbul implicit
                        special fără nume leagă automat toate cozile cu cheia de rutare egală cu numele cozii,
                        simplificând modelele de rutare de bază ale mesajelor.
                    </li>
                    <li><b>Topic exchanges</b> permit potriviri sofisticate de tipar cu wildcard-uri, dar implică
                        costuri de
                        performanță semnificative. Wildcard-ul * se potrivește exact cu un singur cuvânt, iar # se
                        potrivește cu zero sau mai multe cuvinte. Wildcard-urile de tip hash au un impact deosebit
                        asupra performanței, de aceea sistemele de producție ar trebui să minimizeze utilizarea lor și
                        să proiecteze cu atenție ierarhiile cheilor de rutare.
                    </li>
                    <li><b>Fanout exchanges</b> oferă cea mai mare performanță prin difuzarea mesajelor către toate
                        cozile
                        legate, indiferent de cheia de rutare. Acest lucru le face ideale pentru broadcast de
                        evenimente, actualizări live și sisteme de notificare unde toți cei înregistrați trebuie să
                        primească
                        mesaje identice.
                    </li>
                    <li><b>Headers exchanges</b> oferă cea mai mare flexibilitate în rutare prin potrivirea header-elor
                        mesajelor
                        folosind argumentele x-match. Acestea suportă modul „all” (toate header-elor trebuie să se
                        potrivească) și modul „any” (este suficientă potrivirea unui singur antet), plus tipuri de date
                        complexe dincolo de simple șiruri. Totuși, ele sunt cea mai costisitoare opțiune de rutare din
                        cauza consumului de resurse produs de comparația header-elor.
                    </li>
                    <li>Legăturile între <b>exchange-uri</b>(exchange-to-exchange bindings) permit topologii de rutare
                        complexe și tipare de procesare a mesajelor în mai multe etape. RabbitMQ previne buclele de
                        rutare infinite prin detecția ciclurilor, dar permite arhitecturi sofisticate de flux al
                        mesajelor.
                    </li>
                </x-list>
            </x-info_box>
        </section>
        <section id="exchange_types" class="scroll-mt-20">
            <x-info_box>
                <x-main_title class="mb-4"
                              title="Implementări specifice în PHP"/>
                <p class="indent-5">Managementul de conexiuni reprezintă cel mai critic aspect al implementărilor RabbitMQ în PHP.
                    Pattern-ul
                    <x-extra_info info="O long-lived connection este o conexiune care rămâne deschisă pentru o perioadă lungă de timp și este reutilizată pentru multiple operații.
Ea evită costul repetat al deschiderii și închiderii conexiunilor, îmbunătățind performanța și stabilitatea aplicație"
                                  concept="long-lived connection"/>
                    combinat cu multiplexarea de canale oferă performanță optimă, însă
                    modelul
                    <x-extra_info info="Modelul request–response în PHP înseamnă că fiecare script rulează doar ca răspuns la o cerere HTTP.
La finalizarea răspunsului, procesul se încheie, iar resursele (inclusiv conexiunile) sunt închise."
                                  concept="request–response"/>
                    al PHP complică această abordare. În sistemele de producție se recomandă
                    implementarea de
                    <x-extra_info info="Connection pooling în PHP înseamnă menținerea unui set de conexiuni deschise reutilizabile între procese, în loc să se creeze o conexiune nouă pentru fiecare request.
Astfel se reduce overhead-ul de creare/închidere a conexiunilor și se îmbunătățește performanța sistemului."
                                  concept="connection pooling"/>
                    sau utilizarea AMQProxy pentru a agrega conexiunile între
                    procesele PHP.
                </p>
                <x-line/>
                <p class="indent-5">
                    Implementările de producer necesită configurarea de persistentă de mesaje împreună cu cozi și exchange-uri care persistă pentru a asigura garanții de fiabilitate. Publisher confirms validează
                    acceptarea mesajelor de către broker, iar exception handling-ul corect gestionează eșecurile de
                    conexiune și problemele de rețea.
                </p>
            </x-info_box>
        </section>
    </div>
</x-layout>
