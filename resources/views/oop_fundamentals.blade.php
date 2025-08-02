<x-layout>
    <div class="container mx-auto pt-10">
        <h1 class="text-4xl font-semibold text-blue-950 underline text-center mb-10">Concepte fundamentale în OOP</h1>
        <x-info_box>
            Programarea orientată pe obiect reprezintă o schimbare fundamentală în paradigma de gândire a software-ului.
            În loc sâ privim programul ca o serie
            de funcții care operează cu date, OOP încurajează să modelăm soft-ul după entități din lumea reală și
            definirea felul în care ele se <b>"comportă" și interacționează</b>. Aceste entități se numesc clase și
            reprezintă un model abstract al unei entități din realitate. Pentru a se putea lucra cu aceste clase ele
            trebuie instanțiate în obiecte concrete.
        </x-info_box>
        <x-important_box>
            OOP diferă substanțial de programarea procedurală. În programarea procedurală instrucțiunile sunt executate
            liniar, secvențial, pas cu pas. datele sunt transformate "as you go". Focusul e pe ceea ce trebuie să se
            întâmple.
            <b>Este o formă de programare imperativă.</b>
            OOP, pe de altă parte, ține mai multe de modelarea realității în <b>clase</b> și definirea relațiilor și a
            responsabilităților dintre entități.
            <br>
            <hr class="my-5"/>
            <b>În programarea procedurală</b>&nbsp;datele sunt separate de funcțiile care operează cu ele.
            În OOP datele și funcțiile sunt <b>încapsulate</b> la un loc și definesc <b>proprietățile</b> și <b>comportamentul</b>
            obiectelor.
            <hr class="my-5"/>
            <h4 class="text-xl text-red-800">Diferențe conceptuale fundamentale:</h4>
            <u>Programarea procedurală</u>
            <ul class="list-disc pl-5">
                <li>este fundamental imperativă</li>
                <li>răspunde la întrebarea ce pași ar trebui să fac pentru a rezolva această problemă.</li>
            </ul>
            <u class="mt-5">OOP</u>
            <ul class="list-disc pl-5">
                <li>este declarativ în comparație cu programarea procedurală</li>
                <li>pune problema a ceea ce se află la nivel de "problem domain", cum pot fi aceste entități modelate în
                    clase. Cum poate fi definit <b>comportamentul</b> claselor în <b>metode</b> și <b>proprietăți</b>. Și,
                    foarte important, care sunt <b>relațiile</b> dintre clase și cum <b>interacționează</b> între ele.
                </li>
            </ul>

            <h4 class="text-xl text-red-800 mt-10">Avantaje la programarea procedurală și OOP</h4>
            <p class="underline">Avantaje la programarea procedurală</p>
            <ul class="list-disc pl-5">
                <li>flow-ul de execuție este mai ușor de urmărit, este liniar și predictibil.</li>
                <li>este ușor de integrat căci reprezintă paradigma inițială de programare și astfel poate fi folosită
                    în toate limbajele de programare.
                </li>
                <li>este optim pentru scripturi de procesare de date("data pipelines"), pentru computare matematică și
                    flow-uri de execuție liniare.
                </li>
            </ul>
            <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;OOP-ul a fost conceput pentru a se
                adresa la aceste <b>"pain points"</b> din paradigna programării procedurale.</p>
            <p class="mt-2 underline">Avantaje OOP</p>
            <ul class="list-disc pl-5">
                <li>Logica fiind încapsulată in clase e mai clară și mai ușor de înțeles la nivel de domain layer</li>
                <li>Fiindcă logica este încapsulată în clase. Se respectă <b>"principiul responsabilității unice"</b>,
                    astfel dependențele dintre clase sunt mai clare, mai ușor de definit și astfel modificările se pot
                    face mai ușor.
                </li>
                <li>Soft-ul complex poate fi modelat mai ușor caci problemele se defines la un nivel mai mare de <b>abstractizare</b>.
                </li>
                <li>cod snippets se pot reutiliza mai ușor prin <b>moștenire</b>.</li>
                <li>se face mai ușor <b>separarea de responsabilități</b> care este din ce în ce mai valoroasă când un
                    sistem software crește.
                </li>
                <li>este optim pentru crearea de aplicații medii și mari cu multe interacțiuni și pentru
                    realizarea de librării.
                </li>

            </ul>
            <h4 class="text-xl text-red-800 mt-10">Dezavantaje la programarea procedurală și OOP</h4>

            <u>Dezavantaje la programarea procedurală</u>
            <ul class="list-disc pl-5">
                <li>Odată ce proiectul scalează, granițele dintre entități se estompează. Să găsești funcția necesră
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
                <li>stae-ul unei aplicații procedurale este mai greu de menținut și de înțeles. Devine o muncă
                    herculiană
                    doar să înțelegi state ul și să îl modifici mai ales fiindcă în programarea procedurală state-ul este
                    poluat cu variabile globale și funcțiile au <b>"side effects"</b> și au dependențe puternice între
                    ele.
                </li>
                <li>În programarea procedurală este o problemă și <b>extinderea de funcționalitate</b>. Fiindcă nu se
                    respectă <b>principiul responsabilității unice</b> și nu este o metodă "clean" și clară de a
                    modifica soft-ul, fără a atinge ceeea ce este deja făcut, adăugarea de funționalitate nouă
                    poate dezechilibra ceea ce deja funcționează.
                </li>
            </ul>
            <p class="mt-2 underline">Dezavantaje la OOP</p>
            <ul class="list-disc pl-5">
                <li>Pentru sisteme software simple OOP poate fi "overkill" și dacă designul relațiilor dintre clase nu
                    este decent aplicația este mai greu de întreținut și scalat.
                </li>

            </ul>
            <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;Important este de înțeles că aceste
                paradigme nu se exclud reciproc. De obicei OOP este folosit pentru a defini componenele importante ale
                sistemului, iar programarea procedurală este încapsulată ca logică în metodelete <b>claselor.</b></p>
            <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;Important este de înțeles că aceste
                paradigme nu se exclud reciproc. De obicei OOP este folosit pentru a defini componenele importante ale
                sistemului, iar programarea procedurală este încapsulată ca logică în metodelete <b>claselor.</b></p>
            <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;Precum programarea procedurală are
                limitările ei tot la fel și programarea OOP vine cu setul său de complexități. În primul rând nu toate limbajele de
                programare au suport pentru el și nu prea are sens în programe mici sau scripturi. Folosirea "instrumentului potrivit" pentru task face toată diferența.</p>
        </x-important_box>
    </div>
</x-layout>
