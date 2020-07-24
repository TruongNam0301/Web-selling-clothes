<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<script src="https://kit.fontawesome.com/65adf3fa6d.js">
	</script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/menubar.css" rel="stylesheet" type="text/css">
	<link href="./css/menu-mobile.css" rel="stylesheet" type="text/css">
	<link href="./css/contact.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="all">
		<!--menu-bar-->
		<?php
		    include 'menu_header.php';
		?>
        <!--background-->
		<section class="section1">
			<div class="background">
				<div class="wall">
					<div class='name-link' style='font-size:50px'>
						CONTACT
					</div>
					<div class='link'>
						<a href='home.php'>Home /</a> <a href='productsPage.php?type=1'>Clothing /</a> <a href='about.php'>About /</a> <a href='#'>Contact /</a>
					</div>
				</div>
			</div>
		</section>
        <!--main-contact-page-->
		<section>
			<div class="container">
				<div class="background-contact"></div>
				<div class="contact-title">
					<h1>CONTACT US</h1>
				</div>
				<div class="pro-tip">
					When contacting us about your order kindly provide us your order number.
					<p>Send us a text</p>
				</div>
				<form class="contact-form">
					<input class="input-c-box" name="your-name" placeholder="Name" type="email"> <input class="input-c-box" name="your-mail" placeholder="Email" type="text"> <input class="input-c-box" name="your-phone" pattern="[0-9]" placeholder="Phone number" type="text"> 
					<textarea class="input-c-box text-description" cols="50" name="your-text" placeholder="Text" rows="4"></textarea> <input class="contact_button" name="contact_submit" type="submit" value="contact">
				</form>
			</div>
		</section>
        <!--section-footer-->
        <?php
	     include 'footer.php';
	    ?>
	</div>
	<script src="../javascript/home.js">
	</script>
</body>
</html>