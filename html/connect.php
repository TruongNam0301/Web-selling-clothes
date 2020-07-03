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
      $sql="SELECT id,name,price,picture FROM clothes LIMIT $start,12";
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
    $p=number_format($price,0,",",".");
    $str = "
      <div class='col-lg-4'>
          <div class='product sanpham'>
          <a href='product.php?id=$id'>
              <div class='image-item'>
                  <img src='../image/image_product/$image' class='item' style='z-index:-1' >
                  <div class='view-detail' >
                      <b>View Detail</b>
                </div>
              </div>
              
              <div class='item-detail' align='center'>
                  
                  <p class='item-title' style='font-size: large;color:#575652;transform: translate(0px,10px);'>$name</p>
                  <p class='item-price' style='color:#575652;'><b>$p <sup><u>đ</u></sup></b></p>
              </div>
              </a>
          </div>
      </div>";
    
    echo $str;
  }
  mysqli_close($conn);
?>