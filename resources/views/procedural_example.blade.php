<x-layout>
    <div class="container mx-auto pt-10">
        <h1 class="text-4xl font-semibold text-blue-950 underline text-center mb-10">Programare procedurală</h1>
        <x-info_box>
            Programarea procedurală organizează codul ca o colecție de funcții care operează cu date, având o abordare
            pas cu pas la rezolvarea de probleme.
            Programarea procedurală excelează în scenarii care necesită manipularea directă de date. E utilă pentru <b>pipelinuri
                de manipulare de date</b>, <b>scripturi</b>,
            <b>API endpoints</b>
        </x-info_box>
        <h4 class="mt-10">Exemplu de programare procedurală:</h4>
        <code class="code-snippet">
            // Modern procedural function with best practices
            function create_user_account(
            array $user_data,
            PDO $database,
            Logger $logger,
            UserValidator $validator
            ): array {
            $logger->info('Creating user account', ['email' => $user_data['email']]);

            try {
            $validated_data = $validator->validate($user_data);
            $hashed_password = password_hash($validated_data['password'], PASSWORD_ARGON2ID);

            $user_record = insert_user_record($database, [
            ...$validated_data,
            'password' => $hashed_password,
            'created_at' => time(),
            ]);

            $logger->info('User account created successfully', ['user_id' => $user_record['id']]);
            return $user_record;

            } catch (ValidationException $e) {
            $logger->warning('User validation failed', ['error' => $e->getMessage()]);
            throw new UserCreationException('Invalid user data: ' . $e->getMessage(), previous: $e);
            } catch (DatabaseException $e) {
            $logger->error('Database error during user creation', ['error' => $e->getMessage()]);
            throw new UserCreationException('Failed to create user account', previous: $e);
            }
            }
        </code>
        <x-important_box>
         <h4>Concepte avansate de programare procedurală</h4>
            <ul class="list-disc pl-5">
                <li>compunearea de funcții: reprezintă logică sofisticată de transformare a datelor fără ierarhii de obiecte. Funcțiile de ordin superior pot crea lanțuri de procesare reutilizabile care transformă datele prin mai multe etape.</li>
                <li>state management</li>
                <li>arhitectură modulară</li>
            </ul>
        </x-important_box>
    </div>
</x-layout>
