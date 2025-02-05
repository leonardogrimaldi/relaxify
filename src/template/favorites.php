<div class="grow flex flex-col lg:flex-row">
    <div class="invisible w-1/4"></div>
    <section class="flex flex-col lg:items-center lg:w-2/4">
        <h2 class="text-center text-lg py-3 w-full">Prodotti preferiti</h2>
        <div class="grow flex flex-col bg-white rounded-lg shadow-md w-full">
            <?php if (empty($templateParams["prodottipreferiti"])):?>
            <p class="p-4 text-center">Non hai prodotti preferiti. <a href="./index.php" class="font-medium text-darkBlue underline hover:no-underline">Torna alla homepage</a> per scegliere un articolo preferito premendo sul pulsante 'Cuore' oppure selezionane uno dai suggerimenti!</p> 
            <?php else:?>
            <?php foreach ($templateParams["prodottipreferiti"] as $prodottopreferito): ?>
                <article class="flex flex-row items-center m-2 mt-1 rounded-sm h-32">
                    <a href="prodotto.php?id=<?php echo $prodottopreferito['prodottoID'] ?>">
                        <img class="aspect-square rounded" height="300" width="300" src="<?php echo IMG_ROOT . $prodottopreferito["immagine"] ?>" alt="<?php echo $prodottopreferito["nome"] ?>">
                    </a>
                    <a href="prodotto.php?id=<?php echo $prodottopreferito['prodottoID'] ?>">
                        <div class="flex flex-col h-full grow ml-2">
                            <hgroup>
                                <h3 class="text-lg"><?php echo $prodottopreferito["nome"] ?></h3>
                            </hgroup>
                            <p class="mt-2 line-clamp-3"><?php echo $prodottopreferito["descrizione"] ?></p>
                        </div>
                    </a> 
                    <div class="flex flex-col h-full justify-around items-center mr-2">
                        <data value="<?php echo $prodottopreferito["prezzo"] ?>"><strong><?php echo $prodottopreferito["prezzo"] ?>€</strong></data>
                        <button class="addToCart mt-2 px-4 py-2 bg-blue text-white rounded-lg hover:bg-darkBlue" data-prodotto-id="<?php echo $prodottopreferito["prodottoID"]; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <title>Carrello</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="sr-only">Aggiungi al carrello</span>    
                        </button>
                    </div>
                </article> 
                
            <?php endforeach; ?>
            <?php endif;?>
        </div>
    </section>  
    <?php require("suggestions.php"); ?>
</div>

<div class="w-full text-center my-2 sm:w-2/3">
    <a href="carrello.php" class="text-2xl text-white bg-blue block p-3 mx-4 rounded-3xl">Vai al carrello</a>
</div>