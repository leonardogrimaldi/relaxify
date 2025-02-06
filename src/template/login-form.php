<meta itemprop="name" content="Login">
<h2 class="py-4 text-lg">Effettua l'accesso al tuo account</h2>
        <div class="bg-white shadow-md rounded-md w-full max-w-lg">
            <menu class="flex border-b">
                <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="accedi">Accedi</button></li>
                <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="registrati">Registrati</button></li>
            </menu>
            <?php if(isset($templateParams["erroreEmail"])): ?>
                <p><?php echo $templateParams["erroreEmail"]; ?></p>
            <?php endif; ?> 
            <section class="hidden p-6" data-tab-name="accedi">
                <h3 class="hidden">Accedi</h3>
                <form action="login.php?action=login" method="POST">
                    <?php if(isset($templateParams["erroreLogin"])): ?>
                        <p class="m-2"><?php echo $templateParams["erroreLogin"]; ?></p>
                    <?php endif; ?>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">E-mail:</label>
                        <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded p-2" placeholder="Inserisci la tua email"/>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password:</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded p-2" placeholder="Inserisci la tua password"/>
                    </div>
                    <button type="submit" class="w-full bg-blue text-white py-2 rounded hover:bg-darkBlue">Accedi</button>
                </form>
            </section>
            <section class="hidden p-6" data-tab-name="registrati">
                <h3 class="hidden">Registrati</h3>
                <form action="login.php?action=register" method="POST" id="form-registrazione">
                    <div class="mb-4">
                        <label for="nome" class="text-gray-700">Nome:</label>
                        <input type="text" id="nome" name="nome" class="w-full border border-gray-300 rounded p-2" placeholder="Inserisci il tuo nome"/>
                    </div>
                    <div class="mb-4">
                        <label for="cognome" class="text-gray-700">Cognome:</label>
                        <input type="text" id="cognome" name="cognome" class="w-full border border-gray-300 rounded p-2" placeholder="Inserisci il tuo cognome"/>
                    </div>
                    <div class="mb-4">
                        <label for="new-email" class="text-gray-700">Email:</label>
                        <input type="email" id="new-email" name="new-email" class="w-full border border-gray-300 rounded p-2" placeholder="Inserisci la tua email"/>
                    </div>
                    <div class="mb-4">
                        <label for="new-password" class="text-gray-700">Password:</label>
                        <input type="password" id="new-password" name="new-password" class="w-full border border-gray-300 rounded p-2" placeholder="Imposta una password"/>
                    </div>
                    <button type="submit" class="w-full bg-blue text-white py-2 rounded hover:bg-darkBlue">Registrati</button>
                </form>
            </section>
        </div>