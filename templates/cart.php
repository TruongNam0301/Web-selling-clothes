
<html>
    <head>
        <title>product</title>
        <title>About us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/product-page.css">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
    </head>
    <body>
    <?php include_once('menu_header.php');?>
    <section class="section1">
            <div class="background">
                <div class="wall">
                    <div class='name-link' style='font-size:50px'>CART</div>
                    <div class='link'>
                        <a href='home.php'> Home /</a>
                        <a href='productsPage.php?type=1'> Clothing /</a>
                        <a href='about.php'> About /</a>
                        <a href='contact.php'> Contact /</a>
                        <a href='#'> Cart /</a>
                    </div>
                </div>
            </div>
        </section>
    <?php 
    if(isset($_POST['yes'])){
        $id = $_SESSION['user']['id'];
        $sdt = $_POST['sdt'];
        $address = $_POST['address'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('m/d/Y h:i:s a', time());
        $total = $_POST['total'];
        $tinhtrang = 0;
        include_once("../models/DataProvider.php");
        $db= new DataProvider();
        $sql="INSERT INTO `hoadon` (`MaHD`, `id_user`, `sdt`, `address`, `tinhtrang`, `date`,`total` ) VALUES(null,$id,'$sdt','$address',$tinhtrang,'$date',$total)";
        $lastId=$db->ExecuteQueryInsert($sql);
        foreach( $_SESSION['cart'] as $item){
            $id=$item['id'];
            $soluong = $item['quantity'];
            $size= $item['size'];
            $maHD = $lastId;
            $sql2="INSERT INTO `chitiet_hoadon` (`SoHD`, `MaHD`, `id_cloth`, `soluong`, `size`) VALUES (null, $maHD, $id, $soluong, '$size')";
            $db->ExecuteQuery($sql2);  
        }
        unset($_SESSION['cart']);
       
    }
?>
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
            $config['rewrite_short_tags'] = FALSE;
            include_once('../controllers/CartCtr.php');
            $CartCtr = new CartCtr();
            $CartCtr->showCart();
            ?>
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button" data-toggle='modal' >PURCHASE</button>
        </section>
        
<!--Modal-->
<div class="modal fade" id="BoxModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" id='form-buy'>
        <input type='hidden' name='total'  id='total' /><br/>
            <label>SDT: </label>
                <input type='text' name='sdt'  id='sdt' onkeypress="return isNumberKey(event)"/><br/>
            <label>Dia Chi: </label>
                <input type='text' name='address'  id='address'/><br/>
            <div class="modal-footer" align="center" style="margin-top:20px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type='submit'  name='yes' class='btn-yes btn btn-primary' value='confirm' />
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    </body>
    <script src="../javascript/home.js"></script>
    <script src="../javascript/cart.js"></script>

</html>

<script>
    function validateForm() {
        $("#form-buy").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "sdt":{
                    required: true,
                },
                "address":{
                    required: true,
                },
            },
            messages: {
                "name":{
                    required: "* Bắt buộc nhập name"
                },
                "price":{
                    required: "* Bắt buộc nhập price"
                },
                "file": {
                    required: "* Bắt buộc nhập file"
                
                },
            }
        });
    }
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function checkUserLogin(){
        check = <?php 
            if(isset($_SESSION['user'])){
                echo sizeof($_SESSION['user']);
            }
            else echo 0;
        ?>;
        return check;
    }
    function checkCart(){
        check = <?php 
            if(isset($_SESSION['cart'])){
                echo sizeof($_SESSION['cart']);
            }
        ?>;
        return check;
    }
    $(document).ready(function(){
        $('.btn-purchase').on("click",function(){
            let total= $('.cart-total-price').text().replace(',','');
            $('#total').val(total);
            checkUser=checkUserLogin();
            checkCart=checkCart();
            if(checkUser==0){
               alert('You must login to purchase!!');
               $(this).removeAttr('data-target');
            }
            else if(checkCart==0){
                alert('Cart is empty!!');
               $(this).removeAttr('data-target'); 
            }
            else{
                $(this).attr('data-target','#BoxModal');
            }
        })
        $('#form-buy').on('submit',function(){
              
            var check = confirm("Are you sure to buy ?");
          return check;
        })
    })
</script>       