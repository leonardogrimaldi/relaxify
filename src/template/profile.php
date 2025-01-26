<h2 class="py-4 text-lg">Area personale</h2>
<div class="bg-white shadow-md rounded-md w-full max-w-lg">
    <menu class="flex border-b">
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="dati">Dati personali</button></li>
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="ordini">Ordini</button></li>
        <li class="w-2/5 border-l-2"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md flex justify-center items-center" data-tab-name="notifiche">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                <span class="sr-only">Notifiche</span>
            </button></li>
    </menu>
    <section class="hidden p-6" data-tab-name="dati">
        <h3 class="sr-only">Dati personali</h3>
        <dl>
            <dt class="block text-gray-700">Nome:</dt>
            <dd class="w-full border border-gray-300 rounded p-2 mb-4"><?php echo $_SESSION["nome"] ?></dd>
            <dt class="block text-gray-700">Cognome:</dt>
            <dd class="w-full border border-gray-300 rounded p-2 mb-4"><?php echo $_SESSION["cognome"] ?></dd>
            <dt class="block text-gray-700">Email:</dt>
            <dd class="w-full border border-gray-300 rounded p-2"><?php echo $_SESSION["email"] ?></dd>
        </dl>
    </section>
    <section class="hidden p-3" data-tab-name="ordini">
        <h3 class="text-center">Ordini</h3>
        <?php
        foreach($templateParams["ordini"] as $ordine): ?>
        <article class="border border-gray-300 p-2 rounded border-b-2 relative">
            <dl>
                <div class="flex flex-row gap-x-1">
                    <dt>Ordine:</dt>
                    <dd>
                        <?php echo $ordine["ordineID"];?>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Stato:</dt>
                    <dd>
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
                <?php if($ordine["stato"] == 's') :?>
                <button type="button" class="bg-blue text-white py-2 rounded flex flex-row min-w-min px-3 h-10 text-lg items-center ml-auto mr-0 mt-2" data-codice-ordine="<?php echo $ordine["ordineID"];?>" onclick="tickReceived(this)">
                    <svg class="h-full mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Segna come ricevuto
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