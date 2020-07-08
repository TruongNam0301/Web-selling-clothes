<?php
    $conn = mysqli_connect("localhost", "root","","sellclothes");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['idType'])){
        $idType = $_POST['idType'];
        if($idType == 0){
            $sql2="SELECT id FROM clothes ";
        }
        else{
            $sql2 = "SELECT id FROM clothes WHERE id_type = $idType " ;
        }
    }
    else {
        echo "ERROR";
    }
    $check =  mysqli_query($conn,$sql2);
    $totalSP = mysqli_num_rows($check);
    $numSP = 12;
    $numPage = ceil($totalSP / $numSP) ;
    $currentPage = $_POST['page'];
    $idType = $_POST['idType'];
    for ($i=1;$i<=$numPage;$i++){
        if($i==$currentPage)
            echo "<a style='margin:10px; background-color:red' class= 'btn btn-primary '  href='productPage.php?page=$i'>".$i. "</a>";
        else
            echo "<a style='margin:10px' class= 'btn btn-primary '  href='productPage.php?page=$i'>".$i. "</a>";
    }
?>