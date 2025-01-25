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
                button.find("svg").addClass("text-pink-500"); 
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
                button.find("svg").removeClass("text-pink-500"); 
            },
        });
    }

    $(document).on("submit", "click.addToPreferred", function(e){
        addToListapreferiti(e);
    })
    $(document).on("submit", "click.removeFromPreferred", function(e){
        removeFromListapreferiti(e);
    })

});