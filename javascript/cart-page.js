
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
    
} else {
    ready()
}

function ready(){
    addToCart();
    updateCartTotal();
    var btnRemove=document.getElementsByClassName("btn-danger");
    for (var i=0;i<btnRemove.length;++i){
        var button= btnRemove[i];
        button.addEventListener("click",removeItemFromCart)
    }
    var cartQuantityInput= document.getElementsByClassName("cart-quantity-input");
    for (var i=0; i<cartQuantityInput.length; ++i){
        var input= cartQuantityInput[i];
        input.addEventListener("change",cartQuantityChangeValue)
    }
    
}

function cartQuantityChangeValue(event){
    var input = event.target;
    if(input.value<=0) input.value=1;
    updateCartTotal();
}


function addToCart(){
    var stringData=localStorage.getItem("cart");
    var dataCart=JSON.parse(stringData);
    return dataCart.map(function(data){
        var cartRow =document.createElement("div");
        cartRow.classList.add("cart-row");
        var cartItems=document.getElementsByClassName("cart-items")[0];
    var cartRowContent=`
    <div class="cart-item cart-column">
        <img class="cart-item-image" src="${data.image}" width="100" height="100">
        <span class="cart-item-title">${data.title}</span>
    </div>
    <span class="cart-price cart-column">${data.price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" value="1">
        <button class="btn btn-danger" type="button">REMOVE</button>
    </div>
    `
    cartRow.innerHTML=cartRowContent;
    cartItems.append(cartRow);
    })
}

function removeItemFromCart(){
    var stringData=localStorage.getItem("cart");
    var dataCart=JSON.parse(stringData);
    var button= event.target ;
    var productRow=button.parentElement.parentElement;
    var dataImage=productRow.getElementsByClassName("cart-item-image")[0].src;
    var index=dataCart.findIndex(function(object){
        return (object.image===dataImage)
    })
    dataCart.splice(index,1);
    localStorage.setItem("cart",JSON.stringify(dataCart));
    productRow.remove();
    updateCartTotal();
}

function updateCartTotal(){
    var cartItems=document.getElementsByClassName("cart-items")[0];
    var cartRow=cartItems.getElementsByClassName("cart-row");
    var total=0;
    for (var i=0; i<cartRow.length; ++i){
        var item=cartRow[i];
        var cartPrice = item.getElementsByClassName("cart-price")[0].textContent;
        var cartQuantityValue = item.getElementsByClassName("cart-quantity-input")[0].value;
        total+=(cartPrice*cartQuantityValue);
    }
    var cartTotal=document.getElementsByClassName('cart-total');
    var cartTotalPrice=document.getElementsByClassName('cart-total-price')[0];
    cartTotalPrice.innerText=total;
}