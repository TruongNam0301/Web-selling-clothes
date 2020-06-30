
<html>
    <head>
        <title>product</title>
        <title>About us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/product-page.css">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
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
                    <div class="wall"></div>
                </div>
            </section>
        <!--grid-list-view-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="check-product-board">
                            <div class="list-product">
                                <div class="product">
                                    <input type="radio" class="check" name = "type" value ="0" >
                                    <label>all</label>
                                </div>
                                <?php
                                $conn = mysqli_connect("localhost", "root","","sellclothes");
                                if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                }
                                $sql = "SELECT * FROM typeclothes";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)){
                                        echo <<<EOD
                                        <div class="product">
                                            <input type="radio" class="check" name = "type" value ="$row[id_type]">
                                            <label>$row[name_type]</label>
                                        </div>
                                        EOD;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="view-swap">
                            <div class="choice-display">
                                <div class="icon grid-icon">
                                    <i class="fas fa-th fa-lg "></i>
                                </div>
                                <div class= "icon list-icon">
                                    <i class="fas fa-list fa-lg"></i>
                                </div>
                            </div>
                    <!--grid-view-->
                            <div class="product-gridview">
                                <div class= 'row gridView' ></div>
                                <div class="pagination"> </div>
                            </div>
                            
                            <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
                            <script type = "text/javascript">

                                function loadData (val=0,page=1){
                                    $.ajax({ 
                                        type: 'POST', 
                                        data: {idType:val,page:page},
                                        url: "connect.php",   
                                        success : function(text){
                                            $('.gridView').html(text);
                                        }
                                    }) 
                                }
                               
                                function loadPagination(val,page=1){
                                    $.ajax({ 
                                        type: 'POST', 
                                        data: {idType:val,page:page},
                                        url: "pagination.php",   
                                        success : function(text){
                                            $('.pagination').html(text);
                                           
                                           
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
                                    $( "[name=type]" ).val( [val.toString()])
                                    loadData(val,page);
                                    loadPagination(val,page);   
                                    $(".check").on("click",function (){  
                                        val= $(this).val(); 
                                        loadData(val);
                                        loadPagination(val);
                                    });
                                    
                                    
                                })
                                    
                            
                                   
                    
                                
                                
                                
                            </script>
                        </div>
                    </div>
                </div>
            </div>
             <!--section-footer-->
            <?php
                include 'footer.php';
            ?>
        </div>

<!--script-->
    <script src="../javascript/home.js"></script>
    <script src="../javascript/product-page.js"></script>
    
    </body>
</html>