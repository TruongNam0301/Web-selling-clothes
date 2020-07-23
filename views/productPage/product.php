<div class='container'>
    <div class="row">
        <div class="col-md-6">
            <div class= 'image-product'>
            <img src="../image/image_product/<?php echo $product['picture']?>" width="500" height="600"/>
            </div>
        </div>
        <div class="col-md-6" style="color:#555756">
            <div class= 'infor-product'>
                <h1><?php echo $product['name']?></h1>
                <h2>
                    <?php 
                        $money=number_format($product['price'],0,".",",");
                        echo $money ."<b> <sup><u>đ</u></sup></b>";
                    ?>
                </h2>
                <p>available</p>
                <h2>description</h2>
                <div >
                    <div class='text' style="margin-bottom: 20px;">
                    Quot semper vivendo ad vix, qui ad diam lucilius repudiare. Autem voluptua ius id. Invenire antiopam qualisque ne per, ei vim legimus accusam, tale nulla vim ut. Sea at omnium utroque delectus. Vivendo voluptaria vix ex, ei mei nobis clita detracto.
                    </div>
                </div>
                <hr>
                <div class="pickOptions">
                    <div style="display:flex;flex-direction:row; margin-bottom:10px">
                        <p style="margin-top:5px">so luong: </p>
                        <button id="decre"><i class="fa fa-minus"  aria-hidden="true"></i></button>
                        <input class="soluong" style="height:40px;width:40px;text-align:center" value="1">
                        <button id="incre"><i class="fa fa-plus"  aria-hidden="true"></i></button>
                    </div>
                    <label for="size">Choose size: </label>
                    <select name="size" id="size" style="margin-left: 14px;">
                        <option value="M">M</option>
                        <option value="SM">SM</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="CartButton"><button id="addToCartButton">ADD TO CART</button></div>
            </div>
        </div>
    </div>
</div>