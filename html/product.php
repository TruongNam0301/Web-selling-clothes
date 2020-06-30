<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<div class='container'>
<div class="row">
<div class="col-6">
    <div class= 'image-product'>
    <img src="../image/s1.jpg" width="500" height="600"/>
    </div>
</div>
<div class="col-6">
    <div class= 'infor-product'>
        <h1>name</h1>
        <h2>price</h2>
        <p>available</p>
        <h2>description</h2>
        <div >
            <div class='text'>
            Quot semper vivendo ad vix, qui ad diam lucilius repudiare. Autem voluptua ius id. Invenire antiopam qualisque ne per, ei vim legimus accusam, tale nulla vim ut. Sea at omnium utroque delectus. Vivendo voluptaria vix ex, ei mei nobis clita detracto.
            </div>
        </div>
        <div>
            <div style="display:flex;flex-direction:row">
                <p>so luong: </p>
                <input class="soluong" style="height:40px;width:40px;text-align:center" value="1">
                <h3 class="incre">+</h3>
                <h3 class="decre">-</h3> 
                <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
                <script type = "text/javascript">
                    let num = parseInt($(".soluong").val())
                    $(".incre").on('click',function(){
                        num+=1;
                        $(".soluong").val(num)
                    })
                    $(".decre").on('click',function(){
                        num-=1;
                        if(num < 1) num=1;
                        $(".soluong").val(num)
                    })
                </script>
            </div>
            <label for="size">Choose size: </label>
            <select name="size" id="size">
                <option value="m">m</option>
                <option value="sm">sm</option>
                <option value="l">l</option>
                <option value="xl">xl</option>
            </select>
        </div>
        <button>ADD TO CART</button>
    </div>
    </div>
</div>
</div>