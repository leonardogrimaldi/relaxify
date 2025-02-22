<div class="max-w-4xl bg-white shadow-md rounded-lg mt-2 mx-1 sm:ml-auto sm:mr-auto">
            <h2 class="text-xl font-bold text-gray-700 mb-6 text-center pt-3" itemprop="name">Checkout</h2>
            <div class="flex flex-col sm:flex-row ">
                <section class="sm:w-3/5 sm:border-r sm:pr-4">
                    <h3 class="text-center">Prodotti selezionati</h3>
                    <?php foreach($templateParams["prodotticarrello"] as $prodottocarrello): ?>
                        <article data-codice-articolo="<?php echo $prodottocarrello["prodottoID"] ?>" class="flex justify-between sm:justify-evenly border-2 p-1 rounded-md">
                            <img class="aspect-square rounded-lg" width="100" height="100" src="<?php echo IMG_ROOT . $prodottocarrello["immagine"] ?>" alt="<?php echo $prodottocarrello["nome"]; ?>">
                            <div class="flex flex-col justify-center items-center gap-y-2">
                                <h2 class="text-lg font-semibold text-gray-700"><?php echo $prodottocarrello["nome"]; ?></h2>
                                <p class="text-gray-500"><?php echo $prodottocarrello["prezzo"]; ?>€</p>
                                <p class="sr-only">Quantità:</p><span class="text-lg font-semibold"><?php echo $prodottocarrello["quantita"]; ?></span>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </section>
                <section class="sm:w-3/5 sm:border-r sm:pr-4">
                    <!-- Dati estratti dal DB -->
                    <h3 class="text-center">Dati acquirente</h3>
                    <article class="flex justify-between sm:justify-evenly">
                        <form action="#" method="POST" id="form-acquisto">
                            <div class="mb-4 ml-2">
                                <label for="nome" class="text-gray-700">Nome:</label>
                                <input type="text" id="nome" name="nome" disabled class="w-full border border-gray-300 rounded p-2" value="<?php echo $_SESSION["nome"] ?>"/>
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="cognome" class="text-gray-700">Cognome:</label>
                                <input type="text" id="cognome" name="cognome" disabled class="w-full border border-gray-300 rounded p-2" value="<?php echo $_SESSION["cognome"] ?>"/>
                                <p> </p>
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="indirizzo" class="text-gray-700">Indirizzo:</label>
                                <input type="text" id="indirizzo" name="indirizzo" disabled class="w-full border border-gray-300 rounded p-2" placeholder="Via dell'università 50" />
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="citta" class="text-gray-700">Città:</label>
                                <input type="text" id="citta" name="citta" disabled class="w-full border border-gray-300 rounded p-2" placeholder="Cesena" />
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="email" class="text-gray-700">Email:</label>
                                <input type="email" id="email" name="email" disabled class="w-full border border-gray-300 rounded p-2" value="<?php echo $_SESSION["email"] ?>"/>
                            </div>
                        </form>
                    </article>
                </section>
                <section class="sm:w-3/5 sm:border-r sm:pr-4">
                    <!-- Dati da inserire -->
                    <h3 class="text-center">Dati carta</h3>
                    <article class="flex justify-between sm:justify-evenly">
                        <form action="#" method="POST" id="form-pagamento">
                            <div class="mb-4 ml-2">
                                <label for="nometitolare" class="text-gray-700">Nome titolare</label>
                                <input type="text" id="nometitolare" name="nometitolare" class="w-full border border-gray-300 rounded p-2" value="<?php echo $_SESSION["nome"] . ' ' . $_SESSION["cognome"] ?>"/>
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="numerocarta" class="text-gray-700">Numero</label>
                                <input type="text" id="numerocarta" name="numerocarta" maxlength="16" class="w-full border border-gray-300 rounded p-2" />
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="scadenza" class="text-gray-700">Scadenza:</label>
                                <input type="month" id="scadenza" name="scadenza" class="w-full border border-gray-300 rounded p-2" />
                            </div>
                            <div class="mb-4 ml-2">
                                <label for="cvv" class="text-gray-700">CVV:</label>
                                <input type="text" id="cvv" name="cvv" maxlength="3" class="w-1/3 border border-gray-300 rounded p-2" />
                            </div>
                        </form>
                    </article>
                </section>
                <section class="mt-2 sm:mt-0 p-4 sm:mb-4 sm:mr-4 bg-gray-100 border-t sm:border-t-0 rounded-b-lg sm:rounded-t-lg shadow-md sm:w-2/5 sm:ml-4 h-min sm:self-start">
                    <form action="riepilogo_ordine.php" method="POST" id="checkout-form" class="needs-validation" novalidate="">
                        <h3 class="text-xl font-bold text-gray-700">Riepilogo</h3>
                        <dl class="flex justify-between text-lg mt-4">
                            <dt>Totale prodotti:</dt>
                            <dd id="totale-prodotti" class="font-semibold">0.00€</dd>
                        </dl>
                        <dl class="flex justify-between text-lg mt-4">
                            <dt>Totale spedizione:</dt>
                            <dd id="totale-spedizione" class="font-semibold">10.00€</dd>
                        </dl>
                        <dl class="flex justify-between text-lg mt-4">
                            <dt class="font-bold">TOTALE:</dt>
                            <dd id="totale" class="font-semibold">10.00€</dd>
                        </dl>
                        <button type="submit" class="mt-4 w-full bg-blue text-white py-3 rounded-lg hover:bg-darkBlue">Paga ora</button>
                        <input type="hidden" id="payed" name="payed" value="1">
                    </form>
                </section>
            </div>
        </div>