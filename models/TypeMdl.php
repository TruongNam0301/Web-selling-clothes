<?php
    class TypeMdl {
        public function getType(){
            $conn = mysqli_connect("localhost","root","","sellclothes");
            $sql = "SELECT * FROM types";
            $result = mysqli_query($conn,$sql);
            $type = array();
            if(mysqli_num_rows($result)>0){
                while($ty = mysqli_fetch_assoc($result)){
                    $type[] = $ty;
                }
                return $type;
            }
            else{
                return null;
            }
        }
    }


?>