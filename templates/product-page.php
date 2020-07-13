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
                
        <!--grid-view-->
                <div class="product-gridview"> </div>   
            </div>
        </div>
    </body>
   <?php
   echo $_GET['idType'];
   ?>
    <script>
        function loadData (val=0,page=1){
            $.ajax({
                url:'../views/cartPage/action.php',
                data: {type:val,page:page,action:'show',num:3,limit:8},
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
            loadData(val,page);
        })
    </script>
    
    <script src="./../javascript/home.js"></script>
</html>