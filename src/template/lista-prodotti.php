<h2 class="text-center font-normal my-2 text-xl">I nostri prodotti</h2>
        <div class="grid grid-cols-2 gap-x-1 gap-y-1 mx-3 my-2 max-w-prose md:max-w-3xl">
        <?php foreach($templateParams["prodotti"] as $prodotto): ?>
            <article itemscope itemtype="https://schema.org/Product" class="bg-white rounded-lg flex flex-col overflow-hidden  md:flex-row">
                <div class="w-full md:w-1/2 flex justify-center items-center aspect-square bg-gray-100">
                    <img class="w-full h-full object-cover" itemprop="image" src="<?php echo IMG_ROOT . $prodotto["immagine"]; ?>" alt="<?php echo $prodotto["nome"]; ?>">
                </div>
                <div class="text-center h-full flex flex-col md:w-1/2">
                    <header>
                        <h3 itemprop="name" class="text-lg font-medium text-gray-700 mt-2"><?php echo $prodotto["nome"] ?></h3>
                        <a class="sr-only" href="product.html">Vai alla pagina del prodotto</a>
                    </header>
                    <p itemprop="description" class="mx-2 line-clamp-2 md:line-clamp-none text-gray-600 my-2 grow"><?php echo $prodotto["descrizione"]; ?></p>
                    <span class="sr-only">Prezzo: <?php echo $prodotto["prezzo"]; ?> €</span>
                    <div class="flex flex-row justify-center items-center gap-x-2 py-2">
                        <button type="button" class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <title>Cuore</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            <span class="sr-only">Aggiungi ai preferiti</span>
                        </button>
                        <div aria-hidden="true" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                            <data itemprop="price" value="<?php echo $prodotto["prezzo"]; ?>"><?php echo $prodotto["prezzo"]; ?></data><meta itemprop="priceCurrency" content="EUR"/>€
                        </div>
                        <button type="button" class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <title>Carrello</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span class="sr-only">Aggiungi al carrello</span>  
                        </button>   
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
        </div>
        