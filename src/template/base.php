<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Relaxify - Il tuo negozio online di prodotti antistress per ritrovare la calma e il relax.">
    <title><?php echo $templateParams["titolo"] ?> </title>
    <link rel="stylesheet" href="./css/output.css">
</head>
<body class="bg-gray-100 text-gray-800 flex items-center flex-col min-h-screen">
    <header class="bg-pink-300 text-white flex items-center w-full">
        <!-- Button sidebar -->
        <button onclick="toggleBarra()" class="px-3 flex items-center text-white hover:bg-teal-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <title>Tab</title>
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <span class="sr-only">Apri la barra laterale</span>        
        </button>

        <!-- Title -->
        <a class="text-4xl py-5 font-bold w-full flex" href="index.php">
            <div class="invisible w-[5%]"></div>
            <h1 class="w-full">Relaxify</h1>
        </a>

        <!-- Icone preferiti login carrello -->
        <nav class="py-5 min-w-max">
            <ul class="flex flex-row items-center justify-end gap-x-1">
                <li>
                    <a href="preferiti.html">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-9">
                            <title>Cuore</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span class="sr-only">Lista preferiti</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-9">
                            <title>Omino</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="sr-only">Area personale</span>
                    </a>
                </li>
                <li class="mr-3">
                    <a href="cart.html">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-9">
                            <title>Carrello</title>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="sr-only">Carrello</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <div id="barra" class="absolute top-0 left-0 w-64 h-auto bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
            <div class="p-6 flex flex-col space-y-4">
                <button onclick="toggleBarra()" class="self-end text-gray-500 hover:text-gray-800">
                </button>

                <!-- Sezione home preferiti login carrello -->
                <div class="space-y-4">
                    <a href="index.php" class="flex items-center text-gray-800 hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2.25-2.25M3 12l9-9 9 9M5.25 15h13.5a2.25 2.25 0 012.25 2.25v3a2.25 2.25 0 01-2.25 2.25H7.5a2.25 2.25 0 01-2.25-2.25v-3a2.25 2.25 0 012.25-2.25H5.25z" />
                        </svg>
                        <span>Listino Prodotti</span>
                    </a>
                    <a href="preferiti.html" class="flex items-center text-gray-800 hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span>Preferiti</span>
                    </a>
                    <a href="login.php" class="flex items-center text-gray-800 hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>Area Personale</span>
                    </a>
                    <a href="cart.html" class="flex items-center text-gray-800 hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span>Carrello</span>
                    </a>
                </div>
    
                <hr class="border-gray-300">
    
                <!-- Sezione Notifiche -->
                <div class="space-y-4">
                    <a href="notifiche.html" class="flex items-center text-gray-800 hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 7 8.97 7 11v3.159c0 .538-.214 1.055-.595 1.436L5 17h5m4 0a3.001 3.001 0 01-6 0m6 0H9" />
                        </svg>
                        <span>Notifiche</span>
                    </a>
                </div>
    
                <hr class="border-gray-300">
    
                <!-- Sezione Contatti e Informazioni -->
                <div class="space-y-4">
                    <a href="contatti.html" class="flex items-center text-gray-800 hover:text-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25c0 1.622-1.378 2.925-3.125 2.925-1.746 0-3.125-1.303-3.125-2.925S16.129 8.325 17.875 8.325c1.746 0 3.125 1.303 3.125 2.925zM15.5 18.75v-1.125c0-.59-.076-1.153-.225-1.675-.229-.975-.669-1.825-1.25-2.475-.582-.65-1.287-1.175-2.075-1.5-.789-.326-1.623-.494-2.475-.494s-1.686.168-2.475.494c-.788.325-1.492.85-2.075 1.5-.581.65-1.021 1.5-1.25 2.475-.149.522-.225 1.085-.225 1.675v1.125c0 1.058.932 1.875 2.075 1.875h7.25c1.142 0 2.075-.817 2.075-1.875z" />
                        </svg>
                        <span>Informazioni e Contatti</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- centrare elementi del NAV -->
    <!-- Categorie -->
    <menu class="w-screen flex gap-x-3 px-3 overflow-x-auto whitespace-nowrap">
        <?php foreach($templateParams["categorie"] as $categoria): ?>
        <!-- Assicurarsi di mettere ml auto al primo elemento e mr auto all'ultimo per un funzionamento desktop centrato -->
        <li class="py-2 flex-none"><button type="button" class="w-32 text-pink-400 hover:text-pink-700 font-semibold border-4 border-pink-200 py-1 rounded-full"><?php echo $categoria["nome"]; ?></button></li>
        <?php endforeach; ?>
    </menu>

    <main class="grow">
        <?php require($templateParams["nome"]); ?>
    </main>
    <!-- Footer -->
    <footer class="bg-pink-400 text-white text-center py-6 w-full">
        <ul class="flex justify-center space-x-8">
            <li><a href="https://github.com/leonardogrimaldi/relaxify" class="text-white hover:text-gray-500 font-semibold">Seguici</a></li>
            <li><a href="chisiamo.html" class="text-white hover:text-gray-500 font-semibold">Chi Siamo</a></li>
            <li><a href="contatti.html" class="text-white hover:text-gray-500 font-semibold">Contattaci</a></li>
        </ul>
    </footer>
    <script src="js/barra.js"></script>
    <script>
        const buttons = document.querySelectorAll("main article section div button");
        buttons.forEach(b => {
            b.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation(); // Prevent click from affecting <a>
            });
        })
    </script>
</body>
</html>