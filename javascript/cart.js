$(document).ready(function(){
     updateCartTotal();
    
     $('.cart-quantity-input').on('change',function(){
         updateCartTotal();
          let index = $(this).data('index');
          let value= $(this).val();
          $.ajax({
            url:'../views/action.php',
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
            url:'../views/action.php',
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
            url:'../views/action.php',
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

    $('.btn-purchase').on("click",function(){
         validateForm();
        let total= $('.cart-total-price').text().replace(',','');
        $('#total').val(total);
        checkUser=checkUserLogin();
        checkCart=checkCart();
        if(checkUser==0){
            alert('You must login to purchase!!');
            $(this).removeAttr('data-target');
        }
        else if(checkCart==0){
            alert('Cart is empty!!');
            $(this).removeAttr('data-target'); 
        }
        else{
            $(this).attr('data-target','#BoxModal');
        }
    })
    $('#form-buy').on('submit',function(){
            
        var check = confirm("Are you sure to buy ?");
        return check;
    })
})
function validateForm() {
    $("#form-buy").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "sdt":{
                required: true,
            },
            "address":{
                required: true,
            },
        },
        messages: {
            "name":{
                required: "* Bắt buộc nhập name"
            },
            "price":{
                required: "* Bắt buộc nhập price"
            },
            "file": {
                required: "* Bắt buộc nhập file"
            
            },
        }
    });
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function updateCartTotal(){
    var cartItems=document.getElementsByClassName("cart-items")[0];
    var cartRow=cartItems.getElementsByClassName("cart-row");
    var total=0;
    for (var i=0; i<cartRow.length; ++i){
        var item=cartRow[i];
        var cartPrice = item.getElementsByClassName("cart-price")[0].textContent.replace('.','');
        var cartQuantityValue = item.getElementsByClassName("cart-quantity-input")[0].value;
        total+=(cartPrice*cartQuantityValue);
    }
    var cartTotal=document.getElementsByClassName('cart-total');
    var cartTotalPrice=document.getElementsByClassName('cart-total-price')[0];
    var n= total.toString().split('.');
    cartTotalPrice.innerText=n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")+(n.length>1?"."+n[1]:"");
}