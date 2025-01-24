<h2 class="text-xl my-2">Dashboard Admin <?php echo $_SESSION["nome"] ?></h2>
<div class="bg-white shadow-md rounded-md w-full max-w-lg">
    <menu class="flex border-b">
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="prodotti">Prodotti</button></li>
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="ordini">Ordini</button></li>
    </menu>
    <section class="hidden p-3" data-tab-name="prodotti">
        <!-- Elemento dialog per la creazione di nuovi prodotti -->
        <dialog class="h-min p-6 max-w-md rounded-lg m-auto">
            <h2 class="text-center text-xl font-bold mb-4">Crea un nuovo prodotto</h2>
            <form action="../dashboard.php" method="post" class="flex flex-col">
                <div class="mb-1">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="w-full border border-gray-300 rounded p-2">
                        <option label=" "></option>
                        <option value="cubi">Cubi</option>
                        <option value="test">Test</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="prezzo">Prezzo</label>
                    <input type="number" name="prezzo" id="prezzo" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="quantita">Quantità</label>
                    <input type="number" name="quantita" id="quantita" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="descrizione">Descrizione</label>
                    <textarea name="descrizione" id="descrizione" class="w-full border border-gray-300 rounded p-2"></textarea>
                </div>
                <div class="mb-1">
                    <label for="immagine">Immagine</label>
                    <input type="file" id="immagine" name="immagine" class="w-full border border-gray-300 rounded p-2" accept="image/*" />
                </div>
                <div class="mb-1">
                    <label for="alt">Alt immagine</label>
                    <input type="text" id="alt" name="alt" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <input class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 mt-4" type="submit" value="Invia" />
                <button type="reset" class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 mt-4">Esci</button>
            </form>
        </dialog>
        <!-- Elemento dialog per la modifica prodotto -->
        <dialog id="modifyDialog" class="h-min p-6 max-w-md rounded-lg m-auto">
            <h2 class="text-center text-xl font-bold mb-4">Modifica o elimina il prodotto</h2>
            <form action="" method="post" class="flex flex-col">
                <div class="mb-1">
                    <label for="modify-codice">Codice articolo</label>
                    <input type="text" name="modify-codice" id="modify-codice" class="w-full border border-gray-300 rounded p-2" disabled />
                </div>
                <div class="mb-1">
                    <label for="modify-nome">Nome</label>
                    <input type="text" name="modify-nome" id="modify-nome" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="modify-categoria">Categoria</label>
                    <select name="modify-categoria" id="modify-categoria" class="w-full border border-gray-300 rounded p-2">
                        <option value="cubi">Cubi</option>
                        <option value="test">Test</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="modify-prezzo">Prezzo</label>
                    <input type="number" name="modify-prezzo" id="modify-prezzo" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="modify-quantita">Quantità</label>
                    <input type="number" name="modify-quantita" id="modify-quantita" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="modify-descrizione">Descrizione</label>
                    <textarea name="modify-descrizione" id="modify-descrizione" class="w-full border border-gray-300 rounded p-2"></textarea>
                </div>
                <div class="mb-1">
                    <label for="modify-immagine">Immagine</label>
                    <input type="file" id="modify-immagine" name="modify-immagine" class="w-full border border-gray-300 rounded p-2" accept="image/*" />
                </div>
                <div class="mb-1">
                    <label for="modify-alt">Alt immagine</label>
                    <input type="text" id="modify-alt" name="modify-alt" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <input class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 mt-4" type="submit" value="Salva" />
                <button type="reset" class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 mt-4" onclick="closeModifyDialog()">Esci</button>
                <button type="button" class="w-full bg-red-500 text-white py-2 rounded hover:bg-pink-600 mt-10" onclick="deleteProduct()">Elimina</button>
            </form>
        </dialog>
        <div class="text-center">
            <button id="create" type="button" class="p-3 bg-pink-500 text-white rounded w-3/4">Crea un nuovo prodotto</button>
        </div>
        <h3 class="text-center mt-4 mb-1">Prodotti presenti nello store</h3>
        <article class="flex flex-row pt-2 h-full border border-gray-300 rounded">
        <img class="aspect-square overflow-hidden" height="150" width="150" src="resources/img/cube.jpg" alt="Palla Antistress">
            <div class="flex flex-col h-full grow ml-2">
                <hgroup>
                    <h4 class="text-lg">Palla antistress</h4>
                    <p class="text-base">Categoria</p>
                </hgroup>
                <dl>
                    <div class="flex flex-row gap-x-1">
                        <dt><abbr class="no-underline" title="Codice articolo">Cod.</abbr></dt>
                        <dd>123456</dd>
                    </div>
                    <div class="flex flex-row gap-x-1">
                        <dt>Prezzo:</dt>
                        <dd><data value="10.53">10.53</data></dd>
                    </div>
                    <div class="flex flex-row gap-x-1">
                        <dt>Quantità:</dt>
                        <dd><data value="11">11</data></dd>
                    </div>
                </dl>
            </div>
            <div class="flex items-center justify-center">
                <button type="button" class="mx-2" onclick="openModifyDialog(this)" data-codice-articolo="1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <span class="sr-only">Modifica o elimina prodotto</span>
                </button>
            </div>
        </article>
    </section>
    <section class="hidden p-3" data-tab-name="ordini">
        <h3 class="text-center mb-1">Ordini ricevuti</h3>
        <article class="border border-gray-300 p-2 rounded border-b-2 relative">
            <dl>
                <div class="flex flex-row gap-x-1">
                    <dt>Ordine:</dt>
                    <dd>
                        <slot name="codice">Codice ordine</slot>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Stato:</dt>
                    <dd>
                        <slot name="stato">N/A</slot>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Indirizzo:</dt>
                    <dd>
                        <slot name="indirizzo">Via TEST</slot>
                    </dd>
                </div>
            </dl>
            <button class="absolute top-0 right-0 mr-2 mt-2" type="button" onclick="dropdownClicked(this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 rotate-0 transform transition-all duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                <span class="sr-only">Mostra i dettagli dell'ordine</span>
            </button>
            <div class="hidden">
                <section>
                    <h4 class="sr-only">Articoli presenti nell'ordine</h4>
                    <article class="flex flex-row mt-4 pt-2 border-t-2">
                        <div class="w-1/3">
                            <img class="aspect-square" src="resources/img/cube.jpg" alt="Palla Antistress">
                        </div>
                        <div class="flex flex-col h-full grow ml-2">
                            <hgroup>
                                <h3 class="text-lg">Palla antistress</h3>
                                <p class="text-base">Categoria</p>
                            </hgroup>
                            <dl>
                                <div class="flex flex-row gap-x-1">
                                    <dt><abbr class="no-underline" title="Codice articolo">Cod.</abbr></dt>
                                    <dd>123456</dd>
                                </div>
                                <div class="flex flex-row gap-x-1">
                                    <dt>Prezzo:</dt>
                                    <dd><data value="10.53">10.53</data></dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex flex-col h-full justify-start items-center p-2">
                            <abbr title="Quantità" class="no-underline">Qta</abbr>
                            <data value="11">11</data>
                        </div>
                    </article>
                </section>
                <button type="button" class="bg-teal-500 text-white py-2 rounded flex flex-row min-w-min px-3 h-10 text-lg items-center ml-auto mr-0 mt-2" data-codice-articolo="1" onclick="tickSent(this)">
                    <svg class="h-full mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Segna come inviato
                </button>
            </div>
        </article>
    </section>
</div>
<button onclick="window.location.href='logout.php';" type="submit" class="p-4 bg-pink-500 text-white py-2 rounded hover:bg-pink-600 mt-5">Log-out</button>