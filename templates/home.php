<!DOCTYPE html>
<html>
<head>

	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js">
	</script>
	<script src="https://kit.fontawesome.com/65adf3fa6d.js">
	</script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/menubar.css" rel="stylesheet" type="text/css">
	<link href="../css/menu-mobile.css" rel="stylesheet" type="text/css">
	<link href="../css/main-home.css" rel="stylesheet" type="text/css">
	
	<title>Home</title>
</head>
<body>
	<div class="all">
		<!--menu-bar-->
		<?php include_once('menu_header.php');?><!--main-->
		<div class="main">
			<!--section1-->
			<section class="section1">
				<div class="background">
					<div class="wall">
						<p>HNH</p>
						<p>HUMAN & HEART</p>
					</div>
				</div>
			</section><!--section2-->
			<section class="section2">
				<div class="container">
					<div class="introduce">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="image-swapper">
									<div class="image-introduce"></div>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="text-swapper">
									<div class="text">
										<h1>HNH shop</h1>
										<p>In January 2015, HNH shop new creative director was announced as Alessandro Michele, who had worked behind-the-scenes at the label for over 12 years. Michele quickly transformed the historic house into one of fashion’s most-talked about brands, infusing its luxury aesthetic with an eclectic, retro edge. From impactful printed dresses to statement shoes and bold bags, each ornate design is impeccably crafted with the highest attention to detail. Look out for the label's maximalist homeware range –- expect beautifully crafted cushions, blankets and crockery.</p>
									</div>
								</div>
							</div>
						</div>
					</div><!--carousel-->
					<div class="mt-3">
						<div class='title-section'>
							<h2>Carousel</h2>
						</div>
						<div class="carousel slide" data-ride="carousel" id="myCarousel">
							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
								<li data-slide-to="1" data-target="#myCarousel"></li>
								<li data-slide-to="2" data-target="#myCarousel"></li>
							</ul><!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active"><img alt="pic1" height="400" src="../image/slide1.jpg" width="1100"></div>
								<div class="carousel-item"><img alt="pic2" height="400" src="../image/slide2.jpg" width="1100"></div>
								<div class="carousel-item"><img alt="pic3" height="400" src="../image/slide3.jpg" width="1100"></div>
							</div><!-- Left and right controls -->
							 <a class="carousel-control-prev" data-slide="prev" href="#myCarousel"><span class="carousel-control-prev-icon"></span></a> <a class="carousel-control-next" data-slide="next" href="#myCarousel"><span class="carousel-control-next-icon"></span></a>
						</div>
					</div><!--some best sale product-->
					<div class='title-section'>
						<h2>Collections</h2>
					</div>
					<div class='square-swap row'>
						<?php
                            include_once('../controllers/TypeClothesCtr.php');
                            $TypeClothesCtr = new TypeClothesCtr();
                            $TypeClothesCtr->getAllTypeClothes();
                        ?>
					</div>
					<div class='title-section'>
						<h2>best sale of shop</h2>
					</div>
					<div class="best-sale">
						<div class='bestsell row'>
                            <?php
                                include_once('../controllers/ClothesCtr.php');
                                $ClothesCtr = new ClothesCtr();
                                $ClothesCtr->getBestSell();
                            ?>
						</div>
					</div>
				</div>
			</section><!--section-footer-->
			<?php
			    include_once('footer.php');
			?>
		</div>
	</div><!--script-->
	<script src="../javascript/home.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
	</script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	</script>
</body>
</html>
<?php 
    include ("viewbillmodal.php");
?>

