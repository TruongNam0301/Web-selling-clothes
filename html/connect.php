<?php
  $conn = mysqli_connect("localhost", "root","","sellclothes");

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if(isset($_POST['idType'])&&isset($_POST['page'])){
    $idType = $_POST['idType'];
    $page = $_POST['page'];
    $start = ($page-1)*6;
    if($idType == 0){
      $sql="SELECT name,price,picture FROM clothes LIMIT $start,6";
    }
    else{
      $sql = "SELECT name,price,picture FROM clothes WHERE id_type = $idType LIMIT $start,6" ;
    }
  }

  $result = mysqli_query($conn,$sql);

  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)) {
      OutputDataGridView($row['name'],$row['price'],$row['picture']);
    }
  }
  else{
    echo "empty data";
  };

  function OutputDataGridView ($name,$price,$image){
    $money=number_format($price,0,",",".");
$str = <<<EOD
<div class="col-lg-4">
<div class="product">
<div class="image-item">
<img src='../image/image_product/$image' class='item' >
</div>
<div class="item-detail">
<p align="center" class="item-title">$name :</p>
<p align="center" class="item-price">$money <b>VND</b></p>

</div>
</div>
</div>
EOD;
    echo $str;
  }
  mysqli_close($conn);
?>