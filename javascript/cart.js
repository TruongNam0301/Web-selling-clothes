$(document).ready(function(){
     updateCartTotal();
     $('.cart-quantity-input').on('change',function(){
         updateCartTotal();
          let index = $(this).data('index');
          let value= $(this).val();
          $.ajax({
            url:'../views/cartPage/action.php',
            type:'POST',
            data:{index:index,quantity:value,action:'update'},
            success: function(res){
                console.log(res);   
            }
        })
     })

     $('.size').on('change',function(){
          let index = $(this).data('index');
          let value= $(this).val();
          $.ajax({
            url:'../views/cartPage/action.php',
            type:'POST',
            data:{index:index,size:value,action:'update'},
            success: function(res){
                console.log(res);   
            }
        })
     })

    $('.remove-item').on('click',function(){
        let index = $(this).data('index');
        let deleteButton =$(this).parents('.cart-row');
        $.ajax({
            url:'../views/cartPage/action.php',
            type:'POST',
            data:{index:index,action:'delete'},
            success: function(res){
                console.log(res);
                deleteButton.remove();
                updateCartTotal();
                $('.count').load('../views/cartPage/countItem.php');
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