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
                    utilizarea resurselor și overhead-ul de conectare. Fiecare <x-extra_info
                        info="Cadru de date al protocolului este pachetul elementar de date trimis prin conexiunea TCP, conform specificației AMQP. Fiecare frame conține informații pentru un anumit canal (marcat prin channel ID) și poate transporta comenzi, headere sau bucăți de mesaj."
                        concept="cadru de date al protocolului"/>poartă un ID de canal pentru rutare, permițând izolarea completă între canale în timp ce se
                    partajează resursele de conexiune. Hosturile virtuale asigură separare logică cu
                    stocare de mesaje independente și tabele de rutare.
                </p>
            </x-info_box>
        </section>
    </div>
</x-layout>
