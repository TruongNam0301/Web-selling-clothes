
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<script src="https://kit.fontawesome.com/65adf3fa6d.js">
	</script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js">
	</script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
	</script>
	<link href="./css/product-page.css" rel="stylesheet" type="text/css">
	<link href="./css/menubar.css" rel="stylesheet" type="text/css">
	<link href="./css/menu-mobile.css" rel="stylesheet" type="text/css">
	<link href="./css/cart.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once('menu_header.php');?>
	<section class="section1">
		<div class="background">
			<div class="wall">
				<div class='name-link' style='font-size:50px'>
					CART
				</div>
				<div class='link'>
					<a href='home.php'>Home /</a> <a href='productsPage.php?type=1'>Clothing /</a> <a href='about.php'>About /</a> <a href='contact.php'>Contact /</a> <a href='#'>Cart /</a>
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
        $total = intval(str_replace(',','',$_POST['total']));
        $tinhtrang = 0;
        include_once("./models/DataProvider.php");
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
			<span class="cart-item cart-header cart-column">ITEM</span> <span class="cart-price cart-header cart-column">PRICE</span> <span class="cart-quantity cart-header cart-column">QUANTITY</span> <span class="cart-quantity cart-header cart-column">SIZE</span>
		</div>
		<div class="cart-items">
			<?php
                $config['rewrite_short_tags'] = FALSE;
                include_once('./controllers/CartCtr.php');
                $CartCtr = new CartCtr();
                $CartCtr->showCart();
			?>
		</div>
		<div class="cart-total">
			<strong class="cart-total-title">Total</strong> <span class="cart-total-price">$0</span>
		</div><button class="btn btn-primary btn-purchase" data-toggle='modal' type="button">PURCHASE</button>
	</section><!--Modal-->
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="BoxModal" role="dialog" tabindex="1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Information of customer</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form action='' enctype="multipart/form-data" id='form-buy' method='post' name="form-buy">
						<p>Vui lòng nhập số điện thoại và địa chỉ giao hàng để Shop có thể liên hệ giao hàng</p><br/>
						<input id='total' name='total' type='hidden'>
						<label>SDT:</label><br/> <input id='sdt' name='sdt' onkeypress="return isNumberKey(event)" type='text'><br>
						<label>Dia Chi:</label> <br/><input id='address' name='address' type='text'><br>
						<div align="center" class="modal-footer" style="margin-top:20px">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button> <input class='btn-yes btn btn-primary' name='yes' type='submit' value='confirm'>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <?php include_once('footer.php');?>
	<script>
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
	</script>
</body>
    <script src="./javascript/home.js">
	</script> 
	<script src="./javascript/cart.js">
	</script> 
</html>
<?php 
    include ("viewbillmodal.php");
?>       