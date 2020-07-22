<?php
    foreach($array as $item){
        @$p=number_format($item['total'],0,",",".");
        $check=$item['tinhtrang'];
        if($check==0)$check = 'chua xac nhan';
        else $check= 'da xac nhan';
        echo "<tr>";
        echo "<td ><img src='../image/image-user/$item[image]' class='image' style='width:100px; height:50px' ></td>";
            echo "<td class='name'>$item[name]</td>";
            echo "<td class='sdt'>$item[sdt]</td>";
            echo "<td class='address'>$item[address]</td>";
            echo "<td class='date'>$item[date]</td>";
            echo "<td class='tinhtrang' data-value='$item[tinhtrang]'>$check</td>";
            echo "<td class='total'>$p</td>";
            echo "<td><button class='btn-edit btn btn-primary' data-mahd=$item[MaHD] data-toggle='modal' data-target='#exampleModal'>EDIT</button>";
            echo "<a href='chitiet_hoadon.php?MaHD=$item[MaHD]'><button class='btn-detail btn btn-success' style='margin-left:10px' >detail bills</button></a> ";
            echo "<a href='?tt=$_GET[tt]&&action=delete&&MaHD=$item[MaHD]'><button class='btn-delete btn btn-danger' style='margin-left:10px' >delete</button></td> ";
        echo "</tr>";
    }          

?>