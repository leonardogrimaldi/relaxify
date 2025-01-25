<div class="grow flex flex-col">
    <!-- Prodotto -->
    <article class="flex flex-col sm:flex-row items-center justify-center rounded-md p-5 shadow-md bg-white h-min w-full max-w-xs sm:max-w-xl">
        <?php foreach ($templateParams["prodottoid"] as $prodottoid): ?>
            <img width="300" height="300"
                itemprop="image" alt="<?php echo $prodottoid["nome"]; ?>"
                src="<?php echo IMG_ROOT . $prodottoid["immagine"]; ?>">
            <div class="text-center">
                <header class="mt-2">
                    <h3 class="text-lg font-semibold"><?php echo $prodottoid["nome"]; ?></h3>
                </header>
                <p class="text-center"><?php echo $prodottoid["descrizione"]; ?></p>
                <div id="fixed-div" class="flex flex-row w-full fixed bottom-0 left-0 sm:left-auto sm:bottom-auto sm:static">
                    <button type="button" class="w-3/4 p-4 bg-red-500" data-codice-articolo="1" onclick="addToCart(this)">Aggiungi al carrello</button>
                    <button type="button" class="w-1/4 bg-blue-500 flex justify-center items-center" data-codice-articolo="1" onclick="addToFavorites(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-9">
                            <title>Preferiti</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span class="sr-only">Aggiungi ai preferiti</span>
                    </button>
                <?php endforeach; ?>
                </div>
            </div>
    </article>
    <?php require("suggestions.php"); ?>
</div>