<?php
    include("db.php"); //Includo file php con due json decodificati
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Fake store</title>
    </head>
    <body>

        <div class="container">
            <!-- CARRELLO -->
            <div id="idCart" class="cart">
                <h2 class="cart-box">Carrello</h2>
                <div class="cart-results shadow">

                </div>
            </div>

            <!-- PRODOTTI -->
            <h2 class="product-box">Prodotti</h2>
            <div id="risultati">
                <?php foreach ($item as $stores) { ?>
                    <div class="prodotto shadow">
                        <div class="pics">
                            <img src="<?php echo $stores['image']; ?>" alt="copertina">
                        </div>
                        <div class="details">
                            <p class="title"><?php echo substr($stores['title'], 0, 50);?></p>
                            <p class="category"><?php echo $stores['category']; ?></p>
                            <p class="price"><?php echo $stores['price']; ?>€</p>
                        </div>
                        <button class="btn btn-style" type="button" name="button" value="<?php echo $stores['id'];?>">Aggiungi al carrello</button>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- SCRIPT HANDLEBARS -->
        <script id="entry-template" type="text/x-handlebars-template">
            <div data-id="{{id}}" class="item{{id}} cart-box-style">
                <p class="cart_title">{{title}}</p>
                <p class="cart_price">{{price}}€</p>
                <input type="number" id="qty{{id}}" class="qty" name="qty" placeholder="1">
                <div class="delete">
                    <button class="remove btn-style">RIMUOVI</button>
                </div>
            </div>
        </script>
        <script src="main.js" charset="utf-8"></script>
    </body>
</html>
