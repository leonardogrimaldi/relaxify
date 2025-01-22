<h2 class="py-4 text-lg">Area personale</h2>
<div class="bg-white shadow-md rounded-md w-full max-w-lg">
    <menu class="flex border-b">
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="dati">Dati personali</button></li>
        <li class="w-full"><button class="w-full h-full py-3 text-center font-semibold text-gray-500 rounded-t-md" data-tab-name="ordini">Ordini</button></li>
    </menu>
    <section class="hidden p-6" data-tab-name="dati">
        <h3 class="sr-only">Dati personali</h3>
        <dl>
            <dt class="block text-gray-700">Nome:</dt>
            <dd class="w-full border border-gray-300 rounded p-2 mb-4">Mario</dd>
            <dt class="block text-gray-700">Nome:</dt>
            <dd class="w-full border border-gray-300 rounded p-2">Mario</dd>
        </dl>
    </section>
    <section class="hidden p-3" data-tab-name="ordini">
        <h3 class="sr-only">Ordini</h3>
        <article class="border border-gray-300 p-2 rounded border-b-2 relative">
            <dl>
                <div class="flex flex-row gap-x-1">
                    <dt>Ordine:</dt>
                    <dd>
                        <slot name="codice">Codice ordine</slot>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Stato:</dt>
                    <dd>
                        <slot name="stato">N/A</slot>
                    </dd>
                </div>
                <div class="flex flex-row gap-x-1">
                    <dt>Indirizzo:</dt>
                    <dd>
                        <slot name="indirizzo">Via TEST</slot>
                    </dd>
                </div>
            </dl>
            <button class="absolute top-0 right-0 mr-2 mt-2" type="button" onclick="dropdownClicked(this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 rotate-0 transform transition-all duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                <span class="sr-only">Mostra i dettagli dell'ordine</span>
            </button>
            <div class="hidden">
                <section>
                    <h4 class="sr-only">Articoli presenti nell'ordine</h4>
                    <article class="flex flex-row mt-4 pt-2 border-t-2">
                        <div class="w-1/3">
                            <img class="aspect-square" src="resources/img/cube.jpg" alt="Palla Antistress">
                        </div>
                        <div class="flex flex-col h-full grow ml-2">
                            <hgroup>
                                <h3 class="text-lg">Palla antistress</h3>
                                <p class="text-base">Categoria</p>
                            </hgroup>
                            <dl>
                                <div class="flex flex-row gap-x-1">
                                    <dt><abbr class="no-underline" title="Codice articolo">Cod.</abbr></dt>
                                    <dd>123456</dd>
                                </div>
                                <div class="flex flex-row gap-x-1">
                                    <dt>Prezzo:</dt>
                                    <dd><data value="10.53">10.53</data></dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex flex-col h-full justify-start items-center p-2">
                            <abbr title="Quantità" class="no-underline">Qta</abbr>
                            <data value="11">11</data>
                        </div>
                    </article>
                </section>
                <button type="button" class="bg-teal-500 text-white py-2 rounded flex flex-row min-w-min px-3 h-10 text-lg items-center ml-auto mr-0 mt-2" data-codice-articolo="1" onclick="tickSent(this)">
                    <svg class="h-full mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Segna come inviato
                </button>
            </div>
        </article>
    </section>
</div>


<!-- Bottone logout -->