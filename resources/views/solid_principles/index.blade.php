<x-layout>

    <!-- Main Content -->
    <div class="container mx-auto py-10 lg:pl-72">
        <x-page_header backRoute="/" title="SOLID"/>


        <!-- Introduction Section -->
        <section id="definition" class="scroll-mt-20">
            <x-info_box>
                <p><b>SOLID</b> este un acronim care reprezintă cinci principii fundamentale ale programării orientate pe obiect
                    care ajută la crearea unui software mai ușor de întreținut, mai flexibil și mai scalabil. Aceste
                    principii au fost introduse de Robert C. Martin (Uncle Bob) și au devenit fundamentale pentru o
                    arhitectură software bună. Sunt principii care ajută la evitarea erorilor
                    comune în designul software, previne <b>"spaghetti code"</b> și ajută la dezvoltarea unui software robust și scalabil.</p>
                <x-definition class="mt-5">
                    Într-un sistem distribuit, nu este posibil să se garanteze simultan toate cele trei proprietăți:
                    <b>Consistență</b>, <b>Disponibilitate</b> și <b>Toleranță la partiționare</b>.
                    Poți alege doar două dintre ele la un moment dat.
                </x-definition>
            </x-info_box>
        </section>

    </div>

</x-layout>
