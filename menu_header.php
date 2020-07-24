<?php
session_start();
include_once('./controllers/AccountCtr.php');
$AccountCtr = new AccountCtr();
$AccountCtr->register();   
$AccountCtr->updateUserInfor();   
$AccountCtr->updatePass();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js" type="text/javascript">
</script>
<div class="header">
    <div class="mg-left-right">
        <div class="row">
            <div class="col-lg-2 col-5">
                <div class="logo"><img height="100px" src="./image/Untitled.png" style="float:left" width="100px"></div>
                <div class="icon-menu2">
                    <a href="#"><i class="fas fa-bars fa-lg" id="menu-click" onclick="menuActive()"></i></a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="menu-bar">
                    <ul class="menu">
                        <li class="menu-item home">
                            <a href="home.php">HOME</a>
                        </li>
                        <li class="menu-item clothing">CLOTHING <i class="fas fa-angle-down"></i>
                            <div class="list-clothing">
                                <ul class="item-clothing">
                                    <?php
                                        include_once('./controllers/TypeCtr.php');
                                        $Type = new TypeCtr();
                                        $Type->getType();
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item accessories">
                            <a class="hov" href="#">ACCESSORIES<i class="fas fa-angle-down"></i></a>
                            <div class="dropdown-menu list-accessories">
                                <ul class=" item-accessories">
                                    <li>
                                        <a href="#">HATS</a>
                                    </li>
                                    <li>
                                        <a href="#">JEWERLS</a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item about">
                            <a href="./about.php">ABOUT US</a>
                        </li>
                        <li class="menu-item contact">
                            <a href="./contact.php">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-7">
                <div class="icon-menu">
                    <div class="icon-search">
                        <i class="fas fa-search fa-lg" onclick="displayONOFF('search-swapper')"></i>
                        <div class="search-swapper" style="display: none;">
                            <form action="search.php" class="search-content" method='post'>
                                <div class="search">
                                    <input name="search-key" style="height:30px;" type="text"> <button class="btn btn-danger" id="search-button" type="submit">SEARCH</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="icon-bag">
                        <a href="cart.php"><i class="fas fa-shopping-bag fa-lg"></i></a>
                        <div class='count'></div>
                    </div>
                    <div class="icon-login">
                        <div class="icon-login">
                            <i class="fas fa-lock-open fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--login-->
<div class="login-regis-swapper">
    <div class="login-regis">
        <div class="lg-rg-button">
            <div class="login">
                Login
            </div>
            <div class="register">
                Register
            </div>
            <div class="exit-form-login">
                <i class="fas fa-times fa-lg"></i>
            </div>
        </div>
        <div class="login-form">
            <div class="login-swapper">
                <form class="login-content" method='post'>
                    <input class='text-input' name="username" placeholder="USERNAME" type="text"> <input class='text-input' name="password" placeholder="PASSWORD" type="password">
                    <div class='error-login'></div>
                    <div class="forgot-pass">
                        Forgot your password
                    </div><input class='login-button' name="btn_submit" type="submit" value="login">
                </form>
            </div>
        </div>
        <div class="regis-form" style="display:none">
            <div class="regis-swapper">
                <form class="regis-content" method="post">
                    <input class='text-name' name="name" placeholder="name" type="text"> <input class='text-input' name="username" placeholder="USERNAME" type="text"> <input class='text-input' id='password' name="password" placeholder="PASSWORD" type="password"> <input class="cf-password" id='re-password' name="re-password" placeholder="PASSWORD" type="password"> <input class="regis_button" name="regis_submit" type="submit" value="register">
                    <div class="error_signup"></div>
                </form>
            </div>
        </div>
        <div class="forgot-form" style="display:none">
            <div class="forgot-swapper">
                <div class="forgot-content">
                    <input class='check-user' name="username" placeholder="USERNAME" type="text">
                    <div class='error-user'></div><input class='forgot-button' name="btn_submit" type="submit" value="Next">
                </div>
            </div>
        </div>
    </div>
    <div class='user'>
        <?php
            if(isset($_SESSION['user'])){
                $user=$_SESSION['user'];
                include_once('./views/homePage/user.php');
            }
            else {
                $AccountCtr = new AccountCtr();
                $AccountCtr->checkLogin(1,1);   
            }
        ?>
    </div>
</div><!--menu-mobile-->
<div class="main-swap">
    <div id="menu-exit">
        <i class="fas fa-times fa-lg" onclick="menuExit()"></i>
    </div>
    <div id="swapper">
        <div class="menu2">
            <ul>
                <li class="mb-list mb-list-home">
                    <a href="#">Home</a>
                </li>
                <li class="mb-list title-main">
                    <a href="#">Clothing <span onclick="displayONOFF('mb-clothing')"><i class="fas fa-angle-down"></i></span></a>
                    <div class="mb-clothing" style="display:none;">
                        <ul class="mb-list-clothing">
                        <?php
                            include_once('./controllers/TypeCtr.php');
                            $Type = new TypeCtr();
                            $Type->getTypeIpad();
                        ?>
                        </ul>
                    </div>
                </li>
                <li class="mb-list title-main">
                    <a href="#">accessories <span onclick="displayONOFF('mb-accessories')"><i class="fas fa-angle-down"></i></span></a>
                    <div class="mb-accessories" style="display:none;">
                        <ul class="mb-list-clothing">
                            <li>
                                <a href="#">item1</a>
                            </li>
                            <li>
                                <a href="#">item2</a>
                            </li>
                            <li>
                                <a href="#">item3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-list">
                    <a href="./html/about.php">about us</a>
                </li>
                <li class="mb-list">
                    <a href="./html/contact.php">contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>


    

