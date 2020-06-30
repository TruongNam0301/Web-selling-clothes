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
      $sql="SELECT id,name,price,picture FROM clothes LIMIT $start,6";
    }
    else{
      $sql = "SELECT id,name,price,picture FROM clothes WHERE id_type = $idType LIMIT $start,6" ;
    }
  }

  $result = mysqli_query($conn,$sql);

  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)) {
      OutputDataGridView($row['id'],$row['name'],$row['price'],$row['picture']);
    }
  }
  else{
    echo "empty data";
  };

  function OutputDataGridView ($id,$name,$price,$image){
    $str = <<<EOD
      <div class="col-lg-4">
          <div class="product sanpham" data-id=$id>
              <div class="image-item">
                  <img src='../image/image_product/$image' class='item' >
              </div>
              <div class="item-detail">
                  <span class="item-title">$name</span>
                  <span class="item-price">$price</span>
              </div>
          </div>
      </div>
    EOD;
    echo $str;
  }
  mysqli_close($conn);
?>