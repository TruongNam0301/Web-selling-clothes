function myFunction(string){
    var s=document.getElementById(string);
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
var iconSearch =document.querySelector(".icon-search");
var searchSwapper=document.querySelector(".icon-menu .search-swapper");
iconSearch.addEventListener("click",function iconSearchClick(){
    if(searchSwapper.style.display)  searchSwapper.style.display="";
    else{
        searchSwapper.style.display="none"
    }
})
