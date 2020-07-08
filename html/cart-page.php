

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
                $conn = mysqli_connect("localhost", "root","","sellclothes");

                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }
                foreach($_SESSION['cart'] as $i=>$val){
                    $item = $_SESSION['cart'][$i];
                    $sql = "SELECT * FROM clothes WHERE id=$item[id]";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){
                        cartItem($row['picture'],$row['name'],$row['price'],$item['quantity'],$item['size'],$i);
                    }
                }
                function cartItem ($image,$title,$price,$quantity,$size,$i){
                    $str ="
                    <div class= 'cart-row'>
                    <div class='cart-item cart-column'>
                        <img class='cart-item-image' src='../image/image_product/$image' width='100' height='100'>
                        <span class='cart-item-title'>$title</span>
                    </div>
                    <span class='cart-price cart-column'>$price</span>
                    <div class='cart-quantity cart-column'>
                        <input class='cart-quantity-input' type='number' min='1' value='$quantity'> 
                    </div>
                    <div class='cart-quantity cart-column'>
                    <select name='size' id='size' style='margin-right: 14px; value = $size'>
                        <option value='m'>M</option>
                        <option value='sm'>SM</option>
                        <option value='l'>L</option>
                        <option value='xl'>XL</option>
                    </select>
                    <button class='btn btn-danger remove-item' data-index=$i  type='button'>REMOVE</button>
                    </div>
                </div>
        ";
        echo $str;
                }
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
       
    
</body>
<script src="../javascript/cart-page.js"></script>
</html>
