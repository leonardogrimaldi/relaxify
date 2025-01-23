<div class="max-w-4xl bg-white shadow-md rounded-lg sm:ml-auto sm:mr-auto w-full">
    <h2 class="text-xl font-bold text-gray-700 mb-6 text-center pt-3">Carrello</h2>
    <div class="flex flex-col sm:flex-row ">
        <section class="sm:w-3/5 sm:border-r sm:pr-4 mx-2 sm:mx-0">
            <h3 class="text-center">Prodotti aggiunti</h3>
            <article class="flex justify-between sm:justify-evenly">
                <div class="w-1/3 max-w-32">
                    <img class="aspect-square rounded-lg" src="resources/img/cube.jpg" alt="Cubo Antistress">
                </div>
                <div class="flex flex-col justify-center items-center gap-y-2">
                    <h2 class="text-lg font-semibold text-gray-700">Cubo Antistress</h2>
                    <p class="text-gray-500">15,00€</p>
                    <div class="flex items-center justify-evenly w-full">
                        <button onclick="decreaseQuantity(1)" type="button" class="bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>
                        </button>
                        <span id="quantity-1" class="text-lg font-semibold">1</span>
                        <button onclick="incrementQuantity(1)" type="button" class="bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <button onclick="removeItem(1)" type="button" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>
            </article>
        </section>
        <section class="mt-2 sm:mt-0 p-4 sm:mb-4 sm:mr-4 bg-gray-100 border-t sm:border-t-0 rounded-b-lg sm:rounded-t-lg shadow-md sm:w-2/5 sm:ml-4 h-min sm:self-start">
            <h3 class="text-xl font-bold text-gray-700">Riepilogo</h3>
            <dl class="flex justify-between text-lg mt-4">
                <dt class="font-bold">TOTALE PRODOTTI:</dt>
                <dd id="totale" class="font-semibold">0.00€</dd>
            </dl>
            <button onclick="window.location.href='checkout.php'" type="button" class="mt-4 w-full bg-teal-500 text-white py-3 rounded-lg hover:bg-teal-600">
                Procedi all'ordine
            </button>
        </section>
    </div>
</div>