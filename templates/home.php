<html>
    <head>
        <title>HNH SHOP</title>
    </head>
    <body >
        <div class="all">
<!--menu-bar-->
    <?php include_once('menu_header.php');?>
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
                        <div class='title-section'><h2>Carousel</h2></div>
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
                                    <img src="../image/slide1.jpg" alt="pic1" width="1100" height="400">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="../image/slide2.jpg" alt="pic2" width="1100" height="400">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="../image/slide3.jpg" alt="pic3" width="1100" height="400">
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
                        <div class='title-section' ><h2>Collections</h2></div>
                        <div class='square-swap row' >
                            <?php
                                  include_once('../controllers/TypeClothesCtr.php');
                                  $TypeClothesCtr = new TypeClothesCtr();
                                  $TypeClothesCtr->getAllTypeClothes();
                            ?>
                         </div>
                         <div class='title-section' ><h2> best sale of shop</h2></div>
                        <div class="best-sale">
                            <div class='bestsell row'>
                                <?php
                                     include_once('../controllers/ClothesCtr.php');
                                     $ClothesCtr = new ClothesCtr();
                                     $ClothesCtr->getBestSell();
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

        <!--section-footer-->
                <?php
                   include_once('footer.php');
                ?>
            </div>
        </div>

<!--script-->
       
        
        
    </body>
</html>

