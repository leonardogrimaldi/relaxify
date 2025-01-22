<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Relaxify - Il tuo negozio online di prodotti antistress per ritrovare la calma e il relax.">
    <title><?php echo $templateParams["titolo"] ?> </title>
    <link rel="stylesheet" href="./css/output.css">
    <?php if (isset($templateParams["js"])) : ?>
        <script <?php if (isset($templateParams["module"])) : ?> 
            type="<?php echo $templateParams["module"]; ?>" 
            <?php endif; ?> 
            src="<?php echo $templateParams["js"]; ?>"></script>
    <?php endif; ?>
</head>
<body class="bg-gray-100 text-gray-800 flex items-center flex-col min-h-screen">
    
    <!-- Header -->
    <?php
        if (isset($templateParams["header"])) {
        require($templateParams["header"]);
        } else {
        require("header.php");
        }
    ?>

    <main class="w-full flex flex-col items-center grow px-2 pb-6">
        <?php require($templateParams["nome"]); ?>
    </main>


    <!-- Footer -->
    <?php 
        if (isset($templateParams["footer"])) {
            require($templateParams["footer"]);
        } else {
            require("footer.php");
        }
    ?>
    <?php 
        if (isset($templateParams["js"]) && is_array($templateParams["js"])) {
            foreach($templateParams["js"] as $script) {
                if ($script instanceof JSImport && $script->bottom) : ?>
                    <script <?php if ($script->module) : ?> 
                        type="<?php echo "module"; ?>" 
                        <?php endif; ?> 
                        src="<?php echo $script->fileName(); ?>"></script>
                <?php endif;
            }
        }
    ?>
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
</body>
</html>