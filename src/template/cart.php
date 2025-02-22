<div class="max-w-xs sm:max-w-2xl bg-white shadow-md rounded-lg sm:ml-auto sm:mr-auto w-full">
    <h2 class="text-xl font-bold text-gray-700 mb-6 text-center pt-3" itemprop="name">Carrello</h2>
    <div class="flex flex-col sm:flex-row sm:mb-4">
        <p class="text-center hidden mb-4" id="emptyText">Il tuo carrello Relaxify è vuoto. Vai alla <a class="font-medium text-darkBlue underline hover:no-underline" href="./index.php">homepage</a> per visualizzare gli articoli presenti nello store!</p>
        <section class="sm:w-3/5 sm:border-r sm:px-4 mx-1 flex flex-col">
            <h3 class="text-center sr-only">Prodotti aggiunti</h3>
            <?php foreach($templateParams["prodotticarrello"] as $prodottocarrello): ?>
                <article data-codice-articolo="<?php echo $prodottocarrello["prodottoID"]; ?>" class="flex justify-between sm:justify-evenly border-2 p-1 rounded-md">
                    <img class="aspect-square rounded-lg" width="100" height="100" src="<?php echo IMG_ROOT . $prodottocarrello["immagine"] ?>" alt="<?php echo $prodottocarrello["nome"]; ?>">
                    <div class="flex flex-col justify-center items-center gap-y-2 w-full">
                        <a href="prodotto.php?id=<?php echo $prodottocarrello['prodottoID'] ?>" class="block">
                            <h2 class="text-lg font-semibold text-gray-700"><?php echo $prodottocarrello["nome"]; ?></h2>
                            <p class="text-gray-500"><?php echo $prodottocarrello["prezzo"]; ?>€</p>
                        </a>
                        <div class="flex items-center justify-center gap-x-4 w-full">
                            <button data-prodotto-id="<?php echo $prodottocarrello["prodottoID"]; ?>" data-codice-articolo="<?php echo $prodottocarrello["prodottoID"]; ?>" onclick="decreaseQuantity(this)" type="button" class="decreaseFromCart bg-blue text-white p-2 rounded-lg hover:bg-darkBlue">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>
                            <p class="sr-only">Quantità:</p><span class="text-lg font-semibold"><?php echo $prodottocarrello["quantita"];?></span>
                            <button data-prodotto-id="<?php echo $prodottocarrello["prodottoID"]; ?>" data-codice-articolo="<?php echo $prodottocarrello["prodottoID"]; ?>" onclick="incrementQuantity(this)" type="button" class="increaseProductCart bg-blue text-white p-2 rounded-lg hover:bg-darkBlue">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button data-prodotto-id="<?php echo $prodottocarrello["prodottoID"]; ?>" data-codice-articolo="<?php echo $prodottocarrello["prodottoID"]; ?>" onclick="removeItem(this)" type="button" class="removeFromCart bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
        <section class="mt-2 sm:mt-0 p-4 sm:mb-4 sm:mr-4 bg-gray-100 border-t sm:border-t-0 rounded-b-lg sm:rounded-t-lg shadow-md sm:w-2/5 sm:ml-4 h-min sm:self-start">
            <h3 class="text-xl font-bold text-gray-700">Riepilogo</h3>
            <dl class="flex justify-between text-lg mt-4">
                <dt class="font-bold">TOTALE PRODOTTI:</dt>
                <dd id="totale" class="font-semibold">0.00€</dd>
            </dl>
            <?php if(!empty($templateParams["prodotticarrello"])): ?>
                <button onclick="window.location.href='checkout.php'" type="button" class="mt-4 w-full bg-blue text-white py-3 rounded-lg hover:bg-darkBlue">
                    Procedi all'ordine
                </button>
            <?php else: ?>
                <button onclick="window.location.href='index.php'" type="button" class="mt-4 w-full bg-blue text-white py-3 rounded-lg hover:bg-darkBlue"">
                Aggiungi prodotti al carrello prima di procedere al checkout!
                </button>
            <?php endif; ?>
        </section>
    </div>
</div>
<div id="cartRemoveMessage" class="fixed bottom-8 left-1/2 transform -translate-x-1/2 bg-blue text-white text-center py-2 px-4 rounded shadow-lg hidden">
    Rimosso dal carrello!
</div>