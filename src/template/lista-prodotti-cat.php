<h2 class="text-center font-normal my-2 text-xl"><strong><?php echo $templateParams["prodotticat"][0]["categorianome"]; ?></strong></h2>
<div class="grid grid-cols-2 md:grid-cols-3 gap-x-1 gap-y-2 max-w-screen-lg">
    <?php foreach($templateParams["prodotticat"] as $prodottocat): ?>
        <article itemscope itemtype="https://schema.org/Product" class="bg-white rounded-lg flex flex-col overflow-hidden shadow-md">
            <a href="prodotto.php?id=<?php echo $prodottocat['prodottoID'] ?>">    
            <div class="w-full flex justify-center items-center">
                <div class="w-full aspect-square relative overflow-hidden">
                    <img class="absolute top-0 left-0 w-full h-full object-cover" 
                        itemprop="image" alt="<?php echo $prodottocat["prodottonome"]; ?>"
                        src="<?php echo IMG_ROOT . $prodottocat["immagine"]; ?>">
                </div>
            </div>
            <div class="text-center h-full flex flex-col">
                <header>
                    <h3 itemprop="name" class="text-lg font-medium text-gray-700 mt-2"><?php echo $prodottocat["prodottonome"]; ?></h3>
                    <a class="sr-only" href="product.html">Vai alla pagina del prodotto</a>
                </header>
                <p itemprop="description" class="mx-2 line-clamp-2 text-gray-600 my-2 grow"><?php echo $prodottocat["prodottodescrizione"]; ?></p>
                <span class="sr-only">Prezzo: <?php echo $prodottocat["prezzo"]; ?> €</span>
                <div class="flex flex-row justify-center items-center gap-x-2 py-2">
                <?php if(isUserLoggedIn()): ?>
                        <?php if(!in_array($prodottocat["prodottoID"], $templateParams["lista_preferiti"])): ?>
                            <button type="button" class="addToPreferred w-10 flex justify-center bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <title>Preferiti</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span class="sr-only">Aggiungi ai preferiti</span>
                                <input type="hidden" class="prodottoID" value="<?php echo $prodottocat["prodottoID"]; ?>" >
                            </button>
                        <?php else : ?>
                            <button type="button" class="removeFromPreferred w-10 flex justify-center bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <title>Preferiti</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span class="sr-only">Rimuovi dai preferiti</span>
                                <input type="hidden" class="prodottoID" value="<?php echo $prodottocat["prodottoID"]; ?>" >
                            </button>
                        <?php endif; ?>
                    <?php else : ?>
                        <button onclick="window.location.href='./login.php'" type="button" class="w-10 flex justify-center bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <title>Preferiti</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            <span class="sr-only">Effettua prima il Login</span>
                            <input type="hidden" class="prodottoID" value="<?php echo $prodottocat["prodottoID"]; ?>" >
                        </button>
                    <?php endif; ?>
                    <div aria-hidden="true" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                        <data itemprop="price" value="<?php echo $prodottocat["prezzo"]; ?>"><?php echo $prodottocat["prezzo"]; ?></data><meta itemprop="priceCurrency" content="EUR"/>€
                    </div>
                    <button type="button" class="w-10 flex justify-center bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <title>Carrello</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="sr-only">Aggiungi al carrello</span>  
                    </button>   
                </div>
            </div>
            </a>
        </article>
    <?php endforeach; ?>
</div>


