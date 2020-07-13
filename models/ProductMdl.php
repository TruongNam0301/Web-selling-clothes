<?php
    class ProductMdl{
        public function getProduct($id){
            $conn = mysqli_connect ("localhost","root","","sellclothes");
            $sql="SELECT * FROM clothes WHERE id= $id";
            $result = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            return $row;
        }
    }

?>