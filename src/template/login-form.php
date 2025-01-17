<h2 class="py-4 text-lg">Effettua l'accesso al tuo account</h2>
        <div class="bg-white shadow-md rounded-md w-full max-w-lg">
            <menu class="flex border-b">
                <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="accedi">Accedi</button></li>
                <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="registrati">Registrati</button></li>
            </menu>
            <section class="hidden p-6" data-tab-name="accedi">
                <h3 class="hidden">Accedi</h3>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">E-mail:</label>
                        <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded p-2"/>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password:</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded p-2" />
                    </div>
                    <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600">Accedi</button>
                </form>
            </section>
            <section class="hidden p-6" data-tab-name="registrati">
                <h3 class="hidden">Registrati</h3>
                <form action="#" method="POST" id="form-registrazione">
                    <div class="mb-4">
                        <label for="nome" class="text-gray-700">Nome:</label>
                        <input type="text" id="nome" name="nome" class="w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mb-4">
                        <label for="cognome" class="text-gray-700">Cognome:</label>
                        <input type="text" id="cognome" name="cognome" class="w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mb-4">
                        <label for="new-email" class="text-gray-700">Email:</label>
                        <input type="email" id="new-email" name="new-email" class="w-full border border-gray-300 rounded p-2" />
                    </div>
                    <div class="mb-4">
                        <label for="new-password" class="text-gray-700">Password:</label>
                        <input type="password" id="new-password" name="new-password" class="w-full border border-gray-300 rounded p-2" />
                    </div>
                    <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600">Registrati</button>
                </form>
            </section>
        </div>