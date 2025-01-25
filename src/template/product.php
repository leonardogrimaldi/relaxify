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
    <aside class="flex flex-col items-center">
        <h2 class="text-center text-lg py-3">Suggerimenti</h2>
        <div id="prodotti" class="grid grid-cols-2 gap-x-3 gap-y-3 my-2 mx-2 grow content-start">
            <article class="bg-white rounded-lg flex flex-col overflow-hidden">
                <img height="150" width="150" onclick="window.location.href='product.html'" src="resources/img/cube.jpg"
                    alt="Cubo Antistress">
                <section onclick="window.location.href='product.html'" class="text-center h-full flex flex-col">
                    <h2 class="text-lg font-medium text-gray-700">Cubo Antistress</h2>
                    <div class="flex flex-row justify-center items-center gap-x-2 py-2">
                        <button aria-label="Aggiungi ai preferiti"
                            class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                        <div>
                            <data value="15.00">15.00</data>
                            <meta itemprop="priceCurrency" content="EUR" />€
                        </div>
                        <button aria-label="Aggiungi al carrello"
                            class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </div>
                </section>
            </article>
            <article class="bg-white rounded-lg flex flex-col overflow-hidden">
                <img height="150" width="150" onclick="window.location.href='product.html'" src="resources/img/cube.jpg"
                    alt="Cubo Antistress">
                <section onclick="window.location.href='product.html'" class="text-center h-full flex flex-col">
                    <h2 class="text-lg font-medium text-gray-700">Cubo Antistress</h2>
                    <div class="flex flex-row justify-center items-center gap-x-2 py-2">
                        <button aria-label="Aggiungi ai preferiti"
                            class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                        <div>
                            <data value="15.00">15.00</data>
                            <meta itemprop="priceCurrency" content="EUR" />€
                        </div>
                        <button aria-label="Aggiungi al carrello"
                            class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </div>
                </section>
            </article>
        </div>
    </aside>
</div>