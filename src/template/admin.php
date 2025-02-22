<h2 class="text-xl my-2" itemprop="name">Dashboard Admin <?php echo $_SESSION["nome"] ?></h2>
<div class="bg-white shadow-md rounded-md w-full max-w-lg">
    <menu class="flex border-b">
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="prodotti">Prodotti</button></li>
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="ordini">Ordini</button></li>
        <li class="w-2/5 border-l-2">
            <button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md flex justify-center items-center" data-tab-name="notifiche">
                <span class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    <svg id="notificationCircle" class="absolute top-0 right-0 hidden" width="10" height="10" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="5" cy="5" r="5" fill="red" />
                    </svg>
                </span>
                <span class="sr-only">Notifiche</span>
            </button>
        </li>
    </menu>
    <section class="hidden p-3" data-tab-name="prodotti">
        <!-- Elemento dialog per la creazione di nuovi prodotti -->
        <dialog class="h-min p-6 max-w-md rounded-lg m-auto">
            <h2 class="text-center text-xl font-bold mb-4">Crea un nuovo prodotto</h2>
            <form action="../dashboard.php" method="post" class="flex flex-col" enctype="multipart/form-data">
                <div class="mb-1">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="w-full border border-gray-300 rounded p-2" required/>
                </div>
                <div class="mb-1">
                    <label for="categoriaID">Categoria</label>
                    <select name="categoriaID" id="categoriaID" class="w-full border border-gray-300 rounded p-2" required>
                        <option label=" "></option>
                        <?php foreach ($templateParams["categorie"] as $categoria):
                        ?>
                            <option value="<?php echo $categoria["categoriaID"]; ?>"><?php echo $categoria["nome"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="prezzo">Prezzo</label>
                    <input type="number" name="prezzo" id="prezzo" class="w-full border border-gray-300 rounded p-2" required/>
                </div>
                <div class="mb-1">
                    <label for="quantita">Quantità</label>
                    <input type="number" name="quantita" id="quantita" class="w-full border border-gray-300 rounded p-2" required/>
                </div>
                <div class="mb-1">
                    <label for="descrizione">Descrizione</label>
                    <textarea name="descrizione" id="descrizione" class="w-full border border-gray-300 rounded p-2" required></textarea>
                </div>
                <div class="mb-1">
                    <label for="immagine">Immagine</label>
                    <input type="file" id="immagine" name="immagine" class="w-full border border-gray-300 rounded p-2" accept="image/*" required/>
                </div>
                <input class="w-full bg-blue text-white py-2 rounded hover:bg-darkBlue mt-4" type="submit" value="Invia" name="nuovoProdotto" />
                <button type="reset" class="w-full bg-blue text-white py-2 rounded hover:bg-darkBlue mt-4">Esci</button>
            </form>
        </dialog>
        <!-- Elemento dialog per la modifica prodotto -->
        <dialog id="modifyDialog" class="h-min p-6 max-w-md rounded-lg m-auto">
            <h2 class="text-center text-xl font-bold mb-4">Modifica o elimina il prodotto</h2>
            <form action="../dashboard.php" method="post" class="flex flex-col" enctype="multipart/form-data">
                <div class="mb-1">
                    <label for="modify-prodottoID">Codice articolo</label>
                    <input type="text" name="modify-prodottoID" id="modify-prodottoID" class="w-full border border-gray-300 rounded p-2 bg-gray-100" readonly="readonly" />
                </div>
                <div class="mb-1">
                    <label for="modify-nome">Nome</label>
                    <input type="text" name="modify-nome" id="modify-nome" class="w-full border border-gray-300 rounded p-2" />
                </div>
                <div class="mb-1">
                    <label for="modify-categoriaID">Categoria</label>
                    <select name="modify-categoriaID" id="modify-categoriaID" class="w-full border border-gray-300 rounded p-2">
                        <option label=" "></option>
                        <?php foreach ($templateParams["categorie"] as $categoria):
                        ?>
                            <option value="<?php echo $categoria["categoriaID"]; ?>"><?php echo $categoria["nome"]; ?></option>
                        <?php endforeach; ?>
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
                <input class="w-full bg-blue text-white py-2 rounded hover:bg-darkBlue mt-4" type="submit" value="Salva" name="salvaModifiche" />
                <button type="reset" class="w-full bg-blue text-white py-2 rounded hover:bg-darkBlue mt-4" onclick="closeModifyDialog()">Esci</button>
                <input type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-darkBlue mt-10" name="eliminaProdotto" value="Elimina" />
            </form>
        </dialog>
        <div class="text-center">
            <button id="create" type="button" class="p-3 bg-blue text-white rounded w-3/4">Crea un nuovo prodotto</button>
        </div>
        <h3 class="text-center mt-4 mb-1">Prodotti presenti nello store</h3>
        <?php
        foreach ($templateParams["prodotti"] as $prodotto):
        ?>
            <article class="flex flex-row pt-2 h-full border border-gray-300 rounded">
                <div class="flex items-center">
                    <img class="aspect-square overflow-hidden ml-1" height="100" width="100" src="<?php echo IMG_ROOT . $prodotto["immagine"]; ?>" alt="<?php echo $prodotto["nome"]; ?>">
                </div>
                <div class="flex flex-col h-full grow ml-2">
                    <hgroup>
                        <h4 class="text-lg"><?php echo $prodotto["nome"]; ?></h4>
                        <p class="text-base"><abbr title="Categoria" class="no-underline">Cat.</abbr> <?php echo $prodotto["categoria"]; ?></p>
                    </hgroup>
                    <dl>
                        <div class="flex flex-row gap-x-1">
                            <dt><abbr class="no-underline" title="Codice articolo">Cod.</abbr></dt>
                            <dd><?php echo $prodotto["prodottoID"]; ?></dd>
                        </div>
                        <div class="flex flex-row gap-x-1">
                            <dt>Prezzo:</dt>
                            <dd><data value="<?php echo $prodotto["prezzo"]; ?>"><?php echo $prodotto["prezzo"]; ?></data>€</dd>
                        </div>
                    </dl>
                </div>
                <div class="flex items-center justify-center">
                    <button type="button" class="mx-2" onclick="openModifyDialog(this)" data-codice-articolo="<?php echo $prodotto["prodottoID"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span class="sr-only">Modifica o elimina prodotto</span>
                    </button>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <section class="hidden p-3" data-tab-name="ordini">
        <h3 class="sr-only">Ordini</h3>
        <?php
        foreach($templateParams["ordini"] as $ordine): ?>
        <article class="border border-gray-300 p-2 rounded border-b-2 relative">
            <h4 class="sr-only">Numero ordine: <?php echo $ordine["ordineID"];?></h4>
            <dl>
                <div class="flex flex-row gap-x-1">
                    <dt>Ordine:</dt>
                    <dd>
                        <?php echo $ordine["ordineID"];?>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Stato:</dt>
                    <dd data-codice-ordine="<?php echo $ordine["ordineID"];?>">
                        <?php
                        switch($ordine["stato"]) {
                            case "s": 
                                echo "Spedito";
                                break;
                            case "p": 
                                echo "Pagato";
                                break;
                            case "r": 
                                echo "Ricevuto";
                                break;
                            default: echo "N/A";
                        }
                        ?>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Indirizzo:</dt>
                    <dd>
                        Via dell'Università 50, Cesena
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
                    <?php
                     $items = $dbh->getItemsInOrder($ordine["ordineID"]);
                     foreach($items as $item) :
                    ?>
                    <article class="flex flex-row mt-4 pt-2 border-t-2">
                        <div class="w-1/3">
                            <img class="aspect-square" src="<?php echo IMG_ROOT. $item["immagine"];?>" alt="Palla Antistress">
                        </div>
                        <div class="flex flex-col h-full grow ml-2">
                            <hgroup>
                                <h3 class="text-lg"><?php echo $item["nome"];?></h3>
                                <p class="text-base"><?php echo $item["categoria"];?></p>
                            </hgroup>
                            <dl>
                                <div class="flex flex-row gap-x-1">
                                    <dt><abbr class="no-underline" title="Codice articolo">Cod.</abbr></dt>
                                    <dd><?php echo $item["prodottoID"];?></dd>
                                </div>
                                <div class="flex flex-row gap-x-1">
                                    <dt>Prezzo:</dt>
                                    <dd><data value="<?php echo $item["prezzo"];?>"><?php echo $item["prezzo"];?></data></dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex flex-col h-full justify-start items-center p-2">
                            <abbr title="Quantità" class="no-underline">Qta</abbr>
                            <data value="<?php echo $item["quantita"];?>"><?php echo $item["quantita"];?></data>
                        </div>
                    </article>
                    <?php endforeach;?>
                </section>
                <?php if($ordine["stato"] == 'p') :?>
                <button type="button" class="bg-blue text-white py-2 rounded flex flex-row min-w-min px-3 h-10 text-lg items-center ml-auto mr-0 mt-2" data-codice-ordine="<?php echo $ordine["ordineID"];?>" onclick="tickSent(this)">
                    <svg class="h-full mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Segna come spedito
                </button>
                <?php endif;?>
            </div>
        </article>
        <?php endforeach;?>
    </section>
    <section class="hidden p-3" data-tab-name="notifiche">
        <h3 class="text-center mb-1">Notifiche</h3>
        <template id="notification-template">
            <article class="border border-gray-300 p-2 rounded border-b-2">
                <p><slot name="data"></slot></p>
                <p><slot name="text"></slot></p>
                <button type="button" class="bg-blue text-white py-2 rounded flex flex-row min-w-min px-3 h-10 text-lg items-center ml-auto mr-0 mt-2" data-codice-notifica="" onclick="tickRead(this)">
                    <svg class="h-full mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Segna come letta
                </button>
            </article>
        </template>
    </section>
</div>
<button onclick="window.location.href='logout.php';" type="submit" class="p-4 bg-blue text-white py-2 rounded hover:bg-darkBlue mt-5">Log-out</button>