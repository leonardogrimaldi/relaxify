<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Home";
$templateParams["nome"] = "lista-prodotti.php";
$templateParams["js"] = JS_ROOT.'barra.js';
$templateParams["module"] = "";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Relaxify - Il tuo negozio online di prodotti antistress per ritrovare la calma e il relax.">
    <title><?php echo $templateParams["titolo"] ?></title>
    <link rel="stylesheet" href="./css/output.css">
</head>
<body class="bg-gray-100 text-gray-800 flex items-center flex-col min-h-screen">
    <?php require_once('./template/header.php')?>
    <?php if (isset($templateParams["js"])) : ?>
        <script <?php echo $templateParams["module"]; ?> src="<?php echo $templateParams["js"]; ?>"></script>
    <?php endif; ?>
    <menu class="w-screen flex gap-x-3 px-3 overflow-x-auto whitespace-nowrap">
        <?php
        foreach($templateParams["categorie"] as $categoria): ?>
        <!-- Assicurarsi di mettere ml auto al primo elemento e mr auto all'ultimo per un funzionamento desktop centrato -->
        <li class="py-2 flex-none"><button type="button" class="w-32 text-pink-400 hover:text-pink-700 font-semibold border-4 border-pink-200 py-1 rounded-full"><?php echo $categoria["nome"]; ?></button></li>
        <?php endforeach; ?>
    </menu>
    <main class="grow">
        <?php require("./template/lista-prodotti.php");?>
    </main>
    <?php require_once("./template/footer.php")?>
    <script>
        // Center categories
        document.querySelector("menu li:first-child").classList.add("ml-auto");
        document.querySelector("menu li:last-child").classList.add("mr-auto");

        const buttons = document.querySelectorAll("main article section div button");
        buttons.forEach(b => {
            b.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation(); // Prevent click from affecting <a>
            });
        })
    </script>
    <script src="js/barra.js"></script>
</body>
</html>