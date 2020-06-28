<?php
  $conn = mysqli_connect("localhost", "root","","sellclothes");
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if(isset($_POST['idType'])){
    $idType = $_POST['idType'];
    if($idType == 0){
      $sql="SELECT name,price,picture FROM clothes";
    }
    else{
      $sql = "SELECT name,price,picture FROM clothes WHERE id_type = $idType " ;
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
    $str = <<<EOD
      <div class="col-lg-4">
          <div class="product">
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