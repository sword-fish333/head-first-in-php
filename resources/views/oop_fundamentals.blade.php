<x-layout>
    <!-- Reading Progress Bar -->

    <div class="fixed top-0 left-0 w-full h-1 bg-gray-200 z-50">
        <div id="reading-progress" class="h-full bg-blue-600 transition-all duration-300 ease-out" style="width: 0%"></div>
    </div>


    <!-- Table of Contents Sidebar -->
    <nav id="toc-sidebar" class="fixed left-0 top-0 w-64 h-full bg-white shadow-lg rounded-r-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 z-40 overflow-y-auto">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-blue-950 mb-4">Cuprins</h3>
            <ul class="space-y-2" id="toc-list">
                <li><a href="#intro" class="toc-link block py-2 px-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">Introducere în OOP</a></li>
                <li><a href="#differences" class="toc-link block py-2 px-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">Diferențe conceptuale</a></li>
                <li><a href="#advantages" class="toc-link block py-2 px-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">Avantaje</a></li>
                <li><a href="#disadvantages" class="toc-link block py-2 px-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">Dezavantaje</a></li>
                <li><a href="#conclusion" class="toc-link block py-2 px-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">Concluzii</a></li>
            </ul>
        </div>
    </nav>
    <!-- Toggle Button for Mobile -->
    <button id="toc-toggle" class="fixed left-4 top-24 bg-blue-600 text-white p-2 rounded-full shadow-lg lg:hidden z-50">
        <span class="material-symbols-outlined">menu</span>
    </button>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Concepte fundamentale în OOP"/>



        <!-- Introduction Section -->
        <section id="intro" class="scroll-mt-20">
            <x-info_box>
                Programarea orientată pe obiect reprezintă o schimbare fundamentală în paradigma de gândire a software-ului.
                În loc să privim programul ca o serie de funcții care operează cu date, OOP încurajează să modelăm soft-ul după entități din lumea reală și
                definirea felul în care ele se <b>"comportă" și interacționează</b>. Aceste entități se numesc clase și
                reprezintă un model abstract al unei entități din realitate. Pentru a se putea lucra cu aceste clase ele
                trebuie instanțiate în obiecte concrete.
            </x-info_box>
        </section>

        <x-important_box>
            <!-- OOP vs Procedural Section -->
            <section id="oop-vs-procedural" class="scroll-mt-20">
                OOP diferă substanțial de programarea procedurală. În programarea procedurală instrucțiunile sunt executate
                liniar, secvențial, pas cu pas. Datele sunt transformate "as you go". Focusul e pe ceea ce trebuie să se
                întâmple. <b>Este o formă de programare imperativă.</b>
                OOP, pe de altă parte, ține mai multe de modelarea realității în <b>clase</b> și definirea relațiilor și a
                responsabilităților dintre entități.
                <br>
                <hr class="my-5 border-gray-300"/>
                <b>În programarea procedurală</b>&nbsp;datele sunt separate de funcțiile care operează cu ele.
                În OOP datele și funcțiile sunt <b>încapsulate</b> la un loc și definesc <b>proprietățile</b> și <b>comportamentul</b>
                obiectelor.
            </section>

            <hr class="my-5 border-gray-300"/>

            <!-- Conceptual Differences Section -->
            <section id="differences" class="scroll-mt-20">
                <h4 class="text-xl text-red-800 font-semibold mb-4">Diferențe conceptuale fundamentale:</h4>
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold underline decoration-1 underline-offset-2">Programarea procedurală</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>este fundamental imperativă</li>
                            <li>răspunde la întrebarea ce pași ar trebui să fac pentru a rezolva această problemă.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="font-semibold underline decoration-1 underline-offset-2 mt-5">OOP</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>este declarativ în comparație cu programarea procedurală</li>
                            <li>pune problema a ceea ce se află la nivel de "problem domain", cum pot fi aceste entități modelate în
                                clase. Cum poate fi definit <b>comportamentul</b> claselor în <b>metode</b> și <b>proprietăți</b>. Și,
                                foarte important, care sunt <b>relațiile</b> dintre clase și cum <b>interacționează</b> între ele.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Advantages Section -->
            <section id="advantages" class="scroll-mt-20 mt-10">
                <h4 class="text-xl text-red-800 font-semibold mb-4">Avantaje la programarea procedurală și OOP</h4>

                <div class="mb-6">
                    <p class="font-semibold underline decoration-1 underline-offset-2">Avantaje la programarea procedurală</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>flow-ul de execuție este mai ușor de urmărit, este liniar și predictibil.</li>
                        <li>este ușor de integrat căci reprezintă paradigma inițială de programare și astfel poate fi folosită
                            în toate limbajele de programare.
                        </li>
                        <li>este optim pentru scripturi de procesare de date("data pipelines"), pentru computare matematică și
                            flow-uri de execuție liniare.
                        </li>
                        <li>Flow-ul de execuție este mai explicit, mai ușor de urmărit și astfel mai ușor de făcut debug.
                        </li>
                    </ul>
                </div>

                <div class="bg-red-50 p-4 rounded-lg my-4">
                    <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;OOP-ul a fost conceput pentru a se
                        adresa la aceste <b>"pain points"</b> din paradigma programării procedurale.</p>
                </div>

                <div>
                    <p class="font-semibold underline decoration-1 underline-offset-2 mt-2">Avantaje OOP</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>Logica fiind încapsulată in clase e mai clară și mai ușor de înțeles la nivel de domain layer</li>
                        <li>Fiindcă logica este încapsulată în clase, se respectă <b>"principiul responsabilității unice"</b>,
                            astfel dependențele dintre clase sunt mai clare, mai ușor de definit și astfel modificările se pot
                            face mai ușor.
                        </li>
                        <li>Soft-ul complex poate fi modelat mai ușor caci problemele se definesc la un nivel mai mare de <b>abstractizare</b>.
                        </li>
                        <li>Cod snippets se pot reutiliza mai ușor prin <b>moștenire</b>.</li>
                        <li>Se face mai ușor <b>separarea de responsabilități</b> care este din ce în ce mai valoroasă când un
                            sistem software crește.
                        </li>
                        <li>Este optim pentru crearea de aplicații medii și mari cu multe interacțiuni și pentru
                            realizarea de librării.
                        </li>
                        <li>OOP permite să faci blackbox și whitebox la teste unitare.
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Disadvantages Section -->
            <section id="disadvantages" class="scroll-mt-20 mt-10">
                <h4 class="text-xl text-red-800 font-semibold mb-4">Dezavantaje la programarea procedurală și OOP</h4>

                <div class="mb-6">
                    <p class="font-semibold underline decoration-1 underline-offset-2">Dezavantaje la programarea procedurală</p>
                    <ul class="list-disc pl-5 mt-2 space-y-2">
                        <li>Odată ce proiectul scalează, granițele dintre entități se estompează. Să găsești funcția necesară
                            devine o corvoadă.
                        </li>
                        <li>"The Data Protection Challenge". Datele neavând <b>access modifiers</b> și nefiind încapsulate ele
                            pot fi modificate de alte funcții. Asta devine un coșmar în sisteme mari, când trebuie să faci debug.
                        </li>
                        <li>Dacă nu se respectă "single responsibility principle" se poate ajunge la duplicare de cod masivă. Și
                            atunci o modificare în o funcție trebuie făcută în toate celelalte funcții.
                        </li>
                        <li>Modelarea "domain layerului" este imperativă. În loc să te gândești la entitățile din lumea reală și
                            relațiile dintre ele, te gândești la fiecare pas în execuția flow-ului.
                        </li>
                        <li>State-ul unei aplicații procedurale este mai greu de menținut și de înțeles. Devine o muncă
                            herculiană doar să înțelegi state-ul și să îl modifici mai ales fiindcă în programarea procedurală state-ul este
                            poluat cu variabile globale și funcțiile au <b>"side effects"</b> și au dependențe puternice între
                            ele.
                        </li>
                        <li>În programarea procedurală este o problemă și <b>extinderea de funcționalitate</b>. Fiindcă nu se
                            respectă <b>principiul responsabilității unice</b> și nu este o metodă "clean" și clară de a
                            modifica soft-ul, fără a atinge ceea ce este deja făcut, adăugarea de funcționalitate nouă
                            poate dezechilibra ceea ce deja funcționează.
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold underline decoration-1 underline-offset-2 mt-2">Dezavantaje la OOP</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>Pentru sisteme software simple OOP poate fi "overkill" și dacă designul relațiilor dintre clase nu
                            este decent aplicația este mai greu de întreținut și scalat.
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Conclusion Section -->
            <section id="conclusion" class="scroll-mt-20 mt-10">
                <div class="space-y-4">
                    <div class="bg-red-50 p-4 rounded-lg">
                        <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;Important este de înțeles că aceste
                            paradigme nu se exclud reciproc. De obicei OOP este folosit pentru a defini componentele importante ale
                            sistemului, iar programarea procedurală este încapsulată ca logică în metodele <b>claselor.</b></p>
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg">
                        <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;Precum programarea procedurală are
                            limitările ei tot la fel și programarea OOP vine cu setul său de complexități. În primul rând nu toate limbajele de
                            programare au suport pentru el și nu prea are sens în programe mici sau scripturi. Folosirea "instrumentului potrivit" pentru task face toată diferența.</p>
                    </div>
                </div>

                <div class="flex items-center justify-start my-8 gap-5 flex-wrap">
                    @include('partials._link_btn',['title'=>'Deep dive in programare procedurală','route'=>'deep-dive-procedural'])
                    @include('partials._link_btn',['title'=>'Exemplu de OOP','route'=>'oop-example'])
                </div>
            </section>
        </x-important_box>
    </div>

    <!-- JavaScript for Enhanced Functionality -->
    <script>
        // Reading Progress Bar
        function updateProgressBar() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercent = (scrollTop / scrollHeight) * 100;
            document.getElementById('reading-progress').style.width = scrollPercent + '%';
        }

        // Table of Contents Active State
        function updateActiveSection() {
            const sections = document.querySelectorAll('section[id]');
            const tocLinks = document.querySelectorAll('.toc-link');

            let currentSection = '';

            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= 100 && rect.bottom >= 100) {
                    currentSection = section.getAttribute('id');
                }
            });

            tocLinks.forEach(link => {
                link.classList.remove('bg-blue-100', 'text-blue-600', 'font-semibold');
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.classList.add('bg-blue-100', 'text-blue-600', 'font-semibold');
                }
            });
        }

        // Smooth Scrolling for TOC Links
        document.querySelectorAll('.toc-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Mobile TOC Toggle
        const tocToggle = document.getElementById('toc-toggle');
        const tocSidebar = document.getElementById('toc-sidebar');

        tocToggle.addEventListener('click', function() {
            tocSidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 1024 && !tocSidebar.contains(e.target) && !tocToggle.contains(e.target)) {
                tocSidebar.classList.add('-translate-x-full');
            }
        });

        // Event Listeners
        window.addEventListener('scroll', () => {
            updateProgressBar();
            updateActiveSection();
        });

        // Initial calls
        updateProgressBar();
        updateActiveSection();
    </script>
</x-layout>

