<?php
     if($_POST["action"] == "Load")  
     {  
        include_once("../admin-test/models/DataProvider.php");
        $db=new DataProvider();
        $sql="SELECT * FROM `clothes`";
        $array=$db->FetchAll($sql);
        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
        <thead>
            <tr>
                <th>STT</th>
                <th>Id_Type</th>
                <th>Name</th>
                <th>Price</th>
                <th>Pic</th>
                <th>Button</th>
            </tr>
        </thead>
       
        <tbody >";
        foreach($array as $item){
            $p=number_format($item['price'],0,",",".");
            echo "<tr>";
                echo "<td class='id'>$item[id]</td>";
                echo "<td class='type'>$item[id_type]</td>";
                echo "<td class='name'>$item[name]</td>";
                echo "<td class='price'>$p</td>";
                echo "<td><img src='../admin-test/image/image_product/$item[picture]' class='image' style='width:100px; height:50px' ></td>";
                echo "<td><button class='btn-edit btn btn-primary' data-toggle='modal' data-target='#exampleModal'>EDIT</button><button class='btn-delete btn btn-danger'>DELETE</button></td>";
            echo "</tr>";
        }   
        echo " </tbody>
        </table>";
     }
     else if($_POST["action"] == "save") {
        $file = $_FILES['file'];
        print_r($file);
     }


?>