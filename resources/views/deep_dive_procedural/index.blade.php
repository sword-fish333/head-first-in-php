<x-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-semibold text-blue-950 underline text-center mb-10">Programare procedurală</h1>
        <x-info_box>
            Programarea procedurală organizează codul ca o colecție de funcții care operează cu date, având o abordare
            pas cu pas la rezolvarea de probleme.
            Programarea procedurală excelează în scenarii care necesită manipularea directă de date. E utilă pentru <b>pipelinuri
                de manipulare de date</b>, <b>scripturi</b>,
            <b>API endpoints</b>
        </x-info_box>
        <x-important_box>
            Spre deosebire de OOP, codul procedural separă datele de funcțiile care le manipulează. Astfel se creează
            flow-uri de execuție liniare care sunt mult mai ușpr de urmărit și de făcut debug.
        </x-important_box>
        <h4 class="mt-10">Exemplu de programare procedurală:</h4>
        @include('deep_dive_procedural.partials.example1')
        <x-important_box>
            <h4>Concepte fundamentale de programare procedurală</h4>
            <ul class="list-disc pl-5">
                <li>compunearea de funcții: reprezintă logică sofisticată de transformare a datelor fără ierarhii de
                    obiecte. Funcțiile de ordin superior pot crea lanțuri de procesare reutilizabile care transformă
                    datele prin mai multe etape.
                </li>
                <li>state management</li>
                <li>arhitectură modulară</li>
            </ul>
        </x-important_box>
        <x-important_box>
            <x-subtitle title="Principii fundamentale pentru cod procedural în producție" class="my-5" />

            <ul class="list-disc pl-5">
                <li>
                    Aplicarea strictă a tipurilor formează fundația PHP-ului procedural modern. Fiecare funcție ar trebui să declare tipurile parametrilor și tipurile de returnare, cu <b>declare(strict_types=1)</b> în partea de sus a fișierului asigurând siguranța tipurilor în întreaga aplicație.
                </li>
                <li>Funcțiile trebuie organizate modular astfel încât base code-ul e organizat și lizibil. Funcțiile înrudite ar trebui grupate în fișiere, cu <b>convenții clare de denumire</b> și <b>responsabilități unice</b>. Fiecare funcție ar trebui să aibă o <b>singură responsabilitate</b>. Să primească date de intrare, să nu aibă side-effects puține sau chiar deloc. Și să întoarcă output predictibil.</li>
                <li>Gestionarea erorilor prin excepții înlocuiește codurile de eroare tradiționale și rezultatul de tip boolean. PHP-ul procedural modern folosește <b>blocuri try-catch</b>, ierarhii de excepții specifice și înregistrarea erorilor cu păstrarea contextului pentru a asigura o gestionare robustă a erorilor.</li>
                <li>Funcțiile ar trebui să primească toate dependențele ca parametrii și să nu se bazeze pe variabile globale. <b>Trebuie eliminate dependențele globale</b> astfel funcțiile sunt mai ușor de testat și sunt mai predictibile. Configurările, parametrii, serviciile și alte dependențe sunt inputuri explicite la funcții nu parametrii globali accesați din interiorul funcțiilor.</li>
            </ul>
        </x-important_box>
    </div>
</x-layout>
