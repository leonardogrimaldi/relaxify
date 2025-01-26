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
                button.find("svg").removeClass("text-white").removeClass("bg-blue");
                button.find("svg").addClass("text-darkBlue").addClass("bg-yellow");
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
                button.find("svg").addClass("text-white").addClass("bg-blue");
                button.find("svg").removeClass("text-darkBlue").removeClass("bg-yellow");
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
            }
        });
    }

    $(document).on("click", ".addToCart", function(e){
        addToCart(e);
    });


});