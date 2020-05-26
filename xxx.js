

//search-icon
function myFunction(string){
    var s=document.getElementById(string);
    if(s.style.display=="block") s.style.display="none";
    else if(s.style.display="none") s.style.display="block";
}
//menu-mobile
function menuActive(){
    
    document.getElementById("swapper").classList.add("active");
    document.getElementById("menu-exit").classList.add("exit");
}
function menuExit(){
    document.getElementById("swapper").classList.remove("active");
    document.getElementById("menu-exit").classList.remove("exit");
}

var iconSearch =document.querySelector(".icon-search");
var searchSwapper=document.querySelector(".icon-menu .search-swapper");
iconSearch.addEventListener("click",function iconSearchClick(){
    if(searchSwapper.style.display)  searchSwapper.style.display="";
    else{
        searchSwapper.style.display="none"
    }
})
//login
var loginForm=document.querySelector(".login-form");
var regisForm=document.querySelector(".regis-form");
var btnLogin=document.querySelector(".login");
var btnRegister=document.querySelector(".register");
var btnLg=document.querySelector(".icon-login");
var btnExitLg=document.querySelector(".exit-form-login");
var lgrsSwapper=document.querySelector(".login-regis-swapper");

btnLogin.addEventListener("click",function(){
		loginForm.style.display="block";
    regisForm.style.display="none";
});
btnRegister.addEventListener("click",function(){
		regisForm.style.display="block";
    loginForm.style.display="none";
})

btnLg.addEventListener("click",function(){
    if(lgrsSwapper.style.visibility!="visible")
    lgrsSwapper.style.transform=" translateX(0)";
})
btnExitLg.addEventListener("click",function(){
   lgrsSwapper.style.transform="translateX(100%)";
})
