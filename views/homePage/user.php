<style>
    .imageUser{
        margin-top:20px;
        margin-left:80px
    }
    .imageUser img{
        height:200px;
        width:200px;
        border-radius:50%;
        border: 3px solid red;
    }
    .exit-form-login{
        float:right;
        margin-right:40px;
        margin-top:20px;
    }
    .name{
        margin-top:10px;
        margin-left:100px
    }
    .update-infor{
        margin-top:30px;
    }
</style>
    <div class="exit-form-login"><i class="fas fa-times fa-lg" style="cursor:pointer;"></i></div>
        <div class='imageUser'>
            <img src='../image/image-user/<?php echo $user['image'] ?>' class='item' style='z-index:-1' >
        </div>
        <div class='name'><?php echo $user['name'] ?></div>
        <div class = 'update-infor'>
            <?php
                 if($user['lv']==1){
                    echo "<button type='button' class='button-admin btn btn-warning'><a href='/web-selling-clothes/admin-test'> ADMIN PAGE</a></button>";
                }
            ?>
            <button type="button" class="button-update btn btn-primary">UPDATE INFOR</button>
            <?php
                include_once('updateInfor.php');
               
            ?>
        </div>
    </div>
<script>
    $(".button-logout").on('click',function(){
        $.post('../views/homePage/logout.php',{action:'logout'},function(){
            $(".user").css("display", "none");
            $(".login-regis").css("display", "block");
            location.reload();
        });
    })
    $(".login-regis").css("display", "none");
    $(".exit-form-login").on('click',function(){
        $(".login-regis-swapper").css("transform","translateX(100%)");
    })
    $(".button-update").on('click',function(){
        $(".update-swapper").toggleClass('active-update-form');
    })
</script>


