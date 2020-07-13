<?php 
    for ($i=1;$i<=$numPage;$i++){
        if($i==$currentPage)
            echo "<a style='margin:10px; background-color:red' class= 'btn btn-primary '  href='productPage.php?page=$i'>".$i. "</a>";
        else
            echo "<a style='margin:10px' class= 'btn btn-primary '  href='productPage.php?page=$i'>".$i. "</a>";
    }
?>