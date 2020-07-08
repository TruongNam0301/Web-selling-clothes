
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
                foreach(@$_SESSION['cart'] as $i=>$val){
                    $item = @$_SESSION['cart'][$i];
                    $sql = "SELECT * FROM clothes WHERE id=$item[id]";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){
                        cartItem($row['picture'],$row['name'],$row['price'],$item['quantity'],$item['size'],$i);
                    }
                }
              
                function cartItem ($image,$title,$price,$quantity,$size,$i){
                    $check_size=array("M","SM","L","XL");
                    echo "<div class= 'cart-row'>";
                    echo "<div class='cart-item cart-column'>";
                    echo "<img class='cart-item-image' src='../image/image_product/$image' width='100' height='100'>";
                    echo "<span class='cart-item-title'>$title</span>";
                    echo "</div>";
                    echo "<span class='cart-price cart-column'>$price</span>";
                    echo "<div class='cart-quantity cart-column'>";
                    echo "<input class='cart-quantity-input' type='number' min='1' value='$quantity'> ";
                    echo "</div>";
                    echo "<div class='cart-quantity cart-column'>";
                    echo "<select name='size' id='size' style='margin-right: 14px;'> ";
                    foreach($check_size as $x){
                        if($x==$size){
                           echo "<option value='$x' selected='selected'>$x</option>";
                        }
                        else{
                            echo "<option value='$x'>".$x."</option>";
                        }
                    }
                    echo "</select>";
                    echo "<button class='btn btn-danger remove-item' data-index=$i  type='button'>REMOVE</button>";
                    echo "</div>";
                echo "</div>";
        
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
        
       <script>
        $(document).ready(function(){
            $('.remove-item').on('click',function(){
                let index = $(this).data('index');
                let deleteButton =$(this).parents('.cart-row');
                $.ajax({
                    url:'xulygiohang.php',
                    type:'POST',
                    data:{index:index,action:'delete'},
                    success: function(res){
                        console.log(index);
                       deleteButton.remove();
                    }
                })
                
            })
        })
            
       </script>
    
</body>
<script src="../javascript/cart-page.js"></script>
</html>
