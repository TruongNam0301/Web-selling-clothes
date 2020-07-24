<?php
    if (!isset($_SESSION)) session_start();
    include_once('../controllers/BillsCtr.php');
    $BillsCtr = new BillsCtr();
    include_once("../controllers/BillsDetailCtr.php");
    $BillsDetailCtr = new BillsDetailCtr();
    if(isset($_GET['action'])){
        if($_GET['action']==='edit'){
            if(isset($_POST['MaHD'])){
            $BillsCtr -> editBills($_POST["tinhtrang"], $_POST["MaHD"]);
            }
        }
        else if($_GET['action']==='delete'){
            if(isset($_GET['MaHD'])){
            $BillsDetailCtr->deleteBillsDetail($_GET['MaHD']);
            $BillsCtr->deleteBills($_GET['MaHD']);
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
        <title>HNH SHOP  Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    </head>
   
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">HNH Shop Admin Page</a>
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
                        <a class="dropdown-item" href="../">Return to main Page</a>
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
                    <?php
                                if($_GET['tt']==0){
                                    echo "<h1 class='mt-4'> UNPAID BILL</h1>";
                                }
                                else{
                                    echo "<h1 class='mt-4'> PAID BILL</h1>";
                                }
                            ?>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">DASHBOARD</a></li>
                            <?php
                                if($_GET['tt']==0){
                                    echo "<li class='breadcrumb-item active'> UNPAID BILL</li>";
                                }
                                else{
                                    echo "<li class='breadcrumb-item active'> PAID BILL</li>";
                                }
                            ?>
                            
                        </ol>
                        


                <!-- Modal edit-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method = 'post' action='?tt=<?php echo $_GET['tt']?>&&action=edit' enctype="multipart/form-data" id='form'>
                            <input type='hidden' name='MaHD'  id='MaHD' /><br/>
                            <input type="radio" class='check' name="tinhtrang" value="1">
                            <label >PAID</label>
                            <input type="radio" class='check' name="tinhtrang" value="0">
                            <label >UNPAID</label><br>
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
                                <?php
                                if($_GET['tt']==0){
                                    echo "UNPAID BILL LIST";
                                }
                                else{
                                    echo "PAID BILL LIST";
                                }
                            ?>
                               
                            </div>
                            <div class="card-body">
                                <div class="table-responsive"  id='clothes_table'>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>AVATAR</th>
                                                <th>USER'S NAME</th>
                                                <th>PHONE NUMBER</th>
                                                <th>ADDRESS</th>
                                                <th>DATE BUY</th>
                                                <th>STATUS</th>
                                                <th>TOTAL</th>
                                                <th>BUTTON</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php 
                                            $BillsCtr->getBills($_GET['tt']);                
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
