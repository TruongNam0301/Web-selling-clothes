<html>
    <head>
        <title>product</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/product-page.css">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
    </head>
    <body>
    
    <?php include_once('menu_header.php');?>
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
    </body>
   
   
   
    
    <script src="../javascript/home.js"></script>
</html>
<?php 
    include ("viewbillmodal.php");
?>