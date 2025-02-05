<aside class="lg:w-1/4 flex flex-col items-center lg:mr-10">
    <h2 class="text-center text-lg py-3">Suggerimenti</h2>
    <div id="prodotti" class="grid grid-cols-2 lg:grid-cols-1 gap-x-3 gap-y-3 m-2 lg:m-0 grow content-start sm:w-1/2 lg:w-3/4">
        <?php foreach($templateParams["prodottisuggeriti"] as $prodottosuggerito): ?>
        <article class="bg-white rounded-lg flex flex-col overflow-hidden shadow-md">
            <img class="h-full aspect-square" onclick="window.location.href='prodotto.php?id=<?php echo $prodottosuggerito['prodottoID'] ?>'" src="<?php echo IMG_ROOT . $prodottosuggerito["immagine"]; ?>"
                alt="<?php echo $prodottosuggerito["nome"]; ?>">
                <section onclick="window.location.href='prodotto.php?id=<?php echo $prodottosuggerito['prodottoID'] ?>'" 
    class="text-center flex flex-col" 
    itemscope itemtype="https://schema.org/Product">

    <h2 class="text-lg font-medium text-gray-700" itemprop="name">
        <?php echo $prodottosuggerito["nome"]; ?>
    </h2>

    <div class="flex flex-row justify-center items-center gap-x-2 py-2" 
        itemprop="offers" itemscope itemtype="https://schema.org/Offer">
        
        <div>
            <data itemprop="price" value="<?php echo $prodottosuggerito["prezzo"]; ?>">
                <?php echo $prodottosuggerito["prezzo"]; ?> €
            </data>
            <meta itemprop="priceCurrency" content="EUR" />
        </div>
    </div>

</section>

        </article>
        <?php endforeach; ?>
    </div>
</aside>