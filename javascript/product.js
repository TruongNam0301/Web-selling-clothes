let num = parseInt($(".soluong").val())
$("#incre").on('click',function(){
    num+=1;
    $(".soluong").val(num)
})
$("#decre").on('click',function(){
    num-=1;
    if(num < 1) num=1;
    $(".soluong").val(num)
})


 