<html>
    <head>
        <title>product</title>
        <title>About us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/product-page.css">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
    </head>
    <body>
        <div class='all'>

 <!--menu-bar-->
            <?php
                include 'menu_header.php';
            ?>

<!--background-->
            <section class="section1">
                <div class="background">
                    <div class="wall">
                    </div>
                </div>
            </section>

<!--Cart-->
            <section class="container content-section">
                <h2 class="section-header">CART</h2>
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">ITEM</span>
                    <span class="cart-price cart-header cart-column">PRICE</span>
                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                </div>
                <div class="cart-items">
                </div>
                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <span class="cart-total-price">$0</span>
                </div>
                <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
            </section>

            <?php
                include 'footer.php';
            ?>
        </div>


        <script src="../javascript/cart-page.js"></script>
        <script src="../javascript/home.js"></script>
    
</body>
</html>
