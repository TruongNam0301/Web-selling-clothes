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
    <section class="section1">
            <div class="background">
                <div class="wall">
                    <div class='name-link' style='font-size:50px'>Search</div>
                    <div class='link'>
                        <a href='home.php'> Home /</a>
                        <a href='productsPage.php?type=1'> Clothing /</a>
                        <a href='about.php'> About /</a>
                        <a href='contact.php'> Contact /</a>
                        <a href='#'> Search /</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="view-swap">
                
        <!--grid-view-->
                <div class="product-gridview">
                <?php
                    include_once('../controllers/ClothesCtr.php'); 
                    @$key=$_POST['search-key'];
                    $ClothesCtr = new ClothesCtr();
                    $ClothesCtr->Search($key);

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