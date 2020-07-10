<?php
    session_start();
    if(isset($_SESSION['account'])){
        $acc=$_SESSION['account'];
    }
    else{
        $acc='';
    }
?>
<html>  
    <div class="header" >
    <div class="mg-left-right " >
        <div class="row">
            <div class="col-lg-2 col-5">
                <div class="logo">
                <img src="../image/Untitled.png" width="100px" height="100px" style="float:left">
                </div>
                <div class="icon-menu2">
                    <a href="#"><i id="menu-click" onclick="menuActive()" class="fas fa-bars fa-lg" ></i></a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="menu-bar">
                    <ul class="menu">
                        <li class="menu-item home"><a href="../html/home.php"> HOME</a></li>
                        <li class="menu-item clothing"><a class="hov" href="../html/productPage.php">CLOTHING <i class="fas fa-angle-down"></i></a>
                            <div class="list-clothing">
                                <ul class="item-clothing">
                                    <li class="first"> <a href="#">item1 </a>
                                        <div class="second">
                                            <ul class="list-item">
                                                <li><a href="#">aaaaaa</a></li>
                                                <li><a href="#">aaaaaa</a></li>
                                                <li><a href="#">aaaaaa</a></li>
                                                <li><a href="#">aaaaaa</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="first"> <a href="#">item2 </a>
                                        <div class="second">
                                            <ul class="list-item">
                                                <li><a href="#">bbbbbb</a></li>
                                                <li><a href="#">bbbbbb</a></li>
                                                <li><a href="#">bbbbb</a></li>
                                                <li><a href="#">bbb</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="first"> <a href="#">item3</a>
                                        <div class="second">
                                            <ul class="list-item">
                                                <li><a href="#">cccccc</a></li>
                                                <li><a href="#">cccccc</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="first"><a href="#"> item4</a>
                                        <div class="second">
                                            <ul class="list-item">
                                                <li><a href="#">ddddd</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item accessories"><a class="hov" href="#">ACCESSORIES<i class="fas fa-angle-down"></i></a>
                            <div class="dropdown-menu list-accessories">
                                <ul class=" item-accessories">
                                    <li> <a href="#">item1</a></li>
                                    <li><a href="#"> item1</a></li>
                                    <li><a href="#"> item1</a></li>
                                    <li> <a href="#">item1</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item about"><a href="../html/about.php">ABOUT US</a></li>
                        <li class="menu-item contact"><a href="../html/contact.php">CONTACT</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-7">
            <div class="show-user" style=" height: 50px;,  width: 150px;transform: translate(0px, 30px);">
                <?php 
                    include_once("../View/display-user.php")
                ?>
            </div>
                <div class="icon-menu">
                    <div class="icon-search">
                    <i onclick="displayONOFF('search-swapper')" class="fas fa-search fa-lg"></i>
                    <div class="search-swapper" style="display: none;">
                        <form>
                            <div class="search">
                                <input type="text">
                                <button type="button" class="btn btn-danger">SEARCH</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="icon-bag">
                        
                        <a href="../html/cart-page.php"><i class="fas fa-shopping-bag fa-lg"></i></a>
                        <div class= 'count'>
                       </div>
                    </div>
                    <div class="icon-login">
                        <div class="icon-login">
                            <a href="#"><i class="fas fa-lock-open fa-lg"></i></a>
                        </div>
                    </div>
                    
                </div>
                <div class="update-info" style="display: none;">
                        <form class="update">
                            <input type="hidden" id="users_info" name="users_info" class="users_info" value=<?php echo "$acc" ?> >
                            <input type="text" id="address" name="address" class="address" placeholder="Address">
                            <input type="text" id="phone" name="phone" class="phone" placeholder="Phone Number">
                            <div class="error_update"></div>
                            <input type="submit" class="btn btn-danger" value="UPDATE"></button>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--login-->
<div class="login-regis-swapper">
    <div class="login-regis">
        <div class="lg-rg-button">
            <div class="login">Login</div>
            <div class="register"> Register</div>
            <div class="exit-form-login"><i class="fas fa-times fa-lg"></i></div>
        </div>
        <div class="login-form">
            <div class="login-swapper">
                <form class="login-content">
                <input type="text" id="username" name="username" class="lg-uesrname" placeholder="USERNAME">
                <input type="password" id="password" name="password" class="lg-password" placeholder="PASSWORD">
                <div class="forgot-pass"><a href="#"> Forgot your password</a></div>
                <input type="submit" value="login">
                <div class="error_login"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="regis-form" style="display:none">
        <div class="regis-swapper">
            <form class="regis-content" method="post" action="server.php">
                
                <input type="text" id="name" name="rusername" class="rname" placeholder="name">
                <input type="text" id="regis-username" name="rg-username" class="rg-username" placeholder="USERNAME">
                <input type="text" id="confirm-username" name="cf-username" class="cf-username" placeholder="CONFIRM USERNAME">
                <input type="password" id="regis-password" name="rg-password" class="rg-password" placeholder="PASSWORD">
                <input type="password" id="confirm-password" name="cf-password" class="cf-password" placeholder="PASSWORD">
                <input type="submit"  name="reg_user" class="reg_user" value="register">
                <div class="error_signup"></div>
            </form>
        </div>
    </div>
</div>

<!--menu-mobile-->
<div class="main-swap">
    <div id="menu-exit"><i onclick="menuExit()" class="fas fa-times fa-lg"></i></div>
    <div id="swapper">
        <div class="menu2">
            <ul >
                <li class="mb-list mb-list-home"><a href="#"> Home </a></li>
                <li class="mb-list title-main"> <a href="#">Clothing  <span onclick="displayONOFF('mb-clothing')"><i class="fas fa-angle-down"></i></span></a>
                    <div class="mb-clothing" style="display:none;">
                        <ul class="mb-list-clothing">
                            <li><a href="#">item1</a>
                                <div class="mb-item">
                                    <ul>
                                        <li><a href="#">aaaaaa</a></li>
                                        <li><a href="#">aaaaaa</a></li>
                                        <li><a href="#">aaaaaa</a></li>
                                        <li><a href="#">aaaaaa</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">item2</a>
                                <div class="mb-item">
                                    <ul>
                                        <li><a href="#">bbbb</a></li>
                                        <li><a href="#">bbbb</a></li>
                                        <li><a href="#">bbb</a></li>
                                        <li><a href="#">bbbb</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">item3</a>
                                <div class="mb-item">
                                    <ul>
                                        <li><a href="#">ddd</a></li>
                                        <li><a href="#">dddd</a></li>
                                        <li><a href="#">ddd</a></li>
                                        <li><a href="#">ddd</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-list title-main"><a href="#">accessories <span onclick="displayONOFF('mb-accessories')"><i class="fas fa-angle-down"></i></span></a>
                    <div class="mb-accessories" style="display:none;">
                        <ul class="mb-list-clothing">
                            <li><a href="#">item1</a>  
                            </li>
                            <li><a href="#">item2</a>
                            </li>
                            <li><a href="#">item3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-list"><a href="../html/about.php">about us</a></li></li>
                <li class="mb-list"><a href="../html/contact.php">contact</a></li>
            </ul>
        </div>
    </div>  
</div>
</html>
<script src="../javascript/home.js"></script>