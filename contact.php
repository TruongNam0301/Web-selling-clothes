<?php 
		if(isset($_SESSION['user']) && isset($_POST['contact_submit'])){
			if($_POST['contact_submit']=='CONTACT'){
				$user=$_SESSION['user']['id'];
				$string=$_POST['your-text'];
				include_once("/controllers/ContactCtr.php");
				$ContactCtr=new ContactCtr;
				$ContactCtr->UpContactToAdmin($user,$string);
			}
		}
?>
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
				<form class="contact-form" method="post" action="">
					<textarea id="inputString" class="input-c-box text-description" cols="50" name="your-text" placeholder="Text" rows="4"></textarea> 
					<input class="contact_button" name="contact_submit" type="submit" value="CONTACT">
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
	function checkEmptyText(){
		var input = document.getElementById("inputString").value;
		return input;
	}
	$(document).ready(function(){
		check=checkUserLogin();
		checkInput=checkEmptyText();
		$(".contact_button").on("click",function(e){
			if(check==0){
				alert("You must login to Contact us");
				e.preventDefault();
			}
			else{
				if(checkInput.trim()==''){
					alert("You must write something to Contact us");
					e.preventDefault();
				}
			}
		})
		
		
	})
</script>
</body>
</html>
<?php 
    include ("viewbillmodal.php");
?>