<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
        <title>Exercise</title>
    </head>
    <body >
        <div class="all">
<!--menu-bar-->
           <?php
                include 'menu_header.php';
           ?>
            
    <!--main-->
            <div class="main">

        <!--section1-->
                <section class="section1">
                    <div class="background">
                        <div class="wall">
                            <p>HNH</p>
                            <p>HUMAN & HEART</p>
                        </div>
                    </div>
                </section>
 
        <!--section2-->
                <section class="section2">
                    <div class="container">
                        <div class="introduce">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="image-swapper">
                                        <div class="image-introduce"></div>
                                    </div>
                                </div>
                                 <div class="col-lg-6 col-12">
                                    <div class="text-swapper">
                                        <div class="text">
                                            <h1>HNH shop</h1>
                                            <p>In January 2015, HNH shop new creative director was announced as Alessandro Michele, who had worked behind-the-scenes at the label for over 12 years. Michele quickly transformed the historic house into one of fashion’s most-talked about brands, infusing its luxury aesthetic with an eclectic, retro edge. From impactful printed dresses to statement shoes and bold bags, each ornate design is impeccably crafted with the highest attention to detail. Look out for the label's maximalist homeware range –- expect beautifully crafted cushions, blankets and crockery.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div> 

                <!--carousel-->
                        <div class="mt-3">
                            <h2>Carousel</h2>
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ul>
                    
                    <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="../image/slide1.jpg" alt="pic1" width="1100" height="300">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="../image/slide2.jpg" alt="pic2" width="1100" height="300">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="../image/slide3.jpg" alt="pic3" width="1100" height="300">
                                    </div>
                                </div>
                
                    <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>

                <!--some best sale product-->
                        <div class="best-sale">
                            <h1> best sale of shop</h1>
                            <div class='row'>
                                <div class='col-lg-3 col-6 image-product'>
                                    <div class="pic"> <img src="../image/s1.jpg"></div>
                                    <div class="frames">
                                        <p>ssssssssssss</p>
                                        <p>2222222</p>
                                    </div>
                                </div>
                                <div class='col-lg-3 col-6 image-product'>
                                    <div class="pic"> <img src="../image/s1.jpg"></div>
                                    <div class="frames">
                                        <p>ssssssssssss</p>
                                        <p>2222222</p>
                                    </div>
                                </div>
                                <div class='col-lg-3 col-6 image-product'>
                                    <div class="pic"> <img src="../image/s1.jpg"></div>
                                    <div class="frames">
                                        <p>ssssssssssss</p>
                                        <p>2222222</p>
                                    </div>
                                </div>
                                <div class='col-lg-3 col-6 image-product'>
                                    <div class="pic"> <img src="../image/s1.jpg"></div>
                                    <div class="frames">
                                        <p>ssssssssssss</p>
                                        <p>2222222</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <!--section-footer-->
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>

<!--script-->
        <script src="../javascript/home.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>