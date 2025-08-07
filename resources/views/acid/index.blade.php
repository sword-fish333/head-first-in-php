<x-layout>
    <x-progress_bar/>

    <x-sidebar :sections="$sections"/>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Principiile ACID"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-important_box>
                <p class="indent-5">Principiile ACID sunt fundamentale pentru înțelegerea modului în care bazele de date
                    mențin integritatea datelor.</p>
                <hr class="my-2">
                <p class="indent-5">ACID reprezintă o promisiune de a păstra intrările din o bază de date în <b>siguranță</b>
                    și <b>consistente</b>, chiar și atunci când apar erori. ACID este un acronim și fiecare literă
                    reprezintă o garanție care protejează integritatea datele în un mod diferit.</p>
            </x-important_box>
        </section>
        <section id="atomicity">
            <x-important_box>
                <x-subtitle title='Atomicitate - Principiul "totul sau nimic"' class="mb-3"/>
                <p class="indent-5">Atomicitatea asigură că o tranzacție este tratată ca o singură unitate indivizibilă.
                    Imaginează-ți că
                    transferi bani între conturi bancare. Trebuie să deduci dintr-un cont și să adaugi în altul. Dacă
                    sistemul se blochează după deducere dar înainte de adăugare, atomicitatea asigură că întreaga
                    tranzacție este <b>anulată(rolls back)</b>, prevenind dispariția banilor în neant.</p>
                <x-example class="mt-3">În termeni practici, când construiești o platformă de e-commerce în PHP,
                    atomicitatea înseamnă că
                    atunci când un client plasează o comandă, fie toate aceste operațiuni reușesc împreună, fie toate
                    eșuează împreună: crearea înregistrării comenzii, actualizarea stocului, procesarea plății și
                    trimiterea email-ului de confirmare. Dacă plata eșuează, nu vrei să ai o comandă creată cu stoc
                    redus dar fără plată colectată.
                </x-example>
            </x-important_box>
        </section>
        <section id="consistency">
            <x-important_box>
                <x-subtitle title='Consistența - „Regulile nu sunt niciodată încălcate"' class="mb-3"/>
                <p class="indent-5">Consistența asigură că baza ta de date trece de la o stare validă la altă stare
                    validă. Datele trebuie să satisfacă întotdeauna toate regulile, constrângerile și <span
                        class="extra-info"
                        data-info="Un trigger este un tip special de regulă care se execută automat când se întâmplă anumite modificări în baza de date.">trigger-ele(triggers)</span>
                    definite. De exemplu, dacă ai o regulă că balanța nu pot fi niciodată negativă,
                    consistența asigură că această regulă nu este niciodată încălcată, <b>nici măcar temporar</b> în
                    timpul
                    unei tranzacții.
                </p>
                <x-example class="mt-3">În o aplicație de social media unde ai o tabelă de postări și o
                    tabelă
                    de comentarii. Consistența asigură că fiecare comentariu trebuie să facă referire la o postare
                    validă.
                    Nu poți avea comentarii <b>orfane</b> care indică către postări inexistente, chiar dacă mai mulți
                    utilizatori șterg postări și adaugă comentarii simultan. Asta se poate realizare prin chei de
                    indexare(foreign keys), de la commenturi la postări.
                </x-example>
            </x-important_box>
        </section>
        <section id="isolation">
            <x-important_box>
                <x-subtitle title='Izolarea - Principiul „Spațiului de lucru privat"' class="mb-3"/>
                <p class="indent-5">Izolarea asigură că tranzacțiile concurente nu interferează unele cu altele. Fiecare
                    tranzacție operează ca și cum ar fi singura care rulează pe baza de date. Acest lucru este ca și cum
                    ai avea mai multe persoane editând părți diferite ale unui document simultan fără să vadă
                    modificările celorlalți până când acestea sunt complete.
                </p>
                <x-example class="mt-3">Într-un sistem de rezervări, dacă doi utilizatori încearcă să rezerve ultimul
                    loc disponibil simultan, izolarea asigură că doar unul reușește. Fără izolare adecvată, ambii ar
                    putea citi că un loc este disponibil, ambii ar putea încerca să-l rezerve, și ai ajunge cu o
                    situație de supra-rezervare.
                </x-example>
            </x-important_box>
        </section>
        <section id="durability">
            <x-important_box>
                <x-subtitle title='Durabilitatea - Principiul „Înregistrării permanente"' class="mb-3"/>
                <p class="indent-5">Odată ce o tranzacție este realizată <b>(committed)</b>, ea rămâne astfel, chiar dacă
                    sistemul are o eroare fatală imediat după. Modificările sunt permanente, ele persistă și supraviețuiesc oricăror
                    defecțiuni ulterioare. Acest lucru este realizat de obicei prin <span
                        class="extra-info"
                        data-info='Un log de tranzacții este un fișier unde baza de date înregistrează fiecare modificare pe care urmează să o facă — înainte să o facă efectiv(principiul Write-Ahead Logging - WAL). Este un fel de "black box", o plasă de salvare.'>loguri de tranzacții (transaction logs)</span> care pot
                    recrea tranzacțiile confirmate chiar și după o eroare gravă a bazei de date.</p>
            </x-important_box>
        </section>

    </div>

</x-layout>
