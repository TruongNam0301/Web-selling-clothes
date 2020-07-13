<?php
    $numShow = $limit;
    $numPage = ceil($NumRows / $numShow) ;
    $currentPage = $_POST['page'];
    $idType = $_POST['type'];
    for ($i=1;$i<=$numPage;$i++){
        if($i==$currentPage)
            echo "<a style='margin:10px; background-color:red' class= 'btn btn-primary '  href='?type=$type&&idType=$idType&&page=$i'>".$i. "</a>";
        else
            echo "<a style='margin:10px' class= 'btn btn-primary '  href='?type=$type&&idType=$idType&&page=$i'>".$i. "</a>";
    }
    echo "</div>";
?>