$( document ).ready(function() {

    //***********AGGIUNTA PRODOTTI A CARRELLO
    var list = [];      // Array prodotti
    $('.btn').click(function(){
        var valbtn = $(this).val();
        $.ajax(
            {
                url:'https://fakestoreapi.com/products/' + valbtn,
                method: 'GET',
                success: function(risposta) {
                        if (!list.includes(risposta.id)) {
                            list.push(risposta.id);

                            var source = document.getElementById("entry-template").innerHTML;
                            var template = Handlebars.compile(source);
                            var context = risposta;
                            var html = template(context)
                            var x = $(".cart-results").append(html);

                        } else {
                            alert('Prodotto già presente');
                        }
                    },
                error: function() {
                    alert('errore');
                }
            }
        );
    });



    //**************RIMOZIONE PRODOTTI CARRELLO
    $(document).on('click','.delete', function(){
        var elemento = $(this).parent().attr('data-id');
        for (var i = 0; i < list.length; i++) {        // Rimuovo prodotto da array per poterlo eventualmente rimettere nel carrello dopo
            if (list[i] == elemento) {
                list.splice(i, 1);
            }
        }
        $.ajax(
            {
                url:'https://fakestoreapi.com/products/' + elemento,
                method: 'DELETE',
                success: function(risposta) {
                    $('.item' + elemento).remove();

                },
                error: function() {
                    alert('errore');
                }
            }
        );
    });
});
