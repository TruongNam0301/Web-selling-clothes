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
                        include_once('../controllers/TypeCtr.php') ;
                        $TypeCtr = new TypeCtr();
                        $Type = $TypeCtr->getOneType( $_GET['type']);
                        ?></div>
                        <div class='link'>
                            <a href='home.php'> Home /</a>
                            <a href='#'> Clothing /</a>
                            <a href='#'> <?php  ;
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
                                <input type="radio" class="check" name = "type" value ="0" checked='checked'>
                                <label>all</label>
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
                                <a href='productsPage.php?type=<?php echo $_GET['type']?>&&sort=0'><button class='btn-promote btn btn-primary'><i class="fas fa-arrow-up"></i></button></a>
                            </div>
                            <div class= "icon list-icon">
                                <a href='productsPage.php?type=<?php echo $_GET['type']?>&&sort=1'><button class='btn-promote btn btn-primary'><i class="fas fa-arrow-down"></i></button></a>
                            </div>
                        </div>
                <!--grid-view-->
                        <div class="product-gridview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
     <?php
                   include_once('footer.php');
                ?>
    <script>
    
        function loadData (val=0,page=1,type){
            sort=<?php if(isset($_GET['sort'])) 
                            echo $_GET['sort']; 
                        else 
                            echo -1;
                    ?>;
            $.ajax({
                    url:'../views/action.php',
                    data: {type:val,page:page,action:'show',num:4,limit:15,idType:type,sort:sort},
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
    
    <script src="./../javascript/home.js"></script>
</html>
<?php 
    include ("viewbillmodal.php");
?>