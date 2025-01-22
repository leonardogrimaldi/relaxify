<!-- Prodotto -->
<article class="flex flex-col items-center justify-center w-full rounded-md p-5 mx-4 shadow-md bg-white">
    <img class="w-3/4"
        itemprop="image"
        src="<?php echo IMG_ROOT . $prodotto["immagine"]; ?>"
        alt="<?php echo $prodotto["nome"]; ?>">
    <header class="mt-2">
        <h3 class="text-lg font-semibold"><?php echo $prodotto["nome"];?></h3>
    </header>
    <p class="text-center"><?php echo $prodotto["descrizione"];?></p>
</article>
<div id="fixed-div" class="flex flex-row w-full fixed bottom-0 z-10000">
<button type="button" class="w-3/4 p-4 bg-red-500">Aggiungi al carrello</button>
<button type="button" class="w-1/4 bg-blue-500">Preferiti</button>
</div>
<?php
    require_once("suggestions.php");
?>