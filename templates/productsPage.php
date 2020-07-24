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
	<link href="../css/product-page.css" rel="stylesheet" type="text/css">
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
						include_once('../controllers/TypeCtr.php') ;
						$TypeCtr = new TypeCtr();
						$Type = $TypeCtr->getOneType( $_GET['type']);
					?>
				</div>
				<div class='link'>
					<a href='#'>Home /</a> 
					<a href='#'>Clothing /</a> 
					<a href='#'><?php         
									$TypeCtr = new TypeCtr();
					                $Type = $TypeCtr->getOneType( $_GET['type']);?></a>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="check-product-board">
					<div class="list-product">
						<div class="product">
							<input checked='checked' class="check" name="type" type="radio" value="0"> <label>all</label>
						</div>
						<?php                      
							include_once('../controllers/TypeClothesCtr.php');
							$ClothesCtr = new TypeClothesCtr();
							$ClothesCtr->getTypeClothes();
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="view-swap">
					<div class="choice-display">
						<div class="icon grid-icon">
							<i class="fas fa-th fa-lg"></i>
						</div>
						<div class="icon list-icon">
							<i class="fas fa-list fa-lg"></i>
						</div>
					</div><!--grid-view-->
					<div class="product-gridview"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	   include_once('footer.php');
	 ?>
	<script>
	   
	       function loadData (val=0,page=1,type){
	           $.ajax({
	                   url:'../views/action.php',
	                   data: {type:val,page:page,action:'show',num:4,limit:15,idType:type},
	                   type: 'POST',
	                   success: function (value){
	                       $('.product-gridview').html(value);
	                   }
	               })
	       }  

	       $(document).ready(function(){
	           val =  sessionStorage.getItem("check");
	           if(val==null) val =0;
	           let page = <?php if(isset($_GET['page'])){
	               echo $_GET['page'];
	           }
	           else {
	               echo 1;
	           }
	           ?>;
	           let type = <?php if(isset($_GET['type'])){
	               echo $_GET['type'];
	           }
	           else {
	               echo 0;
	           }
	           ?>;
	            $( "[name=type]" ).val( [val.toString()]);
	           loadData(val,page,type);
	           $(".check").on("click",function (){  
	               val= $(this).val(); 
	               sessionStorage.setItem("check", val)
	               loadData(val,page=1,type);
	           })
	           $('.aa').click(function(){
	               sessionStorage.setItem("check", 0)
	           });
	       })
	</script> 
	<script src="../javascript/home.js">
	</script>
</body>
</html>
<?php 
    include ("viewbillmodal.php");
?>