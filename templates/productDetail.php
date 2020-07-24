<!DOCTYPE html>
<html>
<head>
	<title>product</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js">
	</script>
	<script src="https://kit.fontawesome.com/65adf3fa6d.js">
	</script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/product.css" rel="stylesheet" type="text/css">
	<link href="../css/menubar.css" rel="stylesheet" type="text/css">
	<link href="../css/menu-mobile.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once('menu_header.php');?>
	<section class="section1">
		<div class="background">
			<div class="wall">
				<div class='name-link' style='font-size:50px'>
					<?php 
						include_once('../controllers/productCtr.php');
						$productCtr = new productCtr();
						$productCtr->getName( $_GET['id']);
					 ?>
				</div>
				<div class='link'>
					<a href='#'>Home /</a> 
                    <a href='#'>Clothing /</a> 
                    <a href='#'><?php 
					                include_once('../controllers/TypeClothesCtr.php');
                                    $TypeClothesCtr = new TypeClothesCtr();
                                    $TypeClothesCtr->getOneTypeClothes( $_GET['idType']);
					            ?> /</a> 
					<a href='#'><?php 
									$productCtr = new productCtr();
									$productCtr->getName( $_GET['id']);
								?></a>
				</div>
			</div>
		</div>
	</section>
		<div id='all'>
			<div class='container'>
				<div class="row">
					<?php
						include_once('../controllers/ProductCtr.php');
						$ProductCtr = new ProductCtr();
						$ProductCtr->getProduct($_GET['id']);
					 ?>
				</div>
				<div class='relative'>
					<div class="relative-text">
						<hr>
					</div>
					<div class="best-sale">
						<div class='bestsell row'>
							<?php
								include_once('../controllers/ClothesCtr.php');
								$ClothesCtr = new ClothesCtr();
								$ClothesCtr->getRelativeClothes($_GET['id']);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		  include_once('footer.php');
		?>
		<script>
		$(document).ready(function(){
			$('.CartButton').on('click',function(){
				let id = <?php echo $_GET['id'] ?>;
				let quantity = $('.soluong').val();
				let size = $('#size').val();
				$.post('../views/action.php', { id:id,quantity:quantity,size:size,action:'add'},function(res){
					if(res==-1) alert('alredy in cart bro');
					console.log(res);
					$('.count').load('../views/cartPage/countItem.php');
				});
			});
		})
		</script>
		<script src="../javascript/home.js">
		</script> 
		<script src="../javascript/product.js">
		</script>
</body>
</html>
<?php 
    include ("viewbillmodal.php");
?>