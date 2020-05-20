function myFunction(){
    var s=document.getElementById("clothing");
    if(s.style.display=="block") s.style.display="none";
    else if(s.style.display="none") s.style.display="block";
    
}
function menuActive(){
    
    document.getElementById("swapper").classList.add("active");
    document.getElementById("menu-exit").classList.add("exit");
}
function menuExit(){
    document.getElementById("swapper").classList.remove("active");
    document.getElementById("menu-exit").classList.remove("exit");
}