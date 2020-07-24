
<?php
if(isset($_SESSION['user']['id'])){
echo '    
<div id="ViewModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="modal-title" id="classModalLabel">
              YOUR BILL
            </h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
       
      </div>
      <div class="modal-body">
        <table id="classTable" class="table table-bordered">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th>STT</th>
              <th>YOUR PRODUCT</th>
              <th>COUNT(S)</th>
              <th>PRICES</th>
              <th>SIZE</th>
              <th>STATUS</th>
              <th>BOUGHT AT</th>
            </tr>';
            ?>
            <?php
                $user=$_SESSION['user']['id'];
                $db=new DataProvider;
                $sql="SELECT clothes.id, clothes.name, clothes.price, chitiet_hoadon.soluong, chitiet_hoadon.size,hoadon.tinhtrang,hoadon.date  FROM chitiet_hoadon INNER JOIN clothes ON chitiet_hoadon.id_cloth=clothes.id INNER JOIN hoadon ON chitiet_hoadon.MaHD=hoadon.MaHD
                WHERE hoadon.id_user=$user";
                $array=$db->FetchAll($sql);
                $i=1;
                foreach($array as $bill){
                    $bill['tinhtrang']==0 ? $status="unpaid" : $status="unpaid";
                    $bill_money=number_format($bill['price'],0,",",".");
                   
                    echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>$bill[name]</td>";
                        echo "<td>$bill[soluong]</td>";
                        echo "<td>$bill_money</td>";
                        echo "<td>$bill[size]</td>";
                        echo "<td>$status</td>";
                        echo "<td>$bill[date]</td>";          
                    echo "</tr>";
                    $i++;
                }                 
            ?>
            <?php 
            echo '
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          CLOSE
        </button>
      </div>
    </div>
  </div>
</div>';
}
?>