<x-layout>
    <x-progress_bar/>

    <x-sidebar :sections="$sections"/>


    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Concepte fundamentale în OOP"/>


        <!-- Introduction Section -->
        <section id="intro" class="scroll-mt-20">
            <x-info_box>
                Programarea orientată pe obiect reprezintă o schimbare fundamentală în paradigma de gândire a
                software-ului.
                În loc să privim programul ca o serie de funcții care operează cu date, OOP încurajează să modelăm
                soft-ul după entități din lumea reală și
                definirea felul în care ele se <b>"comportă" și interacționează</b>. Aceste entități se numesc clase și
                reprezintă un model abstract al unei entități din realitate. Pentru a se putea lucra cu aceste <b>clase</b> ele
                trebuie instanțiate în <b>obiecte concrete</b>.
            </x-info_box>
        </section>

        <x-important_box>
            <!-- OOP vs Procedural Section -->
            <section id="oop-vs-procedural" class="scroll-mt-20">
                OOP diferă substanțial de programarea procedurală. În programarea procedurală instrucțiunile sunt
                executate
                liniar, secvențial, pas cu pas. Datele sunt transformate "as you go". Focusul e pe ceea ce trebuie să se
                întâmple. <b>Este o formă de programare imperativă.</b>
                OOP, pe de altă parte, ține mai multe de modelarea realității în <b>clase</b> și definirea relațiilor și
                a
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
                <x-main_title class="mb-4" title="Diferențe conceptuale fundamentale:"/>
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
                            <li>pune problema a ceea ce se află la nivel de "problem domain", cum pot fi aceste entități
                                modelate în
                                clase. Cum poate fi definit <b>comportamentul</b> claselor în <b>metode</b> și <b>proprietăți</b>.
                                Și,
                                foarte important, care sunt <b>relațiile</b> dintre clase și cum <b>interacționează</b>
                                între ele.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Advantages Section -->
            <section id="advantages" class="scroll-mt-20 mt-10">
                <h4 class="text-xl text-red-800 font-semibold mb-4">Avantaje la programarea procedurală și OOP</h4>

                <div class="mb-6">
                    <p class="font-semibold underline decoration-1 underline-offset-2">Avantaje la programarea
                        procedurală</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>flow-ul de execuție este mai ușor de urmărit, este liniar și predictibil.</li>
                        <li>este ușor de integrat căci reprezintă paradigma inițială de programare și astfel poate fi
                            folosită
                            în toate limbajele de programare.
                        </li>
                        <li>este optim pentru scripturi de procesare de date("data pipelines"), pentru computare
                            matematică și
                            flow-uri de execuție liniare.
                        </li>
                        <li>Flow-ul de execuție este mai explicit, mai ușor de urmărit și astfel mai ușor de făcut
                            debug.
                        </li>
                    </ul>
                </div>

                <x-important_info>
                    OOP-ul a fost conceput pentru
                    a se
                    adresa la aceste <b>"pain points"</b> din paradigma programării procedurale.
                </x-important_info>

                <div>
                    <p class="font-semibold underline decoration-1 underline-offset-2 mt-2">Avantaje OOP</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>Logica fiind încapsulată in clase e mai clară și mai ușor de înțeles la nivel de domain
                            layer
                        </li>
                        <li>Fiindcă logica este încapsulată în clase, se respectă <b>"principiul responsabilității
                                unice"</b>,
                            astfel dependențele dintre clase sunt mai clare, mai ușor de definit și astfel modificările
                            se pot
                            face mai ușor.
                        </li>
                        <li>Soft-ul complex poate fi modelat mai ușor caci problemele se definesc la un nivel mai mare
                            de <b>abstractizare</b>.
                        </li>
                        <li>Cod snippets se pot reutiliza mai ușor prin <b>moștenire</b>.</li>
                        <li>Se face mai ușor <b>separarea de responsabilități</b> care este din ce în ce mai valoroasă
                            când un
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
                    <p class="font-semibold underline decoration-1 underline-offset-2">Dezavantaje la programarea
                        procedurală</p>
                    <ul class="list-disc pl-5 mt-2 space-y-2">
                        <li>Odată ce proiectul scalează, granițele dintre entități se estompează. Să găsești funcția
                            necesară
                            devine o corvoadă.
                        </li>
                        <li>"The Data Protection Challenge". Datele neavând <b>access modifiers</b> și nefiind
                            încapsulate ele
                            pot fi modificate de alte funcții. Asta devine un coșmar în sisteme mari, când trebuie să
                            faci debug.
                        </li>
                        <li>Dacă nu se respectă "single responsibility principle" se poate ajunge la duplicare de cod
                            masivă. Și
                            atunci o modificare în o funcție trebuie făcută în toate celelalte funcții.
                        </li>
                        <li>Modelarea "domain layerului" este imperativă. În loc să te gândești la entitățile din lumea
                            reală și
                            relațiile dintre ele, te gândești la fiecare pas în execuția flow-ului.
                        </li>
                        <li>State-ul unei aplicații procedurale este mai greu de menținut și de înțeles. Devine o muncă
                            herculiană doar să înțelegi state-ul și să îl modifici mai ales fiindcă în programarea
                            procedurală state-ul este
                            poluat cu variabile globale și funcțiile au <b>"side effects"</b> și au dependențe puternice
                            între
                            ele.
                        </li>
                        <li>În programarea procedurală este o problemă și <b>extinderea de funcționalitate</b>. Fiindcă
                            nu se
                            respectă <b>principiul responsabilității unice</b> și nu este o metodă "clean" și clară de a
                            modifica soft-ul, fără a atinge ceea ce este deja făcut, adăugarea de funcționalitate nouă
                            poate dezechilibra ceea ce deja funcționează.
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold underline decoration-1 underline-offset-2 mt-2">Dezavantaje la OOP</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li>Pentru sisteme software simple OOP poate fi "overkill" și dacă designul relațiilor dintre
                            clase nu
                            este decent aplicația este mai greu de întreținut și scalat.
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Conclusion Section -->
            <section id="conclusion" class="scroll-mt-20 mt-10">
                <div class="space-y-4">
                    <x-important_info>Important este de înțeles că aceste
                        paradigme nu se exclud reciproc. De obicei OOP este folosit pentru a defini componentele
                        importante ale
                        sistemului, iar programarea procedurală este încapsulată ca logică în metodele <b>claselor.</b>
                    </x-important_info>

                    <x-important_info>
                        Precum programarea procedurală are
                        limitările ei tot la fel și programarea OOP vine cu setul său de complexități. În primul rând nu
                        toate limbajele de
                        programare au suport pentru el și nu prea are sens în programe mici sau scripturi. Folosirea
                        "instrumentului potrivit" pentru task face toată diferența.
                    </x-important_info>
                </div>

                <div class="flex items-center justify-start my-8 gap-5 flex-wrap">
                    @include('partials._link_btn',['title'=>'Deep dive in programare procedurală','route'=>'deep-dive-procedural'])
                    @include('partials._link_btn',['title'=>'Exemplu de OOP','route'=>'oop-example'])
                </div>
            </section>
        </x-important_box>
    </div>

</x-layout>

