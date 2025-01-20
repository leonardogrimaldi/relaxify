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

    <main class="grow">
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