if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

if (localStorage.length>0){
    arrCart= JSON.parse(localStorage.getItem("cart"));
}
else {
    var arrCart=[];
}

function ready(){
    var addCartButton=document.getElementsByClassName("add-cart-btn");
   
    for (var i=0;i<addCartButton.length;++i){
        var button=addCartButton[i];
        button.addEventListener("click",addToCartClicked)
    }
    var gridIcon=document.querySelector(".grid-icon");
    var listIcon=document.querySelector(".list-icon");
    var gridView=document.querySelector(".product-gridview");
    var listView=document.querySelector(".product-listview");
    gridIcon.addEventListener("click",function(){
        gridView.style.display="block";
        listView.style.display="none";
    })
    listIcon.addEventListener("click",function(){
        gridView.style.display="none";
        listView.style.display="block";
    })
    
}
 
function addToCartClicked (){
    var button =event.target;
    var productRow=button.parentElement.parentElement.parentElement;
    var imageSrc=productRow.getElementsByClassName("item")[0].src;
    var title= productRow.getElementsByClassName("item-title")[0].innerText;
    var price= productRow.getElementsByClassName("item-price")[0].innerText;
    var objectProduct={image:imageSrc,title:title,price:price};
    
    var checked=arrCart.find(function(object){
        if(object.image===objectProduct.image) {
            alert("the item was available in the cart");
            return 1;
        }
    })
     if(typeof(checked)!=='object'){
        arrCart.push(objectProduct);
        localStorage.setItem("cart",JSON.stringify(arrCart));
     }
       
}





