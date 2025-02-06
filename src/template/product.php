<div class="grow flex flex-col lg:flex-row items-center lg:items-start">
    <div class="invisible w-1/4"></div>
    <!-- Prodotto -->
    <section class="flex flex-col lg:items-center lg:w-2/4">
        <h2 class="text-center text-lg py-3 w-full" itemprop="name">Prodotto</h2>
        <article class="flex flex-col sm:flex-row items-center justify-center rounded-md p-5 shadow-md bg-white h-min w-full max-w-xs sm:max-w-xl"
            itemscope itemtype="https://schema.org/Product" itemprop="mainEntity">
            <?php foreach ($templateParams["prodottoid"] as $prodottoid): ?>
                <img class="aspect-square" width="300" height="300"
                    itemprop="image" alt="<?php echo $prodottoid["nome"]; ?>"
                    src="<?php echo IMG_ROOT . $prodottoid["immagine"]; ?>">
                <div class="text-center w-full sm:ml-2">
                    <header class="mt-2 flex flex-row justify-center items-center gap-x-4">
                        <h3 itemprop="name" class="text-lg font-semibold"><?php echo $prodottoid["nome"]; ?></h3>
                        <p class="text-lg" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><data itemprop="price" value="<?php echo $prodotto["prezzo"]; ?>"><?php echo $prodotto["prezzo"]; ?></data><meta itemprop="priceCurrency" content="EUR" />€
                        </p>
                    </header>
                    <p itemprop="description" class="text-center"><?php echo $prodottoid["descrizione"]; ?></p>
                    <div id="fixed-div" class="flex flex-row w-full fixed bottom-0 left-0 sm:left-auto sm:bottom-auto sm:static">
                        <button type="button" class="addToCart w-3/4 p-4 bg-blue text-white hover:bg-darkBlue sm:rounded-l-xl overflow-hidden" data-prodotto-id="<?php echo $prodottoid["prodottoID"]; ?>">Aggiungi al carrello</button>
                        <?php if (isUserLoggedIn()): ?>
                            <?php if (!in_array($prodottoid["prodottoID"], $templateParams["lista_preferiti"])): ?>
                                <button type="button" class="addToPreferred w-1/4 flex justify-center items-center sm:border-2 bg-blue text-white border-blue hover:border-darkBlue border-l border-l-darkBlue sm:rounded-r-xl overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9">
                                        <title>Preferiti</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                    <span class="sr-only">Aggiungi ai preferiti</span>
                                    <input type="hidden" class="prodottoID" value="<?php echo $prodottoid["prodottoID"]; ?>">
                                </button>
                            <?php else : ?>
                                <button type="button" class="removeFromPreferred w-1/4 flex justify-center items-center sm:border-2 bg-blue text-darkPink border-blue hover:border-darkBlue border-l border-l-darkBlue sm:rounded-r-xl overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9">
                                        <title>Preferiti</title>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                    <span class="sr-only">Rimuovi dai preferiti</span>
                                    <input type="hidden" class="prodottoID" value="<?php echo $prodottoid["prodottoID"]; ?>">
                                </button>
                            <?php endif; ?>
                        <?php else : ?>
                            <button onclick="window.location.href='./login.php'" type="button" class="w-1/4 flex justify-center items-center sm:border-2 bg-blue text-white border-blue hover:border-darkBlue"">
                                <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9">
                                <title>Preferiti</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span class="sr-only">Effettua prima il login</span>
                            </button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                </div>
        </article>
    </section>

    <?php require("suggestions.php"); ?>
</div>
<div id="cartMessage" class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-blue text-white text-center py-2 px-4 rounded shadow-lg hidden">
    Aggiunto al carrello!
</div>