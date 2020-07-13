
<?php
    $val= $_GET['id'];

    $product_name;
    $product_price;
    $product_pic;
    $conn = mysqli_connect("localhost", "root","","sellclothes");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($val)){
        $sql="SELECT * FROM clothes WHERE id= $val";
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $product_name=$row['name'];
        $product_price=$row['price'];
        $product_pic=$row['picture'];
        
    }
    else{
        echo "can't find val";
    }
    mysqli_close($conn);
?>

<head>

    <style type="text/css">
        #addToCartButton{
            box-shadow:inset 0px 38px 0px -24px #e67a73;
            background-color:#e4685d;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Trebuchet MS;
            font-size:25px;
            font-weight:bold;
            font-style:italic;
            padding:11px 15px;
            text-decoration:none;
            text-shadow:0px 1px 0px #942018;
            height: 75px;
        }
        #addToCartButton:hover {
        background-color:#eb675e;
        }
        #addToCartButton:active {
            position:relative;
            top:1px;
        }
        
        hr {
            overflow: visible; /* For IE */
            padding: 0;
            border: none;
            border-top: medium double #333;
            color: #333;
            text-align: center;
        }
        hr:after {
            content: "§";
            display: inline-block;
            position: relative;
            top: -0.7em;
            font-size: 1.5em;
            padding: 0 0.25em;
            background: white;
        }
        
        .pickOptions {
            float: left;
            padding: 20px;
            width: 250px;
            height:100px ;
        }
        .CartButton {
            float: left;
            padding: 20px;
            width: 250px;
            height:100px ;
            
        }
        
        #decre{
            margin-left: 20px;
        }

        #incre, #decre{
            box-shadow:inset 0px 1px 0px 0px #ffffff;
            background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
            background-color:#f9f9f9;
            border-radius:0px;
            border:1px solid #dcdcdc;
            display:inline-block;
            cursor:pointer;
            color:#666666;
            font-family:Arial;
            font-size:10px;
            font-weight:bold;
            padding:2px 0px;
            text-decoration:none;
            text-shadow:0px 1px 0px #ffffff;
            width: 20px;
            height: 40px;
        }
        #incre:hover,#decre:hover {
            background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
            background-color:#e9e9e9;
        }
        #incre:active,#decre:active {
            position:relative;
            top:1px;
        }

    </style>
</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../css/menubar.css">
<link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
<link rel="stylesheet" type="text/css" href="../css/main-home.css">
<link rel="stylesheet" type="text/css" href="../css/product-page.css">
 <?php
    include 'menu_header.php'; 
?>
<section class="section1">
                <div class="background">
                    <div class="wall">
                    </div>
                </div>
            </section>
<div class='container'>
    
<div class="row">
<div class="col-md-6">
    <div class= 'image-product'>
    <img src="../image/image_product/<?php echo $product_pic?>" width="500" height="600"/>
    </div>
</div>




<div class="col-md-6" style="color:#555756">
    <div class= 'infor-product'>
        <h1><?php echo $product_name?></h1>
        <h2>
            <?php 
                $money=number_format($product_price,0,".",",");
                echo $money ."<b> <sup><u>đ</u></sup></b>";
            ?>
        </h2>
        <p>available</p>
        <h2>description</h2>
        <div >
            <div class='text' style="margin-bottom: 20px;">
            Quot semper vivendo ad vix, qui ad diam lucilius repudiare. Autem voluptua ius id. Invenire antiopam qualisque ne per, ei vim legimus accusam, tale nulla vim ut. Sea at omnium utroque delectus. Vivendo voluptaria vix ex, ei mei nobis clita detracto.
            </div>
        </div>
        <hr>
       
        <div class="pickOptions">
            <div style="display:flex;flex-direction:row; margin-bottom:10px">
                <p style="margin-top:5px">so luong: </p>
                
                <button id="decre"><i class="fa fa-minus"  aria-hidden="true"></i></button>
                <input class="soluong" style="height:40px;width:40px;text-align:center" value="1">
                <button id="incre"><i class="fa fa-plus"  aria-hidden="true"></i></button>
                

                <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
                <script type = "text/javascript">
                    let num = parseInt($(".soluong").val())
                    $("#incre").on('click',function(){
                        num+=1;
                        $(".soluong").val(num)
                    })
                    $("#decre").on('click',function(){
                        num-=1;
                        if(num < 1) num=1;
                        $(".soluong").val(num)
                    })
                    function goBack() {
                        window.history.back();
                    }
                </script>
            </div>
            <label for="size">Choose size: </label>
            <select name="size" id="size" style="margin-left: 14px;">
                <option value="M">M</option>
                <option value="SM">SM</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>
        
        <div class="CartButton"><button id="addToCartButton">ADD TO CART</button></div>
        </div>
        <script>
            function postCart (id,quantity,size,action){
                $.post( '../Controller/xulygiohang.php', { id:id,quantity:quantity,size:size,action:action },function(res){
                   if(res==-1) alert('alredy in cart bro');
                   else {
                       console.log(res);
                       $('.count').load('../View/item-count.php') 
                   }
                } );
            }
            $(document).ready(function(){
                $('.count').load('../View/item-count.php')
                $('.CartButton').on('click',function(){
                    let quantity = $('.soluong').val();
                    let size = $('#size').val();
                    let id = <?php echo $_GET['id'] ?>;
                    let action = 'add'
                    postCart(id,quantity,size,action);
                    $('.count').load('../View/item-count.php')  
                });
            })
        </script>
    </div>
</div>
</div>
<?php
    include 'footer.php'; 
?>
 