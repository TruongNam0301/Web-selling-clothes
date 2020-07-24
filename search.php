<!DOCTYPE html>
<html>
<head>
	<title>product</title>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js">
	</script>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<script src="https://kit.fontawesome.com/65adf3fa6d.js">
	</script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/product-page.css" rel="stylesheet" type="text/css">
	<link href="./css/menubar.css" rel="stylesheet" type="text/css">
	<link href="./css/menu-mobile.css" rel="stylesheet" type="text/css">
	<link href="./css/main-home.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once('menu_header.php');?>
	<section class="section1">
		<div class="background">
			<div class="wall">
				<div class='name-link' style='font-size:50px'>
					Search
				</div>
				<div class='link'>
					<a href='home.php'>Home /</a> <a href='productsPage.php?type=1'>Clothing /</a> <a href='about.php'>About /</a> <a href='contact.php'>Contact /</a> <a href='#'>Search /</a>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="view-swap">
				<div class="choice-display">
                            <div class="icon grid-icon">
                                <a href='search.php?sort=0&&key-word=<?php echo $_SESSION['key-word']?>'><button class='btn-promote btn btn-primary'><i class="fas fa-arrow-up"></i></button></a>
                            </div>
                            <div class= "icon list-icon">
                                <a href='search.php?sort=1&&key-word=<?php echo $_SESSION['key-word']?>'><button class='btn-promote btn btn-primary'><i class="fas fa-arrow-down"></i></button></a>
                            </div>
                    </div>
			<!--grid-view-->
			<div class="product-gridview">
				<?php
                   include_once('../controllers/ClothesCtr.php'); 
				   @$_SESSION['key-word']=$_POST['search-key'];
				   @$key=$_SESSION['key-word'];
				   @$sort=isset($_GET['sort']) ? $_GET['sort'] : -1 ;
					if (isset($_GET['key-word']) ){
						   $_SESSION['key-word']=$_GET['key-word'];
						   $key=$_GET['key-word'];
					}
				   $ClothesCtr = new ClothesCtr();
				   $ClothesCtr->Search($key,$sort);
				?>
                
			</div>
		</div>
	</div>
        <?php
	        include_once('footer.php');
	    ?>
	<script src="./javascript/home.js">
	</script>
</body>
</html>
<?php 
    include ("viewbillmodal.php");
?>