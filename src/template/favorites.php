<div class="grow flex flex-col lg:flex-row">
    <section class="w-full grow flex flex-col items-center">
        <h2 class="text-center text-xl py-3">Preferiti</h2>
        <article class="flex flex-row mx-2 items-center sm:w-2/3 sm:mx-0 h-28">
            <div class="w-1/3 h-full flex justify-end">
                <img class="aspect-square rounded" src="resources/img/cube.jpg" alt="Palla Antistress">
            </div>
            <div class="flex flex-col h-full grow ml-2">
                <hgroup>
                    <h3 class="text-lg">Palla antistress</h3>
                    <p class="">Categoria</p>
                </hgroup>
                <p class="mt-2">Descrizione</p>
            </div>
            <div class="flex flex-col h-full justify-around items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                <data value="15.00">15.00€</data>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
        </article>
    </section>
    <?php require("suggestions.php"); ?>
</div>

<div class="w-full text-center my-2 sm:w-2/3">
    <a href="carrello.php" class="text-2xl bg-teal-300 block p-3 mx-4 rounded-3xl">Vai al carrello</a>
</div>