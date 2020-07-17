<?php
include_once("../models/DataProvider.php");
if(isset($_GET['action'])){
    if($_GET['action']==='edit'){
        if(isset($_POST['MaHD'])){
            $db=new DataProvider(); 
            $MaHD = $_POST["MaHD"];
            $tinhtrang = $_POST["tinhtrang"];
            $sql = "UPDATE `hoadon`   SET tinhtrang = '$tinhtrang' WHERE MaHD='$MaHD' ";
            $db->ExecuteQuery($sql);
        }
    }
    else if($_GET['action']==='delete'){
        if(isset($_GET['MaHD'])){
            $db=new DataProvider(); 
            $MaHD = $_GET["MaHD"];
            $sql = "DELETE FROM `chitiet_hoadon` WHERE MaHD='$MaHD' ";
            $db->ExecuteQuery($sql);
            $sql1 = "DELETE FROM `hoadon` WHERE MaHD='$MaHD' ";
            $db->ExecuteQuery($sql1);
        }
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    </head>
   
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <?php
                include_once('menu-slide.php');
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"> Bills haven't ship</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"> Bills haven't ship</li>
                        </ol>
                        


                <!-- Modal edit-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit tinh trang hoa don</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method = 'post' action='?tt=<?php echo $_GET['tt']?>&&action=edit' enctype="multipart/form-data" id='form'>
                            <input type='hidden' name='MaHD'  id='MaHD' /><br/>
                            <input type="radio" class='check' name="tinhtrang" value="1">
                            <label >xac nhan</label>
                            <input type="radio" class='check' name="tinhtrang" value="0">
                            <label >chua xac nhan</label><br>
                            <div class="modal-footer" align="center" style="margin-top:20px">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type='submit'  name='update-clothes' class='btn-save btn btn-primary' value='save' />
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div> 

                <!--modal detail bill-->

                    <!-- table-->
                        <div class="card mb-4">
                            <div class="card-header" >
                                <i class="fas fa-table mr-1"></i>
                                Bills haven't ship List
                               
                            </div>
                            <div class="card-body">
                                <div class="table-responsive"  id='clothes_table'>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>image user</th>
                                                <th>name user</th>
                                                <th>phone number</th>
                                                <th>address</th>
                                                <th>date buy</th>
                                                <th>tinh trang</th>
                                                <th>tong cong</th>
                                                <th>button</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php 
                                            $db=new DataProvider();
                                            $sql="SELECT users.name, users.image, hoadon.MaHD, hoadon.sdt, hoadon.address, hoadon.date, hoadon.tinhtrang, hoadon.total FROM `hoadon` INNER JOIN users ON hoadon.id_user=users.id WHERE tinhtrang=$_GET[tt]";
                                            $array=$db->FetchAll($sql);
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <script>
                        $(document).ready(function(){
                            $('.btn-edit').on('click',function(){
                                    let div = $(this).parent().parent();
                                    let tinhtrang = div.find('.tinhtrang').data('value');
                                    let MaHD = $(this).data('mahd');
                                    $('#MaHD').val(MaHD);
                                    $("input[name=tinhtrang][value=" + tinhtrang + "]").attr('checked', 'checked');
                                
                            })
                            $("#exampleModal").on("hidden.bs.modal", function () {
                                $("input[name=tinhtrang]").removeAttr('checked');
                            });
                        })
                    </script>
                </footer>
            </div>
        </div>
        <script>
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );} 
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
