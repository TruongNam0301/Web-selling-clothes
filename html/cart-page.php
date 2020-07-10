<html>
    <head>
        <title>product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/product-page.css">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../javascript/cart-page.js" ></script>
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
                    <span class="cart-quantity cart-header cart-column">SIZE</span>
                </div>
                <div class="cart-items">
                <?php
                    include_once ("../Controller/cart.php");
                ?>

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
        
       <script>
        $(document).ready(function(){
            $('.remove-item').on('click',function(){
                let index = $(this).data('index');
                let deleteButton =$(this).parents('.cart-row');
                $.ajax({
                    url:'../Controller/xulygiohang.php',
                    type:'POST',
                    data:{index:index,action:'delete'},
                    success: function(res){
                        console.log(index);
                       deleteButton.remove();
                       $('.count').load('../View/item-count.php')  
                    }
                })
                
            })
        })
            
       </script>
    
</body>
<script src="../javascript/cart-page.js"></script>
</html>
