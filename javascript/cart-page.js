 $(document).ready(function(){
    $('.count').load('../View/item-count.php') 
     updateCartTotal();
     $('.cart-quantity-input').on('change',function(){
         updateCartTotal();
     })
    $('.remove-item').on('click',function(){
        let index = $(this).data('index');
        let deleteButton =$(this).parents('.cart-row');
        $.ajax({
            url:'../Controller/xulygiohang.php',
            type:'POST',
            data:{index:index,action:'delete'},
            success: function(res){
                deleteButton.remove();
                updateCartTotal();
                $('.count').load('../View/item-count.php') 
            }
        })
        
    })
})
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