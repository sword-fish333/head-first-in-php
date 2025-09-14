<?php

return [
    'acid' => [
        'title' => 'Principiile ACID',
        'intro' => [
            'definition' => 'Principiile ACID sunt fundamentale pentru înțelegerea modului în care bazele de date păstreză',
            'data_integrity' => 'integritatea datelor',
            'promise' => 'ACID reprezintă o "promisiune" de a păstra intrările din o bază de date în',
            'secure' => 'siguranță',
            'consistent' => 'consistente',
            'promise_continue' => ', chiar și atunci când apar erori. ACID este un acronim și fiecare literă reprezintă o garanție care protejează integritatea datele în un mod diferit.'
        ],
        'atomicity' => [
            'title' => 'Atomicitate - Principiul "totul sau nimic"',
            'description' => 'Atomicitatea asigură că o tranzacție este tratată ca o singură unitate indivizibilă. Imaginează-ți că transferi bani între conturi bancare. Trebuie să deduci dintr-un cont și să adaugi în altul. Dacă sistemul se blochează după deducere dar înainte de adăugare, atomicitatea asigură că întreaga tranzacție este',
            'rolled_back' => 'anulată(rolls back)',
            'description_continue' => ', prevenind dispariția banilor în neant.',
            'prevents' => 'Atomicitatea previne update-uri parțiale care ar lăsa sistemul în o stare invalidă.',
            'example' => 'În termeni practici, când construiești o platformă de e-commerce în PHP, atomicitatea înseamnă că atunci când un client plasează o comandă, fie toate aceste operațiuni reușesc împreună, fie toate eșuează împreună: crearea înregistrării comenzii, actualizarea stocului, procesarea plății și trimiterea email-ului de confirmare. Dacă plata eșuează, nu vrei să ai o comandă creată cu stoc redus dar fără plată colectată.'
        ],
        'consistency' => [
            'title' => 'Consistența - „Regulile nu sunt niciodată încălcate"',
            'description' => 'Consistența asigură că baza ta de date trece de la o stare validă la altă stare validă. Datele trebuie să satisfacă întotdeauna toate regulile, constrângerile și',
            'triggers' => 'trigger-ele(triggers)',
            'triggers_info' => 'Un trigger este un tip special de regulă care se execută automat când se întâmplă anumite modificări în baza de date.',
            'description_continue' => 'definite. De exemplu, dacă ai o regulă că balanța nu pot fi niciodată negativă, consistența asigură că această regulă nu este niciodată încălcată,',
            'not_even_temporarily' => 'nici măcar temporar',
            'description_end' => 'în timpul unei tranzacții.',
            'business_rules' => 'Se poate spune că consistența asigură că "business rules" nu sunt niciodată încălcate.',
            'example' => 'În o aplicație de social media unde ai o tabelă de postări și o tabelă de comentarii. Consistența asigură că fiecare comentariu trebuie să facă referire la o postare validă. Nu poți avea comentarii',
            'orphan' => 'orfane',
            'example_continue' => 'care indică către postări inexistente, chiar dacă mai mulți utilizatori șterg postări și adaugă comentarii simultan. Asta se poate realizare prin chei de indexare(foreign keys), de la commenturi la postări.'
        ],
        'isolation' => [
            'title' => 'Izolarea - Principiul „Spațiului de lucru privat"',
            'description' => 'Izolarea presupune că tranzacțiile realizate în paralel nu interferează unele cu altele. Fiecare tranzacție operează ca și cum ar fi singura care rulează în baza de date. Acest lucru este ca și cum ai avea mai multe persoane editând părți diferite ale unui document simultan fără să vadă modificările celorlalți până când acestea sunt complete.',
            'example' => 'Într-un sistem de rezervări, dacă doi utilizatori încearcă să rezerve ultimul loc disponibil simultan, izolarea asigură că doar unul reușește. Fără izolare adecvată, ambii ar putea citi că un loc este disponibil, ambii ar putea încerca să-l rezerve, și s-ar ajunge la o situație de supra-rezervare.'
        ],
        'durability' => [
            'title' => 'Durabilitatea - Principiul „Înregistrării permanente"',
            'description' => 'Odată ce o tranzacție este realizată',
            'committed' => '(committed)',
            'description_continue' => ', ea rămâne astfel, chiar dacă sistemul are o eroare fatală imediat după. Modificările sunt permanente, ele persistă și supraviețuiesc oricăror defecțiuni ulterioare. Acest lucru este realizat de obicei prin',
            'transaction_logs' => 'loguri de tranzacții (transaction logs)',
            'transaction_logs_info' => 'Un log de tranzacții este un fișier unde baza de date înregistrează fiecare modificare pe care urmează să o facă — înainte să o facă efectiv(principiul Write-Ahead Logging - WAL). Este un fel de "black box", o plasă de salvare.',
            'description_end' => 'care pot recrea tranzacțiile confirmate chiar și după o eroare gravă în baza de date.'
        ],
        'interview' => [
            'title' => 'Întrebări de interviu',
            'question1' => '1. Cum ai proceda în un scenariu în care trebuie să faci update la un inventar și să creezi o comandă simultan?',
            'answer1' => 'Iată cum aș aborda în PHP cu PDO: Aș încapsula toate operațiile în o tranzacție, pentru a asigura atomicitatea operațiilor. Întâi, aș începe o tranzacție, apoi aș efectua ambele operații într-un bloc try-catch. Dacă ceva eșuează, aș face rollback la întreaga tranzacție. Doar dacă ambele operații reușesc aș face',
            'commit' => 'commit',
            'answer1_continue' => '. Important în acest scenariu este că între verificarea disponibilității stocului și actualizarea acestuia, o altă tranzacție ar fi putut modifica stocul. Așa că aș folosi',
            'pessimistic_locking' => 'blocare pesimistă(pessimistic locking)',
            'pessimistic_locking_info' => '"Blocarea pesimistă" reprezintă strategia prin care o tranzacție blochează (lock) în mod explicit rândurile/tabelele pe care urmează să le citească sau scrie (de obicei cu SELECT ... FOR UPDATE) pentru a preveni ca alte tranzacții să modifice aceleași intrări până când tranzacția curentă e COMMIT/ROLLBACK. Ideea: presupui că va apărea conflict și previi conflictul înainte să apară.',
            'answer1_end' => 'cu SELECT FOR UPDATE pentru a bloca rândul de stoc în timp ce lucrez cu el, prevenind condițiile de cursă. Aceasta asigură izolarea între tranzacțiile concurente. De asemenea, aș implementa logică de reîncercare cu backoff exponențial pentru gestionarea deadlock-urilor, care pot apărea când mai multe tranzacții blochează resurse în ordini diferite. În plus, aș înregistra toate încercările și eșecurile de tranzacție pentru monitorizare și depanare.',
            'question2' => '2. Care este diferența între diferitele nivele de izolare și când ar trebui folosit fiecare?',
            'read_uncommitted' => 'READ UNCOMMITTED',
            'read_uncommitted_desc' => 'este cel mai scăzut nivel unde tranzacțiile pot vedea modificări neconfirmate din alte tranzacții. Acest lucru poate duce la citiri murdare, dar oferă cea mai bună performanță. L-aș lua în considerare doar pentru interogări de raportare necritice unde datele aproximative sunt acceptabile.',
            'read_committed' => 'READ COMMITTED',
            'read_committed_desc' => 'previne citirile murdare - vezi doar datele confirmate. Totuși, ai putea obține rezultate diferite dacă rulezi aceeași interogare de două ori într-o tranzacție, cunoscut ca citiri nerepetabile. Acesta este implicit-ul MySQL InnoDB și funcționează bine pentru majoritatea aplicațiilor web.',
            'repeatable_read' => 'REPEATABLE READ',
            'repeatable_read_desc' => 'asigură că dacă citești un rând, nu se va schimba în timpul tranzacției tale. Totuși, rânduri noi pot apărea, cauzând citiri fantomă. Este util pentru rapoarte care au nevoie de instantanee consistente ale datelor.',
            'serializable' => 'SERIALIZABLE',
            'serializable_desc' => 'este cel mai înalt nivel, prevenind toate fenomenele prin rularea esențială secvențială a tranzacțiilor. L-aș folosi pentru operații financiare critice unde consistența absolută este necesară, deși vine cu un cost semnificativ de performanță.',
            'conclusion' => 'În practică, am constatat că',
            'conclusion_continue' => 'funcționează pentru aproximativ 95% din cazurile de utilizare în aplicațiile PHP web tipice. Pentru restul de 5% - de obicei implicând bani sau stoc - folosesc selectiv nivele de izolare mai mari sau strategii explicite de blocare.'
        ]
    ]
];
