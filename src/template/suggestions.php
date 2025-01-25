<aside class="lg:w-1/4 flex flex-col items-center lg:mr-10">
    <h2 class="text-center text-lg py-3">Suggerimenti</h2>
    <div id="prodotti" class="grid grid-cols-2 lg:grid-cols-1 gap-x-3 gap-y-3 my-2 mx-2 grow content-start sm:w-1/2 lg:w-3/4">
        <?php foreach($templateParams["prodottisuggeriti"] as $prodottosuggerito): ?>
        <article class="bg-white rounded-lg flex flex-col overflow-hidden">
            <img onclick="window.location.href='prodotto.php?id=<?php echo $prodottosuggerito['prodottoID'] ?>'" src="<?php echo IMG_ROOT . $prodottosuggerito["immagine"]; ?>"
                alt="<?php echo $prodottosuggerito["nome"]; ?>">
            <section onclick="window.location.href='prodotto.php?id=<?php echo $prodottosuggerito['prodottoID'] ?>'" class="text-center h-full flex flex-col">
                <h2 class="text-lg font-medium text-gray-700"><?php echo $prodottosuggerito["nome"]; ?></h2>
                <div class="flex flex-row justify-center items-center gap-x-2 py-2">
                    <div>
                        <data value="<?php echo $prodottosuggerito["prezzo"]; ?>"><?php echo $prodottosuggerito["prezzo"]; ?></data>
                        <meta itemprop="priceCurrency" content="EUR" />€
                    </div>
                </div>
            </section>
        </article>
        <?php endforeach; ?>
    </div>
</aside>