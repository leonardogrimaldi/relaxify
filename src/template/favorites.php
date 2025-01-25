<div class="grow flex flex-col lg:flex-row">
    <div class="invisible w-1/4"></div>
    <section class="flex flex-col lg:w-2/4 lg:items-center">
        <h2 class="text-center text-xl py-3 w-full">Preferiti</h2>
        <div class="grow flex flex-col bg-white rounded-lg lg:max-w-md">
            <?php foreach ($templateParams["prodottipreferiti"] as $prodottopreferito): ?>
                <article class="flex flex-row items-center m-2 mt-1 rounded-sm h-32">
                    <img class="aspect-square rounded" height="100" width="100" src="<?php echo IMG_ROOT . $prodottopreferito["immagine"] ?>" alt="<?php echo $prodottopreferito["nome"] ?>">
                    <div class="flex flex-col h-full grow ml-2">
                        <hgroup>
                            <h3 class="text-lg"><?php echo $prodottopreferito["nome"] ?></h3>
                        </hgroup>
                        <p class="mt-2 line-clamp-3"><?php echo $prodottopreferito["descrizione"] ?></p>
                    </div>
                    <div class="flex flex-col h-full justify-around items-center mr-2">
                        <button type="button" class="h-full w-full flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6">
                                <title>Preferiti</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            <span class="sr-only">Aggiungi/Rimuovi dai preferiti</span>
                        </button>
                        <data value="<?php echo $prodottopreferito["prezzo"] ?>"><?php echo $prodottopreferito["prezzo"] ?>€</data>
                        <button type="button" class="h-full w-full flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span class="sr-only">Aggiungi al carrello</span>
                        </button>
                    </div>
                </article>  
            <?php endforeach; ?>
        </div>
    </section>
    <?php require("suggestions.php"); ?>
</div>

<div class="w-full text-center my-2 sm:w-2/3">
    <a href="carrello.php" class="text-2xl bg-teal-300 block p-3 mx-4 rounded-3xl">Vai al carrello</a>
</div>