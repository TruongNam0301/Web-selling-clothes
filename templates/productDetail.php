<html>
    <head>
        <title>product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/product.css">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
    </head>
    <body>
    <?php include_once('menu_header.php');?>
            <section class="section1">
                <div class="background">
                    <div class="wall">
                    <div class='name-link' style='font-size:50px'>AOs</div>
                        <div class='link'>
                            <a href='#'> Home /</a>
                            <a href='#'> Clothing /</a>
                            <a href='#'> Ao</a>
                        </div>
                    </div>
                </div>
            </section>
        <div id='all'>
            <?php
                include_once('../controllers/ProductCtr.php');
                $ProductCtr = new ProductCtr();
                $ProductCtr->getProduct($_GET['id']);
            ?>
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
    </body>
    <script src="../javascript/home.js"></script>
    <script src="../javascript/product.js"></script>
</html>