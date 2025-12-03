<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" class="mb-3" title="Clean code"/>
        <x-page_subtitle subtitle="A Handbook of Agile
Software Craftsmanship"/>
        <x-author class="mt-2" author="Robert C. Martin(Uncle Bob)"/>
        <section id="initial_notes" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Incipit' class="mb-3"/>
                <p class="text-lg">Citate faine:</p>
                <x-quote author="Robert C Martin">
                    Să scrii "clean code" este ceea ce trebuie să faci pentru a te numi profesionist.<br>
                    Nu este nici o scuză rezonabilă pentru a da altceva mai puțin decât ce ai tu mai bun.
                </x-quote>
                <x-line/>
                <x-quote author="Ludwig mies van der Rohe">
                    Dumnezeu este în detalii
                </x-quote>
                <x-quote>
                    Cel care este credincios în cele mici este credincios și în cele mari.
                </x-quote>
                <x-quote>
                    Stejari măreți cresc din ghinde mici.
                </x-quote>
                <x-line/>
                <x-quote author="Robert C Martin">
                    Ar trebui să numești o variabilă cu aceiași grijă cu care numești un nou născut.
                </x-quote>
                <br>
                <x-list>
                    <li>Onestitatea în lucruri mărunte nu este un lucru mărunt
                    </li>
                    <li>În jurul anului 1951, o abordare a calității numită Întreținere Productivă Totală (TPM-Total
                        Productive Maintenance) a apărut pe
                        scena japoneză. Accentul acesteia se pune pe întreținere mai degrabă decât pe producție. Unul
                        dintre
                        pilonii principali ai TPM este setul așa-numitelor principii 5S.
                    </li>
                    <li>
                        Din păcate, de obicei nu considerăm astfel de preocupări drept pietre de temelie ale artei
                        programării. Abandonăm codul devreme, nu pentru că este gata, ci pentru că sistemul nostru de
                        valori se concentrează mai mult pe aspectul exterior decât pe substanța a ceea ce livrăm.
                    </li>
                </x-list>
            </x-info_box>
        </section>
        <section id="total_productive_maintenance" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Mentenanță totală productivă - TPM(Total Productive Maintenance)' class="mb-3"/>

                <p class="indent-5 my-3">În jurul anului 1951, în Japonia a apărut o abordare a calității numită Total
                    Productive Maintenance
                    (TPM). Accentul ei este pus pe mentenanță, nu pe producție. Unul dintre pilonii principali ai TPM
                    este
                    setul de principii cunoscut sub numele de 5S. 5S reprezintă un set de discipline — și folosesc
                    termenul
                    disciplină în mod intenționat. Aceste principii 5S se află, de fapt, la baza metodologiei Lean — un
                    alt
                    cuvânt la modă în Occident și un termen din ce în ce mai prezent în domeniul software.

                    Aceste principii nu sunt opționale. Așa cum menționează Uncle Bob în introducerea sa, o bună
                    practică
                    software necesită astfel de disciplină: concentrare, prezență de spirit și gândire. Nu este
                    întotdeauna
                    vorba doar despre execuție, despre a împinge utilajele „fabricii” să producă la viteza optimă.
                    Filosofia
                    5S cuprinde următoarele concepte:</p>
                <x-list>
                    <li><i>Seiri</i>,&nbsp;sau organizare("sort" în engleză). Să știi unde se află lucrurile-să
                        folosești
                        practici precum denumirea potrivită a variabilelor, metodelor și claselor este crucială.
                    </li>
                    <li><i>Seiton</i>,&nbsp;sau ordine("sistematizare" în engleză). Există o veche zicală americană:
                        <i>"Un loc pentru fiecare lucru și fiecare lucru la locul lui."</i> O funcție din un basecode
                        trebuie să fie acolo unde
                        anticipezi să o găsești. Codul trebuie să fie predictibil și lizibil. Dacă nu, ar trebui făcut
                        refactorizare pentru a pune codul la locul său.
                    </li>
                    <li><i>Seiso</i>,&nbsp;sau curățenie("strălucire" în engleză). Locul de muncă trebuie păstrat curat.
                        Codebase-ul nu trebuie încărcat cu commenturi, dorinți neînplinite și fragmente de cod
                        redundante și
                        commentate. Trebuie ordine în codebase pentru a fi ușor de ințeles și ușor de extins.
                    </li>
                    <li><i>Seiketsu</i>,&nbsp;sau standardizare. Programatorii trebuie să aibă un stil de lucru
                        consistent
                        și să implementeze practici optime pentru a itera repede în procesul de dezvoltare a unui
                        software
                        product.
                    </li>
                    <li>Shutsuke</li>
                    ,&nbsp;sau disciplină(auto-disciplină). Asta presupune să ai voința să păstrezi standardele optime
                    impuse(sau auto-impuse) în dezvoltarea softwareului și totodată să reflectezi, să analizezi
                    basecode-ul constant pentru
                    a-l îmbunătății. "Clean code" nu este doar o singură decizie, el este un cumul de decizii optime,
                    refactoring constant și atenție la detalii asiduă.
                </x-list>
            </x-info_box>
        </section>
        <section id="chapter_1" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Capitolul 1 - Clean code' class="mb-3"/>
                <x-section_title title="snippeturi interesante" class="mb-1"/>
                <p class="indent-5 my-3">Legea lui LeBlanc: <i><b>Mai târziu este echivalentul lui niciodată.</b></i>
                </p>
                <p>Dacă basecode-ul unui proiect nu este întreținut cu timpul productivitatea se apropie asimptotic de
                    zero deși resursele de productivitate pot crește precum numărul de developeri din echipă sau
                    tehnologia. Asta demonstrează cât de importantă este întreținerea codului.</p>
                <img src="{{asset('images/snippets/productivity_vs_time.png')}}" alt="productivity vs time">
                <x-important_info>
                    Singura cale de a respecta deadline-ul, singura cale de a itera repede în procesul de dezvoltare
                    este de a păstra
                    codebase-ul cât mai întreținut și optimizat cu putință.
                </x-important_info>
                <p class="mt-5">Un programator care poate să scrie <b>"clean code"</b> și optimizat e ca un artist care
                    transformă un ecran
                    gol în un sistem eficient, funcțional și ușor de înțeles și întreținut.</p>
                <x-section_title title="Ce este 'clean code-ul'?" class="mb-1"/>
                <x-quote author="Bjarne Stroustrup" class="mt-5">
                    Îmi place ca codul meu să fie elegant și eficient. Logica trebuie să fie clară și directă, astfel
                    încât erorile să nu aibă unde să se ascundă; dependențele trebuie să fie minime pentru a
                    ușura întreținerea; tratarea erorilor completă, conform unei strategii bine articulate; iar
                    performanța — aproape optimă — pentru a nu-i tenta pe oameni să „strice” codul prin optimizări
                    lipsite de principii. "Clean code-ul" face un singur lucru bine.
                </x-quote>
                <x-line/>
                <x-important_info>
                    Trebuie să ai disciplina de a da atenție la detalii. Codul ordonat, <b>"Clean code-ul"</b> este
                    focusat.
                </x-important_info>
                <x-quote author="Grady Booch, autorul cărții Object
Oriented Analysis and Design with
Applications" class="mt-5">
                    Codul optimizat este simplu și direct. El se citește ca o proză bine scrisă: fluent, coerent și fără
                    fraze întortocheate care să-ți încetinească înțelegerea. Un astfel de cod nu ascunde niciodată
                    intenția autorului, ci dimpotrivă — o evidențiază prin abstracții clare, bine delimitate, și prin
                    fluxuri de control lineare, ușor de urmărit și de anticipat.
                </x-quote>
                <x-line/>
                <x-quote author="“Marele” Dave Thomas, fondatorul
 OTI, părintele strategiei Eclipse" class="mt-5">
                    Codul curat poate fi citit și îmbunătățit de un programator care nu este autorul inițial. Are teste
                    unitare și teste de acceptare. Are nume semnificative. Oferă o singură modalitate, nu multiple, de a
                    realiza același lucru. Are dependențe minimale, definite explicit, și oferă o interfață (API) clară
                    și minimală. Codul ar trebui să fie „literate” — adică explicat/documentat astfel încât să fie ușor
                    de înțeles — deoarece, în funcție de limbaj, nu toate informațiile necesare pot fi exprimate clar
                    doar prin cod.
                </x-quote>
                <x-line/>
                <x-quote author="Michael Feathers, autorul cărții 'A lucra eficient cu legacy code'" class="mt-5">
                    Aș putea enumera toate calitățile pe care le observ în "clean code", dar există o calitate
                    principală
                    din care derivă toate celelalte. Codul curat arată întotdeauna ca și cum ar fi fost scris de cineva
                    căruia îi pasă. Nu există nimic evident pe care l-ai putea face pentru a-l îmbunătăți. Toate aceste
                    aspecte au fost deja luate în considerare de autor, iar dacă încerci să-ți imaginezi îmbunătățiri,
                    ajungi din nou în același punct: apreciind codul pe care cineva l-a lăsat pentru tine — un cod creat
                    de cineva care ține cu adevărat la măiestria acestui domeniu.
                </x-quote>
                <x-line/>
                <x-quote
                    author="Ron Jeffries, autorul cărții Instalarea Programării extreme și Aventuri de programare extremă în C#"
                    class="mt-5">
                    „În ultimii ani încep — și aproape că mă opresc — cu regulile lui Beck pentru codul simplu. În
                    ordinea priorității, codul simplu:
                    • Rulează toate testele;
                    • Nu conține duplicări;
                    • Exprimă toate ideile de design care există în sistem;
                    • Minimizează numărul de entități, precum clase, metode, funcții și altele asemenea.”
                    <br>
                    Dintre toate acestea, mă concentrez în principal pe duplicare. Când același lucru se repetă iar și
                    iar, este un semn că există o idee în mintea noastră care nu este reprezentată corespunzător în cod.
                    Încerc să aflu care este acea idee. Apoi încerc să o exprim mai clar. Pentru mine, expresivitatea
                    include nume semnificative, iar de multe ori schimb numele elementelor de mai multe ori înainte să
                    mă hotărăsc. Cu unelte moderne de programare, precum Eclipse, redenumirea este relativ ieftină ca
                    efort, așa că nu mă deranjează să fac modificări.
                    <br>
                    Totuși, expresivitatea nu se limitează la nume. Verific și dacă un obiect sau o metodă face mai mult
                    decât un singur lucru. Dacă este un obiect, probabil trebuie împărțit în două sau mai multe obiecte.
                    Dacă este o metodă, folosesc întotdeauna refactorizarea „Extract Method” (extrage metodă), rezultând
                    o metodă principală care spune mai clar ce face și câteva metode auxiliare care explică cum se face.
                    Reducerea duplicării și creșterea expresivității mă duc foarte departe în direcția codului curat,
                    iar îmbunătățirea codului neîngrijit având în vedere doar aceste două aspecte poate produce o
                    diferență enormă.
                    <br>
                    Există, însă, încă un lucru pe care îl fac și care e mai greu de explicat. După ani de practică, mi
                    se pare că toate programele sunt alcătuite din elemente foarte asemănătoare. Un exemplu este
                    „găsirea unor elemente într-o colecție”. Fie că avem o bază de date cu înregistrări de angajați, fie
                    o hartă hash (hash map) de perechi cheie–valoare, fie un array de elemente, de multe ori vrem să
                    obținem un anumit element din acea colecție.
                    <br>
                    Când observ asta, adesea învelesc implementarea particulară într-o metodă sau clasă mai abstractă.
                    Asta îmi oferă câteva avantaje interesante. Pot implementa funcționalitatea acum cu ceva simplu — de
                    exemplu o hartă hash — dar, pentru că toate referințele la acea căutare sunt acoperite de mica mea
                    abstracție, pot schimba implementarea oricând vreau. Pot merge repede înainte păstrând în același
                    timp posibilitatea de a modifica mai târziu. În plus, abstracția colecției îmi atrage adesea atenția
                    asupra a ceea ce se întâmplă „cu adevărat” și mă împiedică să mă avânt pe calea implementării unui
                    comportament arbitrar pentru colecții atunci când, de fapt, am nevoie doar de câteva modalități
                    destul de simple de a găsi ce caut.
                    <br>
                    Reducerea duplicării, expresivitate ridicată și construirea timpurie a unor abstracții simple —
                    pentru mine, asta face codul curat.
                </x-quote>
                <x-line/>
                <x-quote
                    author="Ward Cunningham, inventatorul Wiki,
inventatorul Fit, co-inventatorul eXtreme
Programming. Forța motrice din spatele
Design Patterns. Smalltalk și lider de opinie OO. Nașul tuturor
celor cărora le pasă de cod"
                >
                    Știi că lucrezi la un cod curat atunci când fiecare
                    rutină pe care o citești se dovedește a fi cam așa cum
                    te așteptai. Poți numi cod frumos atunci când
                    codul face să pară că limbajul a fost
                    creat pentru problemă.
                </x-quote>
            </x-info_box>
        </section>
        <section id="chapter_2" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Reguli de denumire a variabilelor:' class="mb-3"/>
                <x-important_info>
                    Folosește nume caracteristice care dezvăluie intenția.
                </x-important_info>
                <x-section_title title="Explicații adiționale" class="mt-3"/>

                <x-list>
                    <li>
                        Dacă denumirea are nevoie de comentarii, atunci regula nu este respectată căci denumirea nu
                        dezvăluie intenția.
                    </li>
                    <li><i><b>implicit</b></i>-măsura în care contextul nu este explicit în codul pe care îl conține.
                    </li>
                    <li>
                        Denumirea variabilelor, a funcțiilor, claselor sau metodelor, trebuie să fie cât mai explicită
                        fără a fi exagerat de verbose. Trebuie să dezvălui intenția sa fără a pierde din lizibilitate.
                    </li>
                </x-list>
                <x-important_info class="mt-5">
                    Evită dezinformarea
                </x-important_info>
                <x-list>
                    <li>
                        În denumirea variabilelor nu trebuie folosite nume care se referă la structuri de date specifice
                        limbajului sau care pot duce în eroare cu privire la conținutul acestora. Spre exemplu nu
                        trebuie denumită o colecție de useri "usersArray". Dacă se modifică structura de date? Nu
                        trebuie să fie tight coupling între denumirea variabilelor și conținutul acestora.
                    </li>
                    <li>Nu trebuie folosite nume asemănătoare pentru date diferite. Denumirea conceptelor similar este
                        informație. Poate duce în eroare, evident că este posibil ca din neatenție să invoci
                        funcționalitatea greșită din cauza denumirilor asemănătoare.
                    </li>
                </x-list>
                <x-important_info class="mt-5">
                    Creează distincții cu sens
                </x-important_info>
                <x-list>
                    <li>
                        Programatorii își creează probleme pentru ei înșiși
                        atunci când scriu cod exclusiv pentru a satisface
                        un compilator sau un interpretor
                    </li>
                    <li>
                        Trebuie folosite denumiri clare care pot fi pronunțate
                    </li>
                    <li>
                        Denumirile trebuie să poată fi căutate în întreg proiectul
                    </li>
                    <li>
                        Ar fi de preferat ca variabilele care au ca denumire o singură literă să fie folosite DOAR ca
                        variabile locale în metode mici.
                    </li>
                </x-list>
                <x-important_info class="mt-5">
                    Evită maparea mentală
                </x-important_info>
                <p>Această problemă apare, în general, din alegerea de a nu utiliza nici termeni din <i><b>'domain
                            layer'</b></i>,
                    nici termeni din <i><b>'solution layer'</b></i>.</p>
                <x-list>
                    <li>
                        Numele unei clase nu ar trebui să fie un verb
                    </li>
                    <li>
                        Un lexicon consistent este un mare avantaj pentru colegii de breaslă care trebuie să lucreze
                        alături de tine.
                        tău.
                    </li>
                </x-list>
                <x-important_info class="mt-5">
                    <p>Problem Domain = what needs to be done</p>
                    <p>Solution Domain = how you decide to do it</p>
                </x-important_info>
            </x-info_box>
        </section>
        <section id="chapter_3" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Funcții' class="mb-3"/>
                <p>Prima regulă a funcțiilor este că trebuie să fie mici, cât mai mici cu putință. Trebuie să respecte
                    principiul <span class="extra-info"
                                     data-info='SRP (Single Responsibility Principle) = o clasă sau modul ar trebui să aibă un singur motiv pentru a se schimba.'>SRP</span>
                </p>
                <x-quote author="Robert C Martin" class="mt-3">
                    O funcție nu ar trebui să fie mai mare decât un ecran.
                </x-quote>
                <x-important_info class="mt-5">
                    O funcție ar trebui să facă doar un singur lucru și numai unul. Și ar trebui să-l facă bine.
                </x-important_info>
                <p class="mt-5">
                    În o funcție nu trebuie amestecate mai multe nivele de abstracție. O funcție ar trebui să fie
                    responsabilă de un singur nivel de abstracție.
                </p>
                <x-quote author="Ward Cunningham" class="mt-3">
                    Știi că lucrezi cu "clean code" atunci când o rutină face cam ceea ce te aștepți.
                </x-quote>
                <x-subtitle title='Argumentele unei funcții' class="mb-3"/>
                <x-important_info class="mt-3">
                    Numărul ideal de argumente pentru o funcție este zero (niladică). Urmează unu (monadică), apoi două
                    (diadică). Trei argumente (triadică) ar trebui evitate pe cât posibil. Mai mult de trei (poliadică)
                    necesită o justificare foarte specială — și chiar și atunci nu ar trebui folosite.
                </x-important_info>
                <p class="mt-3">În general, argumentele de ieșire ar trebui evitate. Dacă funcția trebuie să schimbe
                    starea unui obiect, faceți-o să schimbe starea obiectului care îl deține.</p>
                <x-important_info class="mt-3">
                    Duplicarea codului ar putea fi rădăcina tuturor relelor în dezvoltarea software-ului.
                </x-important_info>
            </x-info_box>
        </section>
        <section id="chapter_4" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Comentarii' class="mb-3"/>
                <p>Trebuie să înlocuiesc tendința de a crea zgomot cu determinarea de a face ordine în codebase. Vei
                    descoperi că te face un programator mai fericit și mai bun.
                </p>
                <x-important_info class="mt-3">
                    Puține practici sunt la fel de odioase ca comentariile la cod. Nu faceți asta!
                </x-important_info>
                <p class="mt-3">O funcție mică nu ar trebui să aibă nevoie de comentarii. Dacă se alege responsabil
                    denumirea la
                    funcție ar trebui să fie îndeajuns pentru a fi clar rostul ei.</p>
            </x-info_box>
        </section>
        <section id="chapter_5" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Formatare' class="mb-3"/>
                <p>Dacă deschiderea separă conceptele, atunci densitatea verticală implică o asociere strânsă. Așadar,
                    liniile
                    de cod care sunt strâns legate ar trebui să apară dense pe verticală.</p>
                <p class="mt-3">Variabilele de instanță, ar trebui declarate la începutul clasei. Acest lucru
                    nu ar trebui să crească distanța verticală dintre aceste variabile, deoarece într-o clasă bine
                    proiectată
                    ele sunt utilizate de multe, dacă nu de toate, metodele clasei.</p>
                <p class="mt-3"><b>Funcțiile dependente&nbsp;</b>ar trebuie să fie apropriate pe verticală iar cea
                    invocată ar trebui să fie amplasată sub părintele ei, dacă este posibil. Asta dă programului un flow
                    natural. Dacă convenția este respectată consistent, developerii vor putea avea încredere că
                    definițiile funcțiilor vor fi imediat după invocarea ei.</p>
                <p class="mt-3"><b>Afinitate conceptuală&nbsp;</b>Logica de cod, funcțiile care sunt corelate una și
                    care am putea spune că au "o depență strânsă" ar trebui să fie situate una în vecinătatea
                    celeilalte.</p>
                <p class="mt-3"><b>Ordonare verticală&nbsp;</b>În general vrei ca funcția care este apelată să fie sub
                    cea care face apelul. Adică vrei ca funcția invocată să fie sub părintele ei. Asta creează un flow
                    consistent de-a lungul codului sursă de la un nivel înalt la un nivel mai jos.</p>
                <p class="mt-3"><b>Formatare orizontală&nbsp;</b>Limita <b>Hollerith</b> de 80 de caractere este
                    arbitrară dar peste 120 probabil reprezintă neglijență.</p>
                <h5>Deschiderea și densitatea orizontală</h5>
                <p>Folosim spațiul alb orizontal pentru a asocia lucruri care sunt puternic legate și pentru a disocia
                    lucruri care nu sunt dependente.</p>
            </x-info_box>
        </section>
        <section id="chapter_6" class="scroll-mt-20">
            <x-info_box>
                <x-subtitle title='Obiecte și structuri de date' class="mb-3"/>
                <p>Există un motiv pentru care păstrăm variabilele noastre private. Nu vrem ca altcineva să depindă de
                    ele. Vrem să avem libertatea de a le schimba tipul sau implementarea după bunul plac sau din impuls.
                    De ce, atunci, atât de mulți programatori adaugă automat *getteri* și *setteri* obiectelor lor,
                    expunând variabilele private ca și cum ar fi publice?
                </p>
            </x-info_box>
        </section>

    </div>
</x-layout>
