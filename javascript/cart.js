if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
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
    addToCart(imageSrc,title,price);
}

function addToCart(imageSrc,title,price){
    var cartRow =document.createElement("div");
    cartRow.classList.add("cart-row");
    var cartItems=document.getElementsByClassName("cart-items")[0];
    var cartRowContent=`
    <div class="cart-item cart-column">
        <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
        <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column">${price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" value="1">
        <button class="btn btn-danger" type="button">REMOVE</button>
    </div>
    `
    cartRow.innerHTML=cartRowContent;
    cartItems.append(cartRow);
}


