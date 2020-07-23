
<html>
    <head>
        <title>product</title>
        <title>About us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
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