if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
 function ready(){
     ChangeLoginRegister();
     OpenAndExitLogin();
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
    var btnLogin=document.querySelector(".login");
    var btnRegister=document.querySelector(".register");
   
    btnLogin.addEventListener("click",function(){
        loginForm.style.display="block";
        regisForm.style.display="none";
    });
    btnRegister.addEventListener("click",function(){
        regisForm.style.display="block";
        loginForm.style.display="none";
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
