<div class="grow flex flex-col lg:flex-row">
    <div class="invisible w-1/4"></div>
    <section class="flex flex-col lg:w-2/4 lg:items-center">
        <h2 class="text-center text-xl py-3 w-full">Preferiti</h2>
        <div class="grow flex flex-col bg-white rounded-lg lg:max-w-md shadow-md">
            <?php foreach ($templateParams["prodottipreferiti"] as $prodottopreferito): ?>
                <a href="prodotto.php?id=<?php echo $prodottopreferito['prodottoID'] ?>">
                <article class="flex flex-row items-center m-2 mt-1 rounded-sm h-32">
                    <img class="aspect-square rounded" height="100" width="100" src="<?php echo IMG_ROOT . $prodottopreferito["immagine"] ?>" alt="<?php echo $prodottopreferito["nome"] ?>">
                    <div class="flex flex-col h-full grow ml-2">
                        <hgroup>
                            <h3 class="text-lg"><?php echo $prodottopreferito["nome"] ?></h3>
                        </hgroup>
                        <p class="mt-2 line-clamp-3"><?php echo $prodottopreferito["descrizione"] ?></p>
                    </div>
                    <div class="flex flex-col h-full justify-around items-center mr-2">
                        <data value="<?php echo $prodottopreferito["prezzo"] ?>"><?php echo $prodottopreferito["prezzo"] ?>€</data>
                        <button class="addToCart mt-2 px-4 py-2 bg-blue text-white rounded-lg hover:bg-blue-600" data-prodotto-id="<?php echo $prodottopreferito["prodottoID"]; ?>"">Aggiungi al carrello</button>
                    </div>
                </article> 
                </a> 
            <?php endforeach; ?>
        </div>
    </section>
    
    <?php require("suggestions.php"); ?>
</div>

<div class="w-full text-center my-2 sm:w-2/3">
    <a href="carrello.php" class="text-2xl text-white bg-blue block p-3 mx-4 rounded-3xl">Vai al carrello</a>
</div>