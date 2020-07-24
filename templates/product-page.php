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
                    <div class='name-link' style='font-size:50px'>
                    <?php 
                        include_once('../controllers/TypeClothesCtr.php');
                        $TypeClothesCtr = new TypeClothesCtr();
                        $TypeClothesCtr->getOneTypeClothes( $_GET['idType']);
                    ?>
                   </div>
                        <div class='link'>
                            <a href='home.php'> Home /</a>
                            <a href='#'> Clothing /</a>
                            <a href="productsPage.php?type=<?php echo $_GET['type']?>"> 
                                 <?php 
                        include_once('../controllers/TypeCtr.php');
                        $TypeCtr = new TypeCtr();
                        $TypeCtr->getOneType( $_GET['type']);
                    ?>/</a>
                            <a href='#'> <?php $TypeClothesCtr = new TypeClothesCtr();
                        $TypeClothesCtr->getOneTypeClothes( $_GET['idType']);?></a>
                        </div>
                    </div>
                </div>
            </section>
        <div class="container">
            <div class="view-swap">
                
        <!--grid-view-->
                <div class="product-gridview"> </div>   
            </div>
        </div>
    </body>
    <?php
                   include_once('footer.php');
                ?>
    <script>
        function loadData (val=0,page=1,type){
           
            $.ajax({
                url:'../views/action.php',
                data: {type:val,page:page,action:'show',num:3,limit:12,idType:type},
                type: 'POST',
                success: function (value){
                    $('.product-gridview').html(value);
                }
             })
        }  
        $(document).ready(function(){
            let val = <?php if(isset($_GET['idType'])){
                echo $_GET['idType'];
            }
            else {
                echo 0;
            }
            ?>;
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
                echo 1;
            }
            ?>;
           
            loadData(val,page,type);
        })
    </script>
    
    <script src="./../javascript/home.js"></script>
</html>
<?php 
    include ("viewbillmodal.php");
?>