<!DOCTYPE html>
<html>
    <head>
        <title>About us</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/65adf3fa6d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/menubar.css">
        <link rel="stylesheet" type="text/css" href="../css/menu-mobile.css">
        <link rel="stylesheet" type="text/css" href="../css/main-home.css">
        <link rel="stylesheet" type="text/css" href="../css/contact.css">
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
                <div class="wall">
                    <div class='name-link' style='font-size:50px'>CONTACT</div>
                    <div class='link'>
                        <a href='home.php'> Home /</a>
                        <a href='productsPage.php?type=1'> Clothing /</a>
                        <a href='about.php'> About /</a>
                        <a href='#'> Contact /</a>
                    </div>
                </div>
            </div>
        </section>
    <!--main-contact-page-->  
        <section>
            <div class="container">
                <div class="background-contact"></div>
                <div class="contact-title"><h1>CONTACT US<h1></div>
                    <div class="pro-tip">When contacting us about your order kindly provide us your order number.
                        <p>Send us a text</p>
                    </div >
                    <form class="contact-form">
                        <input type="email" class="input-c-box" name="your-name" placeholder="Name">
                        <input type="text" class="input-c-box" name="your-mail" placeholder="Email">
                        <input type="text" class="input-c-box" name="your-phone" pattern="[0-9]" placeholder="Phone number">
                        <textarea type="text" class="input-c-box text-description" rows="4" cols="50"name="your-text" placeholder="Text"></textarea>
                        <input type="submit"  name="contact_submit" class="contact_button" value="contact">
                    </form>
                </div>
            </div>      
        </section>
            <!--section-footer-->
            <?php
                include 'footer.php';
            ?>
        </div>
            
    <!--script-->
    </body>
    <script src="../javascript/home.js"></script>
</html>