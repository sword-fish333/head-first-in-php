<x-layout>
    <x-progress_bar/>

    <x-sidebar :sections="$sections"/>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="Teorema CAP"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <p class="indent-5">Teorema CAP este un concept fundamental în proiectarea sistemelor distribuite,
                    formulată de <b>Eric
                        Brewer</b> în anul 2000. Numele CAP provine de la cele trei proprietăți cheie:</p>
                <x-list>
                    <li><b>Consistency (Consistență)</b>
                        Toți clienții văd aceleași date în același timp, indiferent de nodul la care se conectează.
                        Exemplu: dacă un client scrie o valoare nouă, toți ceilalți clienți care citesc după acel moment
                        vor vedea acea valoare actualizată.
                    </li>

                    <li><b>Availability (Disponibilitate)</b>
                        Fiecare solicitare primește un răspuns (de succes sau eșec), chiar dacă unele noduri din sistem
                        au căzut.
                    </li>

                    <li><b>Partition Tolerance (Toleranță la partiționare)</b>
                        Sistemul continuă să funcționeze chiar și atunci când există pierderi de comunicație între
                        noduri (rețea împărțită / partitionată).
                    </li>
                    <x-definition class="mt-5">
                        Într-un sistem distribuit, nu este posibil să se garanteze simultan toate cele trei proprietăți:
                        <b>Consistență</b>, <b>Disponibilitate</b> și <b>Toleranță la partiționare</b>.
                        Poți alege doar două dintre ele la un moment dat.
                    </x-definition>
                    <x-line/>
                    <x-important_info>
                        Teorema CAP determină cum faci arhitectura unui sistem distribuit.
                    </x-important_info>
                </x-list>
            </x-info_box>
        </section>
        <x-subtitle title='Cele trei proprietăți explicate:' class="mt-5"/>
        <section id="consistency">
            <x-info_box>
                <x-section_title title="Consistență: Toată lumea vede același lucru" class="mb-1"/>
                <p>Consistența înseamnă că toate <b>nodurile</b> din un sistem distribuit au acces la aceleași date în
                    același
                    timp. Când scrii date pe un nod, orice citire ulterioară de pe orice alt nod va returna acea
                    valoare actualizată. Este ca și cum ai avea mai multe copii ale aceluiași document, care sunt
                    întotdeauna perfect sincronizate – în clipa în care modifici una, toate celelalte reflectă
                    instantaneu acea schimbare.</p>
                <x-example class="mt-4">
                    Dacă un utilizator își actualizează poza de profil în aplicația ta de social media, consistența
                    garantează că fiecare prieten care accesează acel profil va vedea imediat poza nouă, indiferent de
                    serverul de baze de date care gestionează cererea. Nu există confuzii, nici date vechi rămase
                    redundant(zombie data)–
                    toată lumea vede același lucru.
                </x-example>
            </x-info_box>

        </section>
        <section id="availability" class="scroll-mt-20">
            <x-info_box>
                <x-section_title title="Disponibilitate: Sistemul răspunde întotdeauna" class="mb-1"/>
                <p>Disponibilitatea înseamnă că sistemul rămâne <b>operațional</b> și răspunde <b>mereu</b>
                    solicitărilor. Fiecare request
                    primește un răspuns (chiar dacă acesta nu conține cele mai recente date). Sistemul nu se blochează,
                    nu dă <b>timeout</b> și nu refuză să răspundă – este mereu acolo când ai nevoie de el.</p>
                <x-example class="mt-4">
                    Gândește-te la disponibilitate ca la un magazin non-stop. Chiar dacă uneori nu au pe stoc anumite
                    produse sau casa de marcat funcționează mai lent, nu închid niciodată. Poți intra oricând și vei
                    primi un serviciu, chiar dacă nu este un serviciu perfect.
                </x-example>
            </x-info_box>
        </section>
        <section id="partition_tolerance" class="scroll-mt-20">
            <x-info_box>
                <x-section_title title="Toleranță la partiționare: Sistemul face față la problemele de rețea"
                                 class="mb-1"/>
                <p>Toleranța la partiționare reprezintă capacitatea sistemului de a continua să funcționeze chiar și
                    atunci când apar defecțiuni de rețea care împiedică unele noduri să comunice între ele. În lumea
                    reală, problemele de rețea sunt inevitabile – cabluri se pot rupe, routere pot ceda, centre de date
                    pot pierde conectivitatea. Toleranța la partiționare înseamnă că sistemul tău nu se prăbușește
                    complet atunci când apar astfel de defecțiuni.</p>
                <x-example class="mt-4">
                    Imaginează-ți că ai servere de baze de date în New York și Londra. Dacă se defectează cablul
                    transatlantic, aceste servere nu mai pot comunica între ele – sunt partiționate. Un sistem tolerant
                    la partiționare continuă să funcționeze în ambele locații, în ciuda acestei probleme de comunicare.
                </x-example>
            </x-info_box>
        </section>
        <section id="fundamental_tradeoff" class="scroll-mt-20">
            <x-important_box>
                <x-subtitle title='Compromisul fundamental:' class="mt-5"/>
                <x-important_info class="mt-3">
                    într-un sistem distribuit, toleranța la partiționare nu este cu adevărat opțională. Rețelele
                    eșuează. Nu e o chestiune de dacă, ci de când. Așadar, din punct de vedere practic, alegerea reală
                    în cazul unei partiționări de rețea este între consistență și disponibilitate.
                </x-important_info>
                <x-example class="mt-3">
                    Permite-mi să ilustrez acest lucru printr-un scenariu concret. Rulezi un site de e-commerce cu
                    servere de baze de date în mai multe regiuni. Are loc o partiționare a rețelei, separând serverele
                    din SUA de cele din Europa. Un client din Europa vrea să cumpere ultimul produs din stoc. Ce faci?
                    <x-list class="ml-3">
                        <li><p class="font-semibold">Dacă alegi Consistența în detrimentul Disponibilității (CP):</p>
                            Refuzi să procesezi comanda până când poți verifica cu toate serverele că produsul este
                            într-adevăr disponibil. Serverul din Europa returnează o eroare, spunând: „Momentan nu putem
                            procesa cererea dumneavoastră.”
                            Ai menținut <b>consistența</b> (nu vinzi mai mult decât ai în stoc), dar ai sacrificat
                            <b>disponibilitatea</b> (clientul nu poate finaliza comanda).
                        </li>
                        <li><p class="font-semibold">Dacă alegi Disponibilitatea în detrimentul Consistenței (AP):</p>
                            Procesezi comanda pe baza informațiilor locale de pe serverul din Europa. Clientul
                            finalizează cu succes achiziția.
                            Între timp, însă, un alt client din SUA ar putea cumpăra același „ultim” produs. Ai menținut
                            disponibilitatea (ambii clienți au putut cumpăra), dar ai sacrificat consistența (ai putea
                            să fi vândut mai mult decât ai).
                        </li>
                    </x-list>
                </x-example>
            </x-important_box>
        </section>
        <section id="practical_implementation" class="scroll-mt-20">
            <x-subtitle title='Implementare practică în PHP:' class="my-5"/>
            <x-section_title title="Implementare CP(Consistență + Toleranță la partiție)"
                             class="mb-1"/>
            <p>Când ai nevoie de consistență puternică, folosești replicare asincronă și <span class="extra-info"
                                                                                               data-info='„distributed locks” se referă la mecanisme de blocare folosite într-un sistem distribuit pentru a coordona accesul concurent la resurse partajate, cum ar fi înregistrările dintr-o bază de date.'>distributed locks</span>
            </p>
            <x-code_snippet>
                class StronglyConsistentInventoryService {
                private array $dbConnections;
                private DistributedLock $lock;

                public function purchaseItem(string $itemId, int $quantity): bool {
                // Acquire a distributed lock across all nodes
                // This ensures no other transaction can modify this item
                $lockAcquired = $this->lock->acquire("item_{$itemId}", timeout: 5);

                if (!$lockAcquired) {
                // Can't guarantee consistency right now
                throw new ServiceUnavailableException(
                "System temporarily unavailable. Please try again."
                );
                }

                try {
                // Check inventory across ALL database nodes
                // Must reach consensus before proceeding
                $availableQuantity = $this->getConsensusQuantity($itemId);

                if ($availableQuantity < $quantity) {
                return false;
                }

                // Update ALL nodes synchronously
                // If any node fails, the entire operation fails
                $this->updateAllNodes($itemId, $availableQuantity - $quantity);

                return true;

                } finally {
                $this->lock->release("item_{$itemId}");
                }
                }

                private function getConsensusQuantity(string $itemId): int {
                $quantities = [];

                // Query all database nodes
                foreach ($this->dbConnections as $region => $db) {
                try {
                $stmt = $db->prepare("SELECT quantity FROM inventory WHERE id = ?");
                $stmt->execute([$itemId]);
                $quantities[$region] = $stmt->fetchColumn();
                } catch (PDOException $e) {
                // If we can't reach a node, we can't guarantee consistency
                throw new ConsistencyException(
                "Cannot verify inventory state across all regions"
                );
                }
                }

                // All nodes must agree on the quantity
                if (count(array_unique($quantities)) > 1) {
                // Inconsistency detected! This shouldn't happen
                // but we need to handle it
                $this->resolveInconsistency($itemId, $quantities);
                }

                return min($quantities); // Use the most conservative value
                }
                }
            </x-code_snippet>
            <x-section_title title="Implementare AP(Disponibilitate + Toleranță la partiție)"
                             class="mb-1 mt-3"/>
            <p>Când prioritizezi disponibilitatea, accepți <b>consistență eventuală</b>:</p>
            <x-code_snippet>
                class HighlyAvailableInventoryService {
                private PDO $localDb;
                private EventQueue $eventQueue;

                public function purchaseItem(string $itemId, int $quantity): bool {
                // Work with local data only - no distributed locks
                // This ensures we can always respond quickly

                try {
                $this->localDb->beginTransaction();

                // Check local inventory only
                $stmt = $this->localDb->prepare(
                "SELECT quantity FROM inventory WHERE id = ? FOR UPDATE"
                );
                $stmt->execute([$itemId]);
                $available = $stmt->fetchColumn();

                if ($available >= $quantity) {
                // Update local database immediately
                $stmt = $this->localDb->prepare(
                "UPDATE inventory SET quantity = quantity - ? WHERE id = ?"
                );
                $stmt->execute([$quantity, $itemId]);

                // Queue an event to eventually sync with other nodes
                // This happens asynchronously - we don't wait for it
                $this->eventQueue->push(new InventoryChangedEvent(
                itemId: $itemId,
                change: -$quantity,
                timestamp: time(),
                nodeId: $this->getNodeId()
                ));

                $this->localDb->commit();
                return true;
                }

                $this->localDb->rollback();
                return false;

                } catch (PDOException $e) {
                $this->localDb->rollback();

                // Even if our local database has issues,
                // we might still try to serve from cache
                return $this->tryFromCache($itemId, $quantity);
                }
                }

                // This runs asynchronously to reconcile differences
                public function handleEventualConsistency(): void {
                $events = $this->eventQueue->getPendingEvents();

                foreach ($events as $event) {
                try {
                $this->syncWithOtherNodes($event);
                $this->resolveConflicts($event);
                } catch (NetworkPartitionException $e) {
                // Can't sync right now, will retry later
                // The system keeps running despite this
                $this->eventQueue->retryLater($event);
                }
                }
                }
                }
            </x-code_snippet>
        </section>
        <section id="additional_notes" class="scroll-mt-20">
            <x-important_box>
                <x-subtitle title='Detalii adiționale:' class="my-1"/>
                <x-list>
                    <li>MySql prioritizează <b>consistența</b>(CP-leaning)<br>
                        Când este configurat cu replicare <b>semi-sincronă</b>, se asigură că cel puțin o replică a primit
                        tranzacția înainte de a confirma comiterea acesteia:
                    </li>
                    <li>MongoDB (AP-leaning cu consistență ajustabilă)<br>
                        MongoDB este fascinant fiindcă îți permite să <b>ajustezi consistența</b> în funcție de
                        importanța
                        operației
                    </li>
                    <li>
                        La tranzacții financiare consistența nu este negociabilă.<b>(CP-leaning)</b>.
                        <br>
                        Mai bine respingi o plată decât să o procesezi de 2 ori.
                    </li>
                    <li>
                        Pentru conținut social disponibilitatea contează mai mult<b>(AP-leaning)</b>.
                        <br>Userii preferă să posteze imediat, chiar dacă prietenii lor vor vedea mai târziu.
                    </li>
                </x-list>
            </x-important_box>
        </section>

    </div>

</x-layout>
