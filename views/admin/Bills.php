<?php
    foreach($array as $item){
        @$p=number_format($item['total'],0,",",".");
        $check=$item['tinhtrang'];
        if($check==0)$check = 'UNPAID';
        else $check= 'PAID';
        echo "<tr>";
        echo "<td ><img src='./image/image-user/$item[image]' class='image' style='width:100px; height:50px' ></td>";
            echo "<td class='name'>$item[name]</td>";
            echo "<td class='sdt'>$item[sdt]</td>";
            echo "<td class='address'>$item[address]</td>";
            echo "<td class='date'>$item[date]</td>";
            echo "<td class='tinhtrang' data-value='$item[tinhtrang]'>$check</td>";
            echo "<td class='total'>$p</td>";
            echo "<td><button class='btn-edit btn btn-primary' data-mahd=$item[MaHD] data-toggle='modal' data-target='#exampleModal' style='margin:2px 0px 0px 20px; width:150px'>EDIT</button>";
            echo "<a href='chitiet_hoadon.php?MaHD=$item[MaHD]&&tt=$_GET[tt]'><button class='btn-detail btn btn-success' style='width:150px;margin:2px 0px 0px 20px' >VIEW DETAIL</button></a> ";
            echo "<a href='?tt=$_GET[tt]&&action=delete&&MaHD=$item[MaHD]'><button class='btn-delete btn btn-danger' style='width:150px;margin:2px 0px 0px 20px' >DELETE</button></td> ";
        echo "</tr>";
    }          

?>