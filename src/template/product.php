<!-- Prodotto -->
<div class="max-w-4xl mx-auto p-6 flex flex-col md:flex-row bg-white shadow-lg rounded-lg mt-3">
        <!-- Immagine prodotto -->
        <div class="md:w-1/2">
            <section id="prodotto" class="box-content">
                <article itemscope itemtype="https://schema.org/Product" class="bg-white shadow-lg rounded-lg flex flex-col">
                    <img itemprop="image" src="resources/img/cube.jpg" alt="Fidget Cube" class="">
                </article>
            </section>
        </div>
        <!-- Nome e descrizione -->
        <div class="md:w-1/2 md:pl-6 flex flex-col justify-center">
             <aside class="bg-white border p-4 mb-4">
                <section class="p-1 text-center h-full flex flex-col">
                    <h2 itemprop="name" class="text-xl font-semibold text-gray-700">Fidget Cube</h2>
                    <p itemprop="description" class="text-gray-600 mt-2 grow">Il <b>Cubo Antistress</b> è un dispositivo compatto progettato per alleviare lo stress e migliorare la concentrazione. È adatto a persone di tutte le età, ideale per chi cerca un modo discreto ed efficace per canalizzare l'energia nervosa, calmarsi o rimanere focalizzato in ambienti impegnativi.</p>
                </section>
             </aside>
        </div>
    </div>
    <!-- Fixed buttons-->
    <div itemprop="offers" itemscope itemtype="https://schema.org/Offer" class="flex flex-row justify-center w-full items-center gap-x-2 py-5 fixed bottom-0 bg-pink-500 text-white border-t-2 border-black"">
        <button class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </button>
        <div>
            <data itemprop="price" value="15.00"><b>15.00</b></data><meta itemprop="priceCurrency" content="EUR"/>€
        </div>
        <button class="w-1/4 flex justify-center bg-teal-500 text-white py-2 rounded hover:bg-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>  
        </button>
    </div>

    <div class="container mx-auto py-8">
        <!-- Altri Prodotti -->
        <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Altri Prodotti</h3>
        
        <!-- Griglia a 3 colonne -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Prodotti(3 va bene?) -->
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <a href="product.html"><img itemprop="image" src="resources/img/cube.jpg" alt="Palla Antistress" class="w-full">
                    <section class="text-center h-full flex flex-col">
                        <h4 itemprop="name" class="text-xl font-semibold text-gray-700">Palla Antistress</h4>
                        <p itemprop="description" class="mx-2 truncate text-gray-600 my-2 grow">Perfetta per alleviare lo stress con una semplice pressione.</p>
                    </section>             
                </a>
            </div>
    
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <a href="product.html"><img itemprop="image" src="resources/img/cube.jpg" alt="Palla Antistress" class="w-full">
                    <section class="text-center h-full flex flex-col">
                        <h4 itemprop="name" class="text-xl font-semibold text-gray-700">Palla Antistress</h4>
                        <p itemprop="description" class="mx-2 truncate text-gray-600 my-2 grow">Perfetta per alleviare lo stress con una semplice pressione.</p>
                    </section>             
                </a>
            </div>
    
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <a href="product.html"><img itemprop="image" src="resources/img/cube.jpg" alt="Palla Antistress" class="w-full">
                    <section class="text-center h-full flex flex-col">
                        <h4 itemprop="name" class="text-xl font-semibold text-gray-700">Palla Antistress</h4>
                        <p itemprop="description" class="mx-2 truncate text-gray-600 my-2 grow">Perfetta per alleviare lo stress con una semplice pressione.</p>
                    </section>             
                </a>
            </div>
        </div>
    </div>