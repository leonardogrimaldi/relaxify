$(document).ready(function () {


    function addToListapreferiti(e) {
        e.preventDefault();
        let itemToAdd = $(e.target).closest("button").find("input.prodottoID").val();

        $.ajax({
            url: "gestione_preferiti.php",
            type: "POST",
            data: { itemToAdd: itemToAdd },
            success: function () {
                let button = $(e.target).closest("button");
                button.removeClass("addToPreferred").addClass("removeFromPreferred");
                button.find("svg").removeClass("text-white");
                button.find("svg").addClass("text-darkPink");
            },
        });

    }

    function removeFromListapreferiti(e) {
        e.preventDefault();
        let itemToDelete = $(e.target).closest("button").find("input.prodottoID").val();

        $.ajax({
            url: "gestione_preferiti.php",
            type: "POST",
            data: { itemToDelete: itemToDelete },
            success: function () {
                let button = $(e.target).closest("button");
                button.removeClass("removeFromPreferred").addClass("addToPreferred");
                button.find("svg").addClass("text-white");
                button.find("svg").removeClass("text-darkPink");
            },
        });
    }

    $(document).on("click", ".addToPreferred", function(e){
        addToListapreferiti(e);
    })
    $(document).on("click", ".removeFromPreferred", function(e){
        removeFromListapreferiti(e);
    })

    function addToCart(e) {
        e.preventDefault();
        let button = $(e.target).closest("button");
        let itemToAdd = button.data("prodotto-id");

        $.ajax({
            url: "gestione_carrello.php",
            type: "POST",
            data: {
                itemToAdd: itemToAdd
            },
            success: function () {
                let button = $(e.target).closest("button");
                console.log("Prodotto aggiunto con successo!");
                alert("Prodotto aggiunto al carrello!");
            },
            error: function (xhr, status, error) {
                // Mostra un messaggio in caso di errore
                console.error("Errore nell'aggiunta al carrello:", error);
                alert("Si è verificato un errore durante l'aggiunta al carrello.");
            }
        });
    }

    function increaseProductCart(e) {
        e.preventDefault();
        let button = $(e.target).closest("button");
        let itemToAdd = button.data("prodotto-id");

        $.ajax({
            url: "gestione_carrello.php",
            type: "POST",
            data: {
                itemToAdd: itemToAdd
            },
            success: function () {
                let button = $(e.target).closest("button");
                console.log("Prodotto aggiunto con successo!");
            },
            error: function (xhr, status, error) {
                // Mostra un messaggio in caso di errore
                console.error("Errore nell'aggiunta al carrello:", error);
                alert("Si è verificato un errore durante l'aggiunta al carrello.");
            }
        });
    }

    function removeFromCart(e) {
        e.preventDefault();
        let button = $(e.target).closest("button");
        let itemToDelete = button.data("prodotto-id");

        $.ajax({
            url: "gestione_carrello.php",
            type: "POST",
            data: {
                itemToDelete: itemToDelete
            },
            success: function () {
                let button = $(e.target).closest("button");
                console.log("Prodotto rimosso con successo!");
                alert("Prodotto rimosso dal carrello!");
            },
            error: function (xhr, status, error) {
                // Mostra un messaggio in caso di errore
                console.error("Errore nella rimozione dal carrello:", error);
                alert("Si è verificato un errore durante l'aggiunta al carrello.");
            }
        });
    }

    $(document).on("click", ".addToCart", function(e){
        addToCart(e);
    });

    $(document).on("click", ".increaseProductCart", function(e){
        increaseProductCart(e);
    });


    $(document).on("click", ".removeFromCart", function(e){
        removeFromCart(e);
    });

    function decreaseFromCart(e) {
        e.preventDefault();
        let button = $(e.target).closest("button");
        let itemToDecrease = button.data("prodotto-id");

        $.ajax({
            url: "gestione_carrello.php",
            type: "POST",
            data: {
                itemToDecrease: itemToDecrease
            },
            success: function () {
                let button = $(e.target).closest("button");
                console.log("Quantità decrementata con successo!");
            },
            error: function (xhr, status, error) {
                // Mostra un messaggio in caso di errore
                console.error("Errore nel decremento della quantità dal carrello:", error);
                alert("Si è verificato un errore.");
            }
        });
    }

    $(document).on("click", ".decreaseFromCart", function(e){
        decreaseFromCart(e);
    });




});