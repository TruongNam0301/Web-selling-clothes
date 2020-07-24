if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
} 
 function ready(){
     ChangeLoginRegister();
     OpenAndExitLogin();
     validateRegisterForm();
    $('.count').load('./views/cartPage/countItem.php');
    $("input.text-input").on({
        keydown: function(e) {
          if (e.which === 32)
            return false;
        },
        change: function() {
          this.value = this.value.replace(/\s/g, "");
        }
    });
    $("input.text-name").on({
        keydown: function(e) {
          if (this.value.length === 0 && e.which === 32)
            e.preventDefault();
        }
    });
    $('.forgot-pass').on('click',function(){
        $('.login-form').css('display','none');
        $('.forgot-form').css('display','block');
    });
    $('.forgot-button').on('click',function(){
        let username = $('.check-user').val();
        if(username ==''){
            $('.error-user').text('* the user name not empty');
        }
        else{
            $.ajax({
                url:'./action.php',
                method:'POST',
                data:{username:username,action:'check-user'},
                success: function(data){
                    if(data==0){
                         $('.error-user').text('* the username not exist ');
                    }
                     else{  
                         $('.forgot-swapper').html(data)
                        validateForgotForm();     
                    };
                }
            })
        }
    });
};

    //login form function
 function validateRegisterForm() {
    $(".regis-content").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "name":{
                required: true,

            },
            "username": {
                required: true,
                email: true,
            },
            "password": {
                required: true,
                minlength: 4
            },
            "re-password": {
                equalTo: "#password",
                minlength: 4
                
            }
        },
        messages: {
            "name":{
                required: "* Bắt buộc nhập name",
            },

            "username": "* Bắt buộc nhập email",
            "password": {
                required: "* Bắt buộc nhập password",
                minlength: "* Hãy nhập ít nhất 4 ký tự"
            },
            "re-password": {
                equalTo: "* Hai password phải giống nhau",
                minlength: "* Hãy nhập ít nhất 4 ký tự"
            }
        }
    });
   
}  
function validateForgotForm() {
    $(".forgot-content").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "new-password": {
                required: true,
                minlength: 4
            },
            "re-new-password": {
                equalTo: "#new-password",
                minlength: 4
                
            }
        },
        messages: {
            "new-password": {
                required: "* Bắt buộc nhập password",
                minlength: "* Hãy nhập ít nhất 4 ký tự"
            },
            "re-new-password": {
                equalTo: "* Hai password phải giống nhau",
                minlength: "* Hãy nhập ít nhất 4 ký tự"
            }
        }
    });
}  


//click search-icon 
function displayONOFF(string){
    var s=document.getElementsByClassName(string)[0];
    if(s.style.display=="block") s.style.display="none";
    else if(s.style.display="none") s.style.display="block";
}

//open and exit menu-mobile by add class "active"
function menuActive(){
    document.getElementById("swapper").classList.add("active");
    document.getElementById("menu-exit").classList.add("exit");
}
function menuExit(){
    document.getElementById("swapper").classList.remove("active");
    document.getElementById("menu-exit").classList.remove("exit");
}

//change login to register function
function ChangeLoginRegister(){
    var loginForm=document.querySelector(".login-form");
    var regisForm=document.querySelector(".regis-form");
    var forgotForm=document.querySelector(".forgot-form");
    var btnLogin=document.querySelector(".login");
    var btnRegister=document.querySelector(".register");
   
    btnLogin.addEventListener("click",function(){
        loginForm.style.display="block";
        regisForm.style.display="none";
        forgotForm.style.display='none';
    });
    btnRegister.addEventListener("click",function(){
        regisForm.style.display="block";
        loginForm.style.display="none";
        forgotForm.style.display='none';
    })
}
//open and exit login register form function
function OpenAndExitLogin(){
    var iconLg=document.querySelector(".icon-login");
    var iconExitLg=document.querySelector(".exit-form-login");
    var LoginRegisSwapper=document.querySelector(".login-regis-swapper");
    iconLg.addEventListener("click",function(){
        if( LoginRegisSwapper.style.visibility!="visible")
         LoginRegisSwapper.style.transform=" translateX(0)";
    })
    iconExitLg.addEventListener("click",function(){
    LoginRegisSwapper.style.transform="translateX(100%)";
    })
}

//function jump to search page
