<x-layout>
    <div class="container mx-auto py-10">
        <x-page_header backRoute="{{str_contains(url()->previous(),'oop-foundation')?'/oop-foundation':'/'}}" title="Programare procedurală"/>
        <x-info_box>
            Programarea procedurală organizează codul ca o colecție de funcții care operează cu date, având o abordare
            <b>pas cu pas</b> la rezolvarea de probleme.
            Programarea procedurală excelează în scenarii care necesită manipularea directă de date. E utilă pentru <b>pipelinuri
                de manipulare de date</b>, <b>scripturi</b>,
            <b>API endpoints</b>
        </x-info_box>
        <x-important_box>
            Spre deosebire de OOP, codul procedural separă datele de funcțiile care le manipulează. Astfel se creează
            flow-uri de execuție liniare care sunt mult mai ușor de urmărit și de făcut debug.
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
            <p>Compunerea de funcții presupune separearea logicii flow-ului de execuție în funcții mai simple și
                compacte. Astfel că implementarea este separată în mai multe funcții care apoi sunt date ca parametru la
                alte funcții. În felul acesta se creează un un <b>pipeline de execuție fluent</b>.</p>
        </x-important_box>
        <h4 class="mt-10">Exemplu și explicații pentru compunerea de funcții:</h4>
        <x-code_snippet>
            // Funcții simple de transformare
            function addTen($number) {
            return $number + 10;
            }

            function double($number) {
            return $number * 2;
            }

            function square($number) {
            return $number * $number;
            }

            // Compunere manuală - nu foarte elegantă
            $result = square(double(addTen(5))); // (5 + 10) * 2 = 30, then 30² = 900
            echo $result; // Output: 900

            //Deși funcționează, citirea apelurilor de funcții imbricate de la dreapta la stânga poate fi confuză, mai
            ales pe măsură ce numărul funcțiilor crește. Aici intervine compoziția corectă a funcțiilor.

            // O funcție simplă de compunere care combină 2 funcții
            function compose($f, $g) {
            return function($x) use ($f, $g) {
            return $f($g($x));
            };
            }
            //Aici este folosită o funcție anonimă, un callback pentru a ține minte funcția care vrem să o cumpunem.

            // exemplu de utilizare
            $addTenThenDouble = compose('double', 'addTen');
            echo $addTenThenDouble(5); // Output: 30

            //Exemplu de compunere dinamic, care acceptă un număr nedefinit de funcții
            function composeMultipleFunctions(...$functions) {
            return function($input) use ($functions) {
            // array_reduce processes the functions from left to right,
            // but we reversed them to get right-to-left composition
            return array_reduce(
            array_reverse($functions),
            function($carry, $function) {
            return $function($carry);
            },
            $input
            );
            };
            }

            // Astfel se pot compune mai multe funcții elegant
            $processNumber = composeMultipleFunctions('square', 'double', 'addTen');
            echo $processNumber(5); // Output: 900
            //composeMultipleFunctions este o funcție variadică care acceptă un număr variabil de argumente.

            //Uneori e mai simplu să te gândești la execuția logicii de la stânga la dreapta. În cazul acesta "pipe" se
            folosește. "Pipe" nu este altceva decât compunere de funcții în ordine inversă.
            // Funcție pipe de la stânga la dreapta
            function pipe(...$functions) {
            return function($input) use ($functions) {
            return array_reduce(
            $functions,
            function($carry, $function) {
            return $function($carry);
            },
            $input
            );
            };
            }
        </x-code_snippet>
        <h4 class="mt-10">Exemplu empiric de procesare de date secvențial:</h4>
        <x-code_snippet>
            // Transformări individuale de funcții
            function trim_values($data) {
            return array_map('trim', $data);
            }

            function filter_empty($data) {
            return array_filter($data, function($value) {
            return !empty($value);
            });
            }

            function normalize_email($data) {
            if (isset($data['email'])) {
            $data['email'] = strtolower($data['email']);
            }
            return $data;
            }

            function add_timestamp($data) {
            $data['processed_at'] = date('Y-m-d H:i:s');
            return $data;
            }

            function validate_required($required_fields) {
            return function($data) use ($required_fields) {
            foreach ($required_fields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
            throw new Exception("Missing required field: $field");
            }
            }
            return $data;
            };
            }

            // Create a processing pipeline
            $processUserData = pipe(
            'trim_values',
            'filter_empty',
            'normalize_email',
            validate_required(['name', 'email']),
            'add_timestamp'
            );

            // Use the pipeline
            try {
            $rawData = [
            'name' => ' John Doe ',
            'email' => ' JOHN@EXAMPLE.COM ',
            'phone' => ' ',
            'address' => '123 Main St'
            ];

            $processedData = $processUserData($rawData);
            print_r($processedData);
            } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            }
        </x-code_snippet>
        <x-important_box>
            Compunerea de funcții e o cale de a înțelege sistemul ca o serie de transformări în loc să îl privești ca o
            serie de <b>pași imperativi</b> executați liniar.
            Promovează scrierea de logică software în funcții cât mai simple și clare cu o singură responsabilitate care
            sunt ușor de compus pentru ca sistemul să fie cât mai ușor de întreținut și extins.
        </x-important_box>
        <x-important_box>
            <x-subtitle title="Standarde pentru cod procedural în producție" class="my-5"/>

            <ul class="list-disc pl-5">
                <li>
                    Ar trebui folosit <b>declare(strict_types=1)</b>
                    în partea de sus a fișierului asigurând predictibilitatea workflow-ului. Prin declararea <b>declare(strict_types=1)</b>
                    la începutul fișierului tipurile argumentelor funcțiilor și tipul de date returnare trebuie
                    declarat.
                </li>
                <li>Funcțiile trebuie organizate modular astfel încât base code-ul e organizat și lizibil. Funcțiile
                    înrudite ar trebui grupate în fișiere, cu <b>convenții clare de denumire</b> și <b>responsabilități
                        unice</b>. Fiecare funcție ar trebui să aibă o <b>singură responsabilitate</b>. Să primească
                    date de intrare, să nu aibă side-effects puține sau chiar deloc. Și să întoarcă output predictibil.
                </li>
                <li>Gestionarea erorilor prin excepții înlocuiește codurile de eroare tradiționale și rezultatul de tip
                    boolean. PHP-ul procedural modern folosește <b>blocuri try-catch</b>, ierarhii de excepții specifice
                    și înregistrarea erorilor cu păstrarea contextului pentru a asigura o gestionare robustă a erorilor.
                </li>
                <li>Funcțiile ar trebui să primească toate <b>dependențele ca parametrii</b> și să nu se bazeze pe variabile
                    globale. <b>Trebuie eliminate dependențele globale</b> astfel funcțiile sunt mai ușor de testat și
                    sunt mai predictibile. Configurările, parametrii, serviciile și alte dependențe trebuie să fie date
                    de intrare explicite ale funcțiilor nu parametrii globali accesați din interiorul funcțiilor.
                </li>
            </ul>
        </x-important_box>
    </div>
</x-layout>
